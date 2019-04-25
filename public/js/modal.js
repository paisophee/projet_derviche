$(function () {

    // function pour appel ajax modal aperçu
    $('.btn-article-content-ajax').click(function(event) {
        event.preventDefault();

        var href = $(this).attr('href');

        $.get(
            href,
            function (response) {

                var $modal = $('#modal-article-content');

                // retour en texte brut
                $modal.find('.modal-body').html(response);
                $modal.modal('show');

            }
        );
    });



});

