
// function DropDown(el) {
//     this.dd = el;
//     this.placeholder = this.dd.children('span');
//     this.opts = this.dd.find('ul.drop li');
//     this.val = '';
//     this.index = -1;
//     this.initEvents();
// }

// DropDown.prototype = {
//     initEvents: function () {
//         var obj = this;
//         obj.dd.on('click', function (e) {
//             e.preventDefault();
//             e.stopPropagation();
//             $(this).toggleClass('active');
//         });
//         obj.opts.on('click', function () {
//             var opt = $(this);
//             obj.val = opt.text();
//             obj.index = opt.index();
//             obj.placeholder.text(obj.val);
//             opt.siblings().removeClass('selected');
//             opt.filter(':contains("' + obj.val + '")').addClass('selected');
//         }).change();
//     },
//     getValue: function () {
//         return this.val;
//     },
//     getIndex: function () {
//         return this.index;
//     }
// };

// $(function () {

//     var dd1 = new DropDown($('#noble-gases'));

//     $(document).click(function () {

//         $('.wrap-drop').removeClass('active');
//     });
// });




 $(document).ready(function ()
      {$('.fb').fancybox();
});
 $('a[href="#search"]').on('click', function(event) {
            event.preventDefault();
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });

        $('#search, #search button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });

        $('form').submit(function(event) {
            event.preventDefault();
            return false;
        })
        new WOW().init();
        
         $('.multiple-item').slick({
        arrows:true,
        infinite:true,
       slideToShow:3,
       slideToSlide:3,
       responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });