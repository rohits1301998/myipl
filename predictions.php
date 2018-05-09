<!DOCTYPE html>
<html>
<head>
	<title>predictions</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	 <link rel="stylesheet" href="style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<table id="predictionTable" class="table table-striped">
		<tr>
			<td><bold><strong>Player</strong></bold></td>
			<td><bold><strong>Match1</strong></bold></td>
			<td><strong><bold>Match2</bold></strong></td>
		</tr>
	</table>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: 'GET',
			url: "https://cors.io/?https://myipl1-202719.appspot.com/player/predictions/saurabhsingh",
			dataType:'json',
			success: function(data){
				var predictions=data.predictions;
				//console.log(data.predictions);
				var table_row='';
				$.each(predictions, function(key, value){
					table_row += '<tr>';
					table_row += '<td>'+value.userId+'</td>';
					table_row += '<td>'+value.match1+'</td>';
					table_row += '<td>'+value.match2+'</td>';
					table_row += '</tr>';

				});
				//console.log(table_row);
				$('#predictionTable').append(table_row);
			}
		});
	});
</script>