

window.addEventListener('load', function(){

    var glider1 = document.querySelector('.glider1');

    if (typeof(glider1) != 'undefined' && glider1 != null){
        new Glider(glider1, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    }




    var glider2 = document.querySelector('.glider2');

    if (typeof(glider2) != 'undefined' && glider2 != null){
        new Glider(glider2, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    }


    var glider3 = document.querySelector('.glider3');

    if (typeof(glider3) != 'undefined' && glider3 != null){
        new Glider(glider3, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    }

    var glider4 = document.querySelector('.glider4');

    if (typeof(glider4) != 'undefined' && glider4 != null){
            new Glider(glider4, {
                slidesToShow: 5,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                }
            });
        }

    var glider5 = document.querySelector('.glider5');

    if (typeof(glider5) != 'undefined' && glider5 != null){
        new Glider(glider5, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    }

    var glider6 = document.querySelector('.glider6');

    if (typeof(glider6) != 'undefined' && glider6 != null){
        new Glider(glider6, {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    }




/*
// filtre
    var btn = $(".btn-flitre");
    var bloc = $(".filtre");
    var allSpectacle = $("#all-spectacle");
    var blocSearch = $('#blocSearch');

    btn.on("click", function(){
        bloc.toggle();
        allSpectacle.toggle();

        blocSearch.toggle();
    })

*/




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
