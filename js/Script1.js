// JavaScript source code
$(function () {
    $(document).scroll(function () {
        var $nav = $('.nav');
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());

    });
});

var menu = document.getElementById("bar");
var items = document.getElementById("navbar");

items.style.right = "-360px";

menu.onclick = function () {
    if (items.style.right == "-360px") {
        items.style.right = "0";
    }
    else {
        items.style.right = "-360px";

    }
}

$('.first-name-class').on('input', function () {
    // do something
    if (String($('.first-name-class').val()).length > 0) {
        $('#start-fisrt-name').hide();

    } else {
        $('#start-fisrt-name').show();
    }
});
$('.name-class').on('input', function () {
    // do something
    if (String($('.name-class').val()).length > 0) {
        $('#start-name').hide();

    } else {
        $('#start-name').show();
    }
});

$('.mail-class').on('input', function () {
    // do something
    if (String($('.mail-class').val()).length > 0) {
        $('#start-mail').hide();

    } else {
        $('#start-mail').show();
    }
});
