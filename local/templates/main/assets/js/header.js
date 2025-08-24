$( document ).ready(function() {
    $(function() {
        let header = $('.header__bottom-content');

        $(window).scroll(function() {
            if($(this).scrollTop() > 1) {
                header.addClass('header__bottom-content_fixed');
                header.removeClass('header__bottom-content');
            } else {
                header.removeClass('header__bottom-content_fixed');
                header.addClass('header__bottom-content');

            }
        });
    });
    /*анимация*/
  /*  $(function() {
        let headerTop = $('.header__top-content');
        let header = $('.header__bottom-content');
        let hederHeight = header.height(); // вычисляем высоту шапки

        $(window).scroll(function() {
            if($(this).scrollTop() > 1) {
                header.addClass('header__bottom-content_fixed');
                header.removeClass('header__bottom-content');
                headerTop.removeClass('header__top-content');
                $('body').css({
                    'paddingTop': hederHeight+'px' // делаем отступ у body, равный высоте шапки
                });
            } else {
                header.removeClass('header__bottom-content_fixed');
                header.addClass('header__bottom-content');
                headerTop.addClass('header__top-content');
                $('body').css({
                    'paddingTop': 0, // удаляю отступ у body, равный высоте шапки
                    'transition': '0.3s'
                })
            }
        });
    });*/

});