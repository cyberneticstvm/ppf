$(function () {
    "use strict"
    $(window).scroll(function () {    // this will work when your window scrolled.
        var height = $(window).scrollTop();  //getting the scrolling height of window
        if (height > 100) {
            $(".scroolMsg").css('display', 'none')
        } else {
            $(".scroolMsg").css('display', 'block')
        }
    });
})