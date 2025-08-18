
$(document).ready(function() {
    // Détection des changements de sélection pour le département
    $('#departement_id').change(function() {
        var departementId = $(this).val();
        if (departementId) {
            var url = "{{ route('get-communes', ':departementId') }}";
            url = url.replace(':departementId', departementId);
            //  $('#commune_id').attr('data-url', url);
            // Appeler la fonction pour charger les options pour la commune
            loadOptions(url, $('#commune_id'));
        }
    });

    // Détection des changements de sélection pour la commune
    $('#commune_id').change(function() {
        var communeId = $(this).val();

        var url = "{{ route('get-arrondissements', ':communeId') }}";
        url = url.replace(':communeId', communeId);
        $('#commune_id').attr('data-url', url)
        var arrondissementSelect = $('#arrondissement_id');
        loadOptions(url + '/', arrondissementSelect);
    });

    // Détection des changements de sélection pour l'arrondissement
    $('#arrondissement_id').change(function() {
        var arrondissementId = $(this).val();

        var url = "{{ route('get-quartiers', ':arrondissementId') }}";
        url = url.replace(':arrondissementId', arrondissementId);
        $('#arrondissement_id').attr('data-url', url)
        var quartierSelect = $('#quartier_id');
        loadOptions(url + '/', quartierSelect);

    });

    // Fonction pour charger les options en fonction de l'URL spécifiée
    function loadOptions(url, targetSelect) {
        $.ajax({
            type: "GET"
            , url: url
            , success: function(options) {
                targetSelect.empty();
                targetSelect.append('<option value="selected ' + '">' + 'Choisissez' + '</option>');
                $.each(options, function(key, value) {
                    targetSelect.append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }
});