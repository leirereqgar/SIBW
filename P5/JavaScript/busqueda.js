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
					const json = JSON.parse(data);
					const results = $('#resultados').html('');

					for (let i = 0; i < json.length; i++)
					{
						const link = document.createElement('a');
						const br   = document.createElement('br');

						link.href      = 'evento.php?ev=' + json[i].id;
						link.innerHTML = json[i].nombre;

						results.append(link).append(br).show();
					}
				}
			});
		}
		else
		{
			$('#resultados').hide().html('');
		}
	});
});
