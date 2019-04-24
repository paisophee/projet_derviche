
/*Page FAQ*/


var faqs =
    [
        {
            question: 'DERVICHE ÇA SERT À QUOI ?',
            answer: '<strong>À tourner !</strong><br>Comme les derviches tourneurs, les spectacles vivants ont besoin de tourner pour vivre, grandir, s’ouvrir à de nouveaux publics et donner aux artistes les moyens financiers de continuer à créer.<br> Derviche Diffusion rend accessible la diffusion de spectacles vivants avec un service "à la carte" : plusieurs degrés de délégation sont possibles pour être au plus près des souhaits de la compagnie… et de son budget.'
        },
        {
            question: 'DERVICHE, C\'EST QUI ?',
            answer: '<strong>Derviche Diffusion a été créé par Tina Wolters,</strong> après quinze ans d’expérience dans de grandes entreprises et de bénévolat dans des compagnies de théâtre. Les spectacles jeune public de La Baguette – plus de 1000 représentations - ont été ses premiers succès.<br><strong>Juliette Buffard Scalabre</strong> rejoint Tina en 2016, après une carrière de danse au sein de compagnies prestigieuses comme le Ballet Preljocaj, Compagnie Thor, et la création d\'un festival pluridisciplinaire à Paris.<br><strong>Marion de Courville</strong> rejoint l’équipe en 2017. Après une formation de comédienne, elle monte le collectif Birdland et joue plus de 140 représentations du spectacle « Parlons d’autre Chose ».<br><strong>Benjamin Bac</strong> intègre Derviche en juin 2018. En parallèle d\'une carrière de danseur de près de vingt ans, développée dans des compagnies internationales comme la Compagnie Thor - Thierre Smits à Bruxelles, Ballet National de Marseille, Ballet Preljocaj ou encore la compagnie de Marie-Claude Pietragalla, il vient compléter l\'équipe pour le développement de nouveaux projets.<br><strong>Aujourd’hui,</strong> Derviche Diffusion défend des spectacles de styles, d’esthétiques et de propos aussi différents que singuliers… Et c’est une équipe enthousiaste, souriante et à l’écoute, présente à Paris et Avignon !'
        },
        {
            question: 'POURQUOI DERVICHE N\'EST PAS CHER ?',
            answer: 'Parce c’est <strong>« à la carte » :</strong> vous ne payez que le service dont vous avez besoin, pour la durée de votre choix !<br>Parce que nous mutualisons les coûts entre les différentes compagnies qui participent à Derviche. C’est une démarche solidaire et vertueuse.'
        },
        {
            question: 'EST-CE QUE DERVICHE EST ADAPTÉ À MON SPECTACLE ?',
            answer: 'Le spectacle vivant regroupe des créations très variées. Elles s’expriment en solo, en groupe, par le corps, par les mots… Nous aimons cette diversité. Nous sommes là pour vous mettre en lumière dans votre unicité, vous aider à construire le réseau de tournée qui vous correspond.<br>Quelques exemples : jeune public seul en scène, texte contemporain sur les violences faites aux femmes, opérette décoiffée, spectacle grande installation pour douze comédiennes et bassin de trois mille litres d’eau, spectacle musical de rue...<br>Les rôles sont clairs : vous créez. Nous mettons en avant votre création, fidèlement. Enfin, les programmateurs jugent si cela correspond à ce qu’ils recherchent.'},
        {
            question: 'COMBIEN DE DATES DERVICHE VA M\'APPORTER ?',
            answer: 'Nous ne sommes pas programmateurs, donc nous ne pouvons pas vous garantir de dates.<br>Notre rôle est de faire connaître votre spectacle à un vaste réseau de programmateurs, enrichi et mis à jour en permanence par notre équipe. Dans ce but, nous améliorons sans cesse notre démarche et nos outils de communication pour être plus efficaces, toujours fidèles à votre spectacle et pertinents par rapport aux attentes des programmateurs.<br>N’hésitez pas à nous suggérer vos idées pour faire encore mieux !'
        },
        {
            question: 'JE SUIS PROGRAMMATEUR ET JE RECHERCHE DES SPECTACLES, COMMENT FAIRE ?',
            answer: 'Nous serons très heureux de vous faire des propositions !\n' +
                'Cliquez sur "contact programmateur" pour référencer votre lieu et le type de spectacles que vous recherchez.<br>Derviche peut vous aider à trouver ce que vous cherchez, selon vos propres critères.'
        },
        {
            question: 'QU\'EST-CE QU\'UN DERVICHE TOURNEUR ?',
            answer: 'Les derviches appartiennent à une confrérie mystique datant du treizième siècle : le soufisme. Par la musique et la danse, les derviches tourneurs cherchent une sorte de communion avec le monde : ils tournent, d’abord lentement puis de plus en plus rapidement, jusqu’à atteindre une forme d’extase durant laquelle ils déploient les bras, la paume de la main droite dirigée vers le ciel dans le but de recueillir la grâce cosmique, celle de la main gauche dirigée vers la Terre pour l’y répandre.<br>Ils sont inscrits au patrimoine immatériel de l’UNESCO. <a href="https://dai.ly/x18en0p">En savoir plus</a>'
        },
    ];


/**********************************************************/





for(var i = 0 ; i<faqs.length ; i++){
    $('#accordion-list').append(
        `<div class="accordion-item">
        <a href="#" class="question btn">${faqs[i].question}<i class="fa fa-angle-right"></i></a>
        <p class="answer">${faqs[i].answer}</p>
    </div>`);
}



var inter = 0;
$('div.accordion-item').each(function(){
    inter = inter + 450
    $(this).delay(inter).fadeIn(500);
});



var items = $('a.question');
function showQuestion(){
    $(this).toggleClass("active");
    $(this).next().slideToggle(500);
    items.not($(this)).removeClass("active");
    $("p.answer:visible").not($(this).next()).slideUp(500);
}


items.on("click", showQuestion);


/*confirmation de suppression********/

$(function () {
    $('.btn-delete').click(function (event) {
        // empêche d'aller vers la page de suppression
        event.preventDefault();

        // ouvre la modal de confirmation
        $('#modal-confirm-delete').modal('show');

        // l'url de la page de suppression de l'article
        var href = $(this).attr('href');

        // au clic du bouton de confirmation, redirection vers la page de suppression
        $('.btn-confirm-delete').click(function () {
            location.href = href;
        });
    })
});


/* Menu Burger*/
window.addEventListener('load', function(){

    var btnBurger = $(".burger");
    var blocMenu = $(".nav-responsive");


    btnBurger.on("click", function(){
        blocMenu.fadeToggle();

    })


});