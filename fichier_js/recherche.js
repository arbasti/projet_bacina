// Show/hide search bar
$('#search-button').click(function()
{
	$('#search-bar').toggle();
	$('#search-results').empty(); // Clear search results when toggling the search bar
});

// Search functionality
$('#search-input').on('input', function()
{
	var query = $(this).val();
	if (query.length > 2)
	{
		$.ajax(
		{
			url: 'search.php',
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

// Filter functionality
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