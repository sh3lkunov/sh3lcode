$(function() {
    /* FIXED HEADER */
    let header = $("#header"); // Выбираем шапку по id
    let intro = $("#intro"); 
    let introH = intro.innerHeight(); // Высота блока "Intro"
    let scrollPos = $(window).scrollTop(); // Сохраняем позицию скролла

    checkScroll(scrollPos, introH);

    $(window).on("scroll resize", function() {
        introH = intro.innerHeight(); // Высота блока "Intro"
        scrollPos = $(this).scrollTop();
        checkScroll(scrollPos, introH);
    });

    function checkScroll(scrollPos, introH) {
        if (scrollPos + 59 > introH) {
            header.addClass("fixed"); // Добавляем класс "fixed" к шапке
        } else {
            header.removeClass("fixed"); //
        }
    }

    /* Smooth Scroll */
    $("[data-scroll]").on("click", function(event){
        event.preventDefault();
        let elementId = $(this).data('scroll');
        let elementOffset = $(elementId).offset().top;
        
        nav.removeClass("show");

        $("html, body").animate({
            scrollTop: elementOffset - 58
        }, 700);
        
    });

   /* Navtoggle */
   let nav = $("#nav");
   let navToggle = $("#navToggle");
   navToggle.on("click", function(event){
       event.preventDefault();
        nav.toggleClass("show");
   }); 

   /* Reviews https://kenwheeler.github.io/slick/ */
    let slider = $("#reviewsSlider");
    slider.slick({
        infinite: true, // Когда заканчивается, повторяется заного
        slidesToShow: 1, // Сколько показывать элементов на странице
        slidesToScroll: 1, // Сколько скролится слайдов при кликен а скролл
        fade: true, // Один слайд затемнялся
        arrows: false,
        dots: true
    });

});