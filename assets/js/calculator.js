!function() {
    $(document).ready(function() {
        var $leftVal = $('#left_val');
        var $rightVal = $('#right_val');
        var $buy = $('#buy-link');
        var $rightCurrency = $('input[name="right_curr"]');
        var $leftCurrency = $('input[name="left_curr"]');
        $leftVal.attr('old', $leftVal.val());
        $leftVal.attr('reg', '^[0-9]{0,7}(\.([0-9]{0,8}))?$');
        $rightVal.attr('old', $rightVal.val());
        $rightVal.attr('reg', '^[0-9]{0,7}(\.([0-9]{0,2}))?$');
        $('#right_curr').click(function(e) {
            e.preventDefault();
            $('#fiat-list-right').toggle();
        });
        $('#left_curr').click(function(e) {
            e.preventDefault();
            $('#fiat-list-left').toggle();
        });
        $('#fiat-list-right').find('a').click(function(e) {
            e.preventDefault();
            var curr = $(this).text();
            var h = $buy.attr('href');
            var oldCurr = $rightCurrency.val();
            h = h.replace(oldCurr.toUpperCase(), curr.toUpperCase());
            $buy[0].setAttribute('href', '');
            $buy[0].setAttribute('href', h);
            $rightCurrency.val(curr);
            $('#right_curr_text').text(curr);
            $('#fiat-list-right').hide().promise().done(function() {
                setTimeout(function() {
                    calc($leftVal, $rightVal, $leftVal);
                }, 1);
            });
        });
        $('#fiat-list-left').find('a').click(function(e) {
            e.preventDefault();
            var curr = $(this).text();
            $('#fiat-list-left').hide().promise().done(function() {
                $('#left_curr_text').text(curr);
                $leftCurrency.val(curr);
                calc($leftVal, $rightVal, $leftVal);
            });
        });
        $('#left_val, #right_val').on('keyup', function(e) {
            e.preventDefault();
            checkRex(this, function(e) {
                calc($leftVal, $rightVal, e);
            });
        });
        function checkRex(node, callback) {
            if ((new RegExp($(node).attr('reg')).test($(node).val()))) {
                $(node).attr('old', $(node).val());
                callback(node);
            } else {
                $(node).val($(node).attr('old'));
            }
        }
        function calc(left, right, trigger) {
            var pair = $leftCurrency.val().toUpperCase() + ':' + $rightCurrency.val().toUpperCase();
            var price = lastprices[pair] || 0;
            var pArray = pair.split(':');
            var leftVal = left.val();
            var rightVal = right.val();
            var _price = parseFloat(price) || 0;
            var _amount = parseAmount(pArray[0], leftVal || 0);
            var _Ramount = parseAmount(pArray[1], rightVal || 0);
            var symbol1ToSymbol2A = symbol1ToSymbol2(pArray[0], pArray[1], _amount, _price);
            var symbol2ToSymbol1A = symbol2ToSymbol1(pArray[0], pArray[1], _Ramount, _price);
            if ($(trigger).is('#left_val')) {
                right.val(formatAmount(pArray[1], symbol1ToSymbol2A) || 0)
            } else {
                left.val(formatAmount(pArray[0], symbol2ToSymbol1A) || 0);
            }
            var h = $buy.attr('href');
            h = h.replace(/amount\/.*\?/, 'amount/' + $rightVal.val() + '?');
            $buy[0].setAttribute('href', '');
            $buy[0].setAttribute('href', h);
        }
        calc($leftVal, $rightVal, $leftVal);
    });
}();
