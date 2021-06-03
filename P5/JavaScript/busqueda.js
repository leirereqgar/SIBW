import 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'

$(() =>
{
	$('#barra-busqueda').keyup(function ()
	{
		const result = $(this).val();

		if (result != '')
		{
			$.ajax({
				url:      "scriptsPHP/busqueda.php",
				method:   "post",
				data:     {query: result},
				dataType: "text",

				success: (data) =>
				{
					console.log(data);
					$('#barra-busqueda').html(data).show();
				}
			});
		}
		else
		{
			$('#resultados').hide().html('');
		}
	});
});
