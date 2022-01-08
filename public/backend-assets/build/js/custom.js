(function ($, sr) {
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced() {
            var obj = this, args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    };

    // smartresize
    jQuery.fn[sr] = function (fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };

})(jQuery, 'smartresize');


var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

// Sidebar
function init_sidebar() {
    // TODO: This is some kind of easy fix, maybe we can improve this
    var setContentHeight = function () {
        // reset height
        $RIGHT_COL.css('min-height', $(window).height());

        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        // normalize content
        contentHeight -= $NAV_MENU.height() + footerHeight;

        $RIGHT_COL.css('min-height', contentHeight);
    };

    var openUpMenu = function () {
        $SIDEBAR_MENU.find('li').removeClass('active active-sm');
        $SIDEBAR_MENU.find('li ul').slideUp();
    }

    $SIDEBAR_MENU.find('a').on('click', function (ev) {
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function () {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                openUpMenu();
            } else {
                if ($BODY.is('nav-sm')) {
                    if (!$li.parent().is('child_menu')) {
                        openUpMenu();
                    }
                }
            }

            $li.addClass('active');

            $('ul:first', $li).slideDown(function () {
                setContentHeight();
            });
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function () {
        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }

        $BODY.toggleClass('nav-md nav-sm');

        setContentHeight();

        $('.dataTable').each(function () {
            $(this).dataTable().fnDraw();
        });
    });

    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function () {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function () {
        setContentHeight();
    });

    setContentHeight();

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel: {preventDefault: true}
        });
    }
}

// /Sidebar

// Panel toolbox
$(document).ready(function () {
    $('.collapse-link').on('click', function () {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');

        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function () {
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200);
            $BOX_PANEL.css('height', 'auto');
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});
// /Panel toolbox

// Tooltip
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });
});
// /Tooltip










//hover and retain popover when on popover content
var originalLeave = $.fn.popover.Constructor.prototype.leave;
$.fn.popover.Constructor.prototype.leave = function (obj) {
    var self = obj instanceof this.constructor ?
        obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);
    var container, timeout;

    originalLeave.call(this, obj);

    if (obj.currentTarget) {
        container = $(obj.currentTarget).siblings('.popover');
        timeout = self.timeout;
        container.one('mouseenter', function () {
            //We entered the actual popover – call off the dogs
            clearTimeout(timeout);
            //Let's monitor popover content instead
            container.one('mouseleave', function () {
                $.fn.popover.Constructor.prototype.leave.call(self, self);
            });
        });
    }
};

// $('body').popover({
//     selector: '[data-popover]',
//     trigger: 'click hover',
//     delay: {
//         show: 50,
//         hide: 400
//     }
// });


// function gd(year, month, day) {
//     return new Date(year, month - 1, day).getTime();
// }



// function init_daterangepicker() {
//
//     if (typeof ($.fn.daterangepicker) === 'undefined') {
//         return;
//     }
//     console.log('init_daterangepicker');
//
//     var cb = function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//     };
//
//     var optionSet1 = {
//         startDate: moment().subtract(29, 'days'),
//         endDate: moment(),
//         minDate: '01/01/2012',
//         maxDate: '12/31/2015',
//         dateLimit: {
//             days: 60
//         },
//         showDropdowns: true,
//         showWeekNumbers: true,
//         timePicker: false,
//         timePickerIncrement: 1,
//         timePicker12Hour: true,
//         ranges: {
//             'Today': [moment(), moment()],
//             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//             'This Month': [moment().startOf('month'), moment().endOf('month')],
//             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//         },
//         opens: 'left',
//         buttonClasses: ['btn btn-default'],
//         applyClass: 'btn-small btn-primary',
//         cancelClass: 'btn-small',
//         format: 'MM/DD/YYYY',
//         separator: ' to ',
//         locale: {
//             applyLabel: 'Submit',
//             cancelLabel: 'Clear',
//             fromLabel: 'From',
//             toLabel: 'To',
//             customRangeLabel: 'Custom',
//             daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
//             monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
//             firstDay: 1
//         }
//     };
//
//     $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
//     $('#reportrange').daterangepicker(optionSet1, cb);
//     $('#reportrange').on('show.daterangepicker', function () {
//         console.log("show event fired");
//     });
//     $('#reportrange').on('hide.daterangepicker', function () {
//         console.log("hide event fired");
//     });
//     $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
//         console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
//     });
//     $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
//         console.log("cancel event fired");
//     });
//     $('#options1').click(function () {
//         $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
//     });
//     $('#options2').click(function () {
//         $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
//     });
//     $('#destroy').click(function () {
//         $('#reportrange').data('daterangepicker').remove();
//     });
//
// }
//
// function init_daterangepicker_right() {
//
//     if (typeof ($.fn.daterangepicker) === 'undefined') {
//         return;
//     }
//     console.log('init_daterangepicker_right');
//
//     var cb = function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//         $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//     };
//
//     var optionSet1 = {
//         startDate: moment().subtract(29, 'days'),
//         endDate: moment(),
//         minDate: '01/01/2012',
//         maxDate: '12/31/2020',
//         dateLimit: {
//             days: 60
//         },
//         showDropdowns: true,
//         showWeekNumbers: true,
//         timePicker: false,
//         timePickerIncrement: 1,
//         timePicker12Hour: true,
//         ranges: {
//             'Today': [moment(), moment()],
//             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//             'This Month': [moment().startOf('month'), moment().endOf('month')],
//             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//         },
//         opens: 'right',
//         buttonClasses: ['btn btn-default'],
//         applyClass: 'btn-small btn-primary',
//         cancelClass: 'btn-small',
//         format: 'MM/DD/YYYY',
//         separator: ' to ',
//         locale: {
//             applyLabel: 'Submit',
//             cancelLabel: 'Clear',
//             fromLabel: 'From',
//             toLabel: 'To',
//             customRangeLabel: 'Custom',
//             daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
//             monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
//             firstDay: 1
//         }
//     };
//
//     $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
//
//     $('#reportrange_right').daterangepicker(optionSet1, cb);
//
//     $('#reportrange_right').on('show.daterangepicker', function () {
//         console.log("show event fired");
//     });
//     $('#reportrange_right').on('hide.daterangepicker', function () {
//         console.log("hide event fired");
//     });
//     $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
//         console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
//     });
//     $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
//         console.log("cancel event fired");
//     });
//
//     $('#options1').click(function () {
//         $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
//     });
//
//     $('#options2').click(function () {
//         $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
//     });
//
//     $('#destroy').click(function () {
//         $('#reportrange_right').data('daterangepicker').remove();
//     });
//
// }
//
// function init_daterangepicker_single_call() {
//
//     if (typeof ($.fn.daterangepicker) === 'undefined') {
//         return;
//     }
//     console.log('init_daterangepicker_single_call');
//
//     $('#single_cal1').daterangepicker({
//         singleDatePicker: true,
//         singleClasses: "picker_1"
//     }, function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//     });
//     $('#single_cal2').daterangepicker({
//         singleDatePicker: true,
//         singleClasses: "picker_2"
//     }, function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//     });
//     $('#single_cal3').daterangepicker({
//         singleDatePicker: true,
//         singleClasses: "picker_3"
//     }, function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//     });
//     $('#single_cal4').daterangepicker({
//         singleDatePicker: true,
//         singleClasses: "picker_4"
//     }, function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//     });
//
//
// }
//
//
// function init_daterangepicker_reservation() {
//
//     if (typeof ($.fn.daterangepicker) === 'undefined') {
//         return;
//     }
//     console.log('init_daterangepicker_reservation');
//
//     $('#reservation').daterangepicker(null, function (start, end, label) {
//         console.log(start.toISOString(), end.toISOString(), label);
//     });
//
//     $('#reservation-time').daterangepicker({
//         timePicker: true,
//         timePickerIncrement: 30,
//         locale: {
//             format: 'MM/DD/YYYY h:mm A'
//         }
//     });
//
// }
//






$(document).ready(function () {

    init_sidebar();


});
