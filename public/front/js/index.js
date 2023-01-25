$(document).ready(function(){
    $('.slader__list').slick({
        dots: true,
        arrows:true,
        autoplaySpeed:3000,
        infinite: true,
        speed: 1500,
        autoplay:true,
        fade: true,
    });

    $('.our_partners__list').slick({
      dots: true,
      arrows:false,
      infinite: false,
      autoplaySpeed:3000,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            dots: false,
            slidesToScroll: 1
          }
        }
      ]
    });
});

$(document).ready(function(){
  $('.burger__start').click(function(){
    $('.header__item').fadeTo(500, 1)
    $('.header__item').css('display','flex')
    $('.burger__end').css('display','block')
    $('.burger__start').css('display','none')
  })
});

$(document).ready(function(){
  $('.burger__end').click(function(){
    $('.header__item').fadeTo(500, 1)
    $('.header__item').css('display','none')
    $('.burger__end').css('display','none')
    $('.burger__start').css('display','block')
  })
});

// petrol_in__serch ------------------------------

$(document).ready(function(){
  $('.petrol_in__serch__block').click(function(){
    $('.petrol_in__serch').fadeTo(500, 1)
    $('.petrol_in__serch').css('display','block')
  })
});
$(document).ready(function(){
  $('.petrol_in__serch__none').click(function(){
    $('.petrol_in__serch').fadeTo(500, 1)
    $('.petrol_in__serch').css('display','none')
  })
});

$(document).ready(function(){
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.dropdown-trigger');
  var instances = M.Dropdown.init(elems, options);
});

$('.dropdown-trigger').dropdown();
});
// petrol_in__serch ------------------------------

$(document).ready(function(){
  (function($){
    $('.number').each(function(){
        $(this).prop('Counter',0).animate({
            Counter:$(this).text()
        },
        {
            duration:9000,
            easing:"swing",
            step:function(now){
                $(this).text(Math.ceil(now));
            }  
       });
    })
  })(jQuery);
});

$( "#tabs" ).tabs();

$(function(){
    let Catalog_max__pro__link = document.querySelectorAll('.petrol_in__menu li');
  
    for(let i = 0; i<Catalog_max__pro__link.length; i++){
        Catalog_max__pro__link[i].addEventListener('click',function(){
            for(let j = 0; j<Catalog_max__pro__link.length;j++){
                Catalog_max__pro__link[j].classList.remove('petrol_in__active');
            }
            this.classList.add('petrol_in__active');
  
        })
    }
});

$(function(){
  let Catalog_max__pro__link = document.querySelectorAll('.BlogM__pagination__page__mrx li');

  for(let i = 0; i<Catalog_max__pro__link.length; i++){
      Catalog_max__pro__link[i].addEventListener('click',function(){
          for(let j = 0; j<Catalog_max__pro__link.length;j++){
              Catalog_max__pro__link[j].classList.remove('BlogM__active');
          }
          this.classList.add('BlogM__active');

      })
  }
});

Fancybox.bind("[data-fancybox-plyr]", {
    on: {
      reveal: (fancybox, slide) => {
        if (typeof Plyr === undefined) {
          return;
        }
  
        let $el;
  
        if (slide.type === "html5video") {
          $el = slide.$content.querySelector("video");
        } else if (slide.type === "video") {
          $el = document.createElement("div");
          $el.classList.add("plyr__video-embed");
  
          $el.appendChild(slide.$iframe);
  
          slide.$content.appendChild($el);
        }
  
        if ($el) {
          slide.player = new Plyr($el);
        }
      },
      "Carousel.unselectSlide": (fancybox, carousel, slide) => {
        if (slide.player) {
          slide.player.pause();
        }
      },
      "Carousel.selectSlide": (fancybox, carousel, slide) => {
        if (slide.player) {
          slide.player.play();
        }
      },
    },
});