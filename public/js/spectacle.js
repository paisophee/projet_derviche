

window.addEventListener('load', function(){



    new Glider(document.querySelector('.glider'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });


    new Glider(document.querySelector('.glider2'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider3'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider4'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider5'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider6'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider7'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider8'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider9'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

    new Glider(document.querySelector('.glider10'), {
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
    });

// filtre
    var btn = $(".btn-flitre");
    var bloc = $(".filtre");

    btn.on("click", function(){
        bloc.fadeToggle();
    })






})

