(function(){
    
    $('.guestbook-card__otvetit').on('click', function(e){
        $(this).next().stop().slideToggle();
        return false;
    });
    
    $('.text-voprosa input').styler();

    // toggle добавить отзыв в гостевую книгу)
        var guestbookToggle = $('.guestbook-add');
        var guestbookForma = $('.guestbook-addforma');
        guestbookToggle.on('click', function(e){
            e.preventDefault();
            if(guestbookForma.css('display') == 'none' ) {
                guestbookToggle.text('Скрыть форму');
                guestbookForma.slideDown();
            }
            else {
                guestbookToggle.text('Добавить отзыв');
                guestbookForma.slideUp();
            }
        });
    // end toggle добавить отзыв в гостевую книгу


    // табы в профиле пользователя
    var userTabItem = $(".profile-userbottab__contitem"),
        userTabItemLi = $(".profile-userbottab__li");

        // event click
        userTabItem.not(":first").hide();
        userTabItemLi.click(function() {
            userTabItemLi
                .removeClass("profile-userbottab__li_active")
                    .eq($(this).index())
                        .addClass("profile-userbottab__li_active");
            userTabItem.hide().eq($(this).index()).fadeIn();
        }).eq(0).addClass("profile-userbottab__li_active");
    // end табы в профиле пользователя


    // toggle расширенный поиск
    var advSearchToggle = $('.contentBox_page-rsearch-toggle'),
        advSearchContent = $('.contentBox-adv-search'),
        contentBoxSearch = $('.contentBox-search_page'),
        advToggleImg = $('.contentBox_page-rsearch-toggle__text');

        // проверка на отображение блока расширенного поиска
        if(advSearchContent.css('display') == 'block' ){
            contentBoxSearch.hide();
        }
        else{
            contentBoxSearch.show();
        }
        // end

        // событие клика на Расширенный поиск
        advSearchToggle.on('click', function(){
            if (advSearchContent.css('display')== 'none' ){
                advSearchContent.fadeIn();
                advSearchContent.css('marginTop', '50px');
                contentBoxSearch.hide();
                if(window.innerWidth <= 640) {
                    advToggleImg.css({
                        "backgroundImage": "none"
                    });
                }
                else{
                    advToggleImg.css({
                        "backgroundImage": "url('static/img/as-toggle-active.jpg')"
                    });
                }
            }
            else {
                advSearchContent.slideUp();
                contentBoxSearch.show();
                if(window.innerWidth <= 640) {
                    advToggleImg.css({
                        "backgroundImage": "none"
                    });
                }
                else{
                    advToggleImg.css({
                        "backgroundImage": "url('static/img/sb-collapsed.png')"
                    });
                }
            }
        });
    // end


    // xs toggle гамбургер
    var xsGamburger = $('.p-header-menu_xstoggle'),
        leftSidebar = $('.leftSidebar'),
           xsShadow = $('.xs-shadow'),
           leftNumb = leftSidebar.css('left'),
         sideHeight = parseInt( $(document).height() );

    xsGamburger.on('click', function(){
        if(leftSidebar.css('left') == leftNumb){
            leftSidebar.animate({
                'left': '0',
                'height': sideHeight+'px'
            });
            xsShadow.show();
        }
        else {
            leftSidebar.animate({
                'left': '-1000px'
            });
            xsShadow.hide();
        }
    });

    xsShadow.on('click', function(){
        xsShadow.hide();
        leftSidebar.animate({
            'left': '-1000px'
        });
    });


    // tabs профиль настройки
    var profileToolsItem = $(".profile-tools-tabs__item"),
        profileToolsTab = $(".profile-tools-tabs__tab");

    profileToolsItem.not(":first").hide(); // скрыть все кроме первой

    profileToolsTab.click(function() {
        profileToolsTab.removeClass("profile-tools-tabs__tab_active").eq($(this).index()).addClass("profile-tools-tabs__tab_active");
        profileToolsItem.hide().eq($(this).index()).fadeIn();
    }).eq(0).addClass("profile-tools-tabs__tab_active");
    // end


    //



}());