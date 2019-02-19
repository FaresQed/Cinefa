$(document).ready(function(){
	load_data_movie();
	load_data_actors();
	load_data_directors();

	// Movie
	function load_data_movie(query)
	{
		$.ajax({
			url:"fetch_movie.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#movie').html(data);
			}
		});
	}
	$('#search_movie').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data_movie(search);
		}
		else
		{
			load_data_movie();			
		}
	});



////////Actor
	function load_data_actors(query)
	{
		$.ajax({
			url:"fetch_actors.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#actors').html(data);
			}
		});
	}
	$('#search_actors').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data_actors(search);
		}
		else
		{
			load_data_actors();			
		}
	});

////////////



		//Director
	function load_data_directors(query)
	{
		$.ajax({
			url:"fetch_directors.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#directors').html(data);
			}
		});
	}
	
	$('#search_director').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data_directors(search);
		}
		else
		{
			load_data_directors();			
		}
	});
});