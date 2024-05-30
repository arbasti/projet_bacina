// afficher ou cacher la barre de recherche
$('#search-button').click(function()
{
	$('#search-bar').toggle();
	$('#search-results').empty(); // fermeture des résultats de recherche
});

// fonction recherche
$('#search-input').on('input', function()
{
    var query = $(this).val();
    if (query.length > 2)
    {
        $.ajax(
        {
            url: '../fichier_php/search.php', // Chemin ajusté
            method: 'GET',
            data: { search: query },
            success: function(data)
            {
                $('#search-results').html(data);
            }
        });
    }
    else
    {
        $('#search-results').empty();
    }
});

// bouton de filtre
$('.filter-button').click(function()
{
    var specialization = $(this).data('specialization');
    $.ajax(
    {
        url: '../fichier_php/search.php', // Chemin ajusté
        method: 'GET',
        data: { specialization: specialization },
        success: function(data)
        {
            $('#search-results').html(data);
        }
    });
});


// bouton de filtre
$('.filter-button').click(function()
{
	var specialization = $(this).data('specialization');
	$.ajax(
	{
		url: 'search.php',
		method: 'GET',
		data: { specialization: specialization },
		success: function(data)
		{
			$('#search-results').html(data);
		}
	});
});