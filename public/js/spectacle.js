

window.addEventListener('load', function(){

    var glider1 = document.querySelector('.glider1');
    var dots1 = document.querySelector('.dots1');
    var gliderprev1 = document.querySelector('.glider-prev1');
    var glidernext1 = document.querySelector('.glider-next1');

    if (typeof(glider1) != 'undefined' && glider1 != null){
        new Glider(glider1, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: dots1,
            arrows: {
                prev: gliderprev1,
                next: glidernext1
            }
        });
    }




    var glider2 = document.querySelector('.glider2');
    var dots2 = document.querySelector('.dots2');
    var gliderprev2 = document.querySelector('.glider-prev2');
    var glidernext2 = document.querySelector('.glider-next2');

    if (typeof(glider2) != 'undefined' && glider2 != null){
        new Glider(glider2, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: dots2,
            arrows: {
                prev: gliderprev2,
                next: glidernext2
            }
        });
    }


    var glider3 = document.querySelector('.glider3');
    var dots3 = document.querySelector('.dots3');
    var gliderprev3 = document.querySelector('.glider-prev3');
    var glidernext3 = document.querySelector('.glider-next3');

    if (typeof(glider3) != 'undefined' && glider3 != null){
        new Glider(glider3, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: dots3,
            arrows: {
                prev: gliderprev3,
                next: glidernext3
            }
        });
    }

    var glider4 = document.querySelector('.glider4');
    var dots4 = document.querySelector('.dots4');
    var gliderprev4 = document.querySelector('.glider-prev4');
    var glidernext4 = document.querySelector('.glider-next4');

    if (typeof(glider4) != 'undefined' && glider4 != null){
            new Glider(glider4, {
                slidesToShow: 5,
                slidesToScroll: 1,
                draggable: true,
                dots: dots4,
                arrows: {
                    prev: gliderprev4,
                    next: glidernext4
                }
            });
        }

    var glider5 = document.querySelector('.glider5');
    var dots5 = document.querySelector('.dots5');
    var gliderprev5 = document.querySelector('.glider-prev5');
    var glidernext5 = document.querySelector('.glider-next5');

    if (typeof(glider5) != 'undefined' && glider5 != null){
        new Glider(glider5, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: dots5,
            arrows: {
                prev: gliderprev5,
                next: glidernext5
            }
        });
    }

    var glider6 = document.querySelector('.glider6');
    var dots6 = document.querySelector('.dots6');
    var gliderprev6 = document.querySelector('.glider-prev6');
    var glidernext6 = document.querySelector('.glider-next6');

    if (typeof(glider6) != 'undefined' && glider6 != null){
        new Glider(glider6, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: dots6,
            arrows: {
                prev: gliderprev6,
                next: glidernext6
            }
        });
    }





// filtre
    var btn = $(".btn-recherche");
    var bloc = $(".rechercheSpectacle");


    btn.on("click", function(){
        bloc.fadeToggle();

    })






});


/*
window.addEventListener('load', function(){


    $('.glider').each(function () {
        var id = $(this).attr('id');
        new Glider(document.querySelector('#' + id), {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '#glider_prev_' + id,
                next: '#glider_next_' + id
            }
        });
    });

*/
