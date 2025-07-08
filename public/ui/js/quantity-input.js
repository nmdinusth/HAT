 /*====== Quantity ========*/
 
$(document).ready(function () {
    // ======= INIT DEFAULT VALUES =========
    $('input[name="adult_number"]').val(2).trigger('change');
    $('input[name="child_number"]').val(1).trigger('change');
    $('input[name="room_number"]').val(1).trigger('change');

    // ====== Quantity Button Logic =======
    $(document).on('click', '.qtyDec, .qtyInc', function () {
        var $button = $(this);
        numberButtonFunc($button);
    });

    function numberButtonFunc($button) {
        var $input = $button.parent().find("input");
        var name = $input.attr('name');
        var oldValue = parseInt($input.val()) || 0;
        var newVal = oldValue;

        if ($button.hasClass('qtyInc')) {
            newVal = oldValue + 1;

            // Giới hạn room <= adult
            if (name === 'room_number') {
                var adultVal = parseInt($('input[name="adult_number"]').val()) || 1;
                if (newVal > adultVal) return;
            }
        } else {
            // xử lý giảm xuống
            if (name === 'adult_number' || name === 'room_number') {
                if (oldValue > 1) newVal = oldValue - 1;
            } else {
                if (oldValue > 0) newVal = oldValue - 1;
            }
        }

        $input.val(newVal).trigger('change');
    }

    // ====== Cập nhật hiển thị và tổng ========
    function updateGuestTotal() {
        var total = 0;
        $('[data-total-input]').each(function () {
            var value = parseInt($(this).val());
            if (!isNaN(value)) {
                total += value;
            }
        });
        $('[data-total-output]').text(total);
    }

    $('.gty-container').each(function () {
        var parent = $(this);

        // Adult change
        $('input[name="adult_number"]', parent).on('change', function () {
            var adults = parseInt($(this).val()) || 0;
            var html = adults + ' ' + (adults < 2 ? $('.adult', parent).data('text') : $('.adult', parent).data('text-multi'));
            $('.adult', parent).html(html);

            // Nếu room đang lớn hơn adult thì giảm room về bằng adult
            var $roomInput = $('input[name="room_number"]', parent);
            var roomVal = parseInt($roomInput.val()) || 1;
            if (roomVal > adults) {
                $roomInput.val(adults).trigger('change');
            }

            updateGuestTotal();
        }).trigger('change');

        // Children change
        $('input[name="child_number"]', parent).on('change', function () {
            var children = parseInt($(this).val()) || 0;
            var html = children + ' ' + (children < 2 ? $('.children', parent).data('text') : $('.children', parent).data('text-multi'));
            $('.children', parent).html(html);
            updateGuestTotal();
        }).trigger('change');

        // Room change
        $('input[name="room_number"]', parent).on('change', function () {
            var rooms = parseInt($(this).val()) || 1;
            var html = rooms + ' ' + (rooms < 2 ? $('.room', parent).data('text') : $('.room', parent).data('text-multi'));
            $('.room', parent).html(html);
            updateGuestTotal();
        }).trigger('change');
    });

    // Gắn lại event để luôn cập nhật tổng
    $('[data-total-input]').on('change', function () {
        updateGuestTotal();
    });

    updateGuestTotal();
});


// $(document).on('click', '.qtyDec, .qtyInc', function () {
//     var $button = $(this);
//     numberButtonFunc($button);
// });

// function numberButtonFunc($button) {
//     var oldValue = $button.parent().find("input").val();
//     var total = 0;
//     $('input[type="text"]').each(function () {
//         total += parseInt($(this).val());
//     });
//     var newVal;
//     if ($button.hasClass('qtyInc')) {
//         newVal = parseFloat(oldValue) + 1;
//     } else {
//         if (oldValue > 0) {
//             newVal = parseFloat(oldValue) - 1;
//         } else {
//             newVal = 0;
//         }
//     }
//     $button.parent().find("input").val(newVal).trigger('change');

//     updateGuestTotal();
// }

// function updateGuestTotal() {
//     var total = 0;
//     $('[data-total-input]').each(function () {
//         var value = parseInt($(this).val());
//         if (!isNaN(value)) {
//             total += value;
//         }
//     });
//     $('[data-total-output]').text(total);
// }

// $('.gty-container').each(function () {
//     var parent = $(this);
//     // Adult quantity number
//     $('input[name="adult_number"]', parent).change(function () {
//         var adults = parseInt($(this).val());
//         var html = adults;
//         if (typeof adults == 'number') {
//             if (adults < 2) {
//                 html = adults + ' ' + $('.adult', parent).data('text');
//             } else {
//                 html = adults + ' ' + $('.adult', parent).data('text-multi');
//             }
//         }
//         $('.adult', parent).html(html);
//     });
//     $('input[name="adult_number"]', parent).trigger('change');

//     // Children quantity number
//     $('input[name="child_number"]', parent).change(function () {
//         var children = parseInt($(this).val());
//         var html = children;
//         if (typeof children == 'number') {
//             if (children < 2) {
//                 html = children + ' ' + $('.children', parent).data('text');
//             } else {
//                 html = children + ' ' + $('.children', parent).data('text-multi');
//             }
//         }
//         $('.children', parent).html(html);
//     });
//     $('input[name="child_number"]', parent).trigger('change');


// });

// // Attach change event listeners to all total quantity input fields
// $('[data-total-input]').on('change', function () {
//     updateGuestTotal();
// });

// // Initial call to set the total
// updateGuestTotal();

