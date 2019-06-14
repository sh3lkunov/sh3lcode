<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>lab_3</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

		<?
			$red = "<body style='background-color: red;'>";
			$blue = "<body style='background-color: blue;'>";
			$green = "<body style='background-color: green;'>";

	    	# Путь к файлу
	    	$file_name = "list.txt";
	    
	    	# Считываем информацию по строкам
	    	$data = file( $file_name );
		?>
		
		<?
			if(isset( $_POST['named'])) {
				switch ( $_POST['named']) {
					case 'r':
						echo $red;
						break;
					case 'b':
						echo $blue;
						break;
					case 'g':
						echo $green;
						break;
				}
			}	
		?>

		<table border="1">
			<tr>
				<td>
					
				</td>
				<td>
					<form action="index.php" method="POST" class="form1">
   						<input type="submit" name="test" value="По имени от А">
   						
   						<? 
   							if(isset($_POST["named"]) && $_POST["named"] == "r") {?>
   								<input type="hidden" name="named" value="r">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "g") { ?>
   								<input type="hidden" name="named" value="g">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "b") { ?>
   								<input type="hidden" name="named" value="b">
   						<?}?>
   						

					</form>
					<form method="POST">
   						<input type="submit" name="test" value="По имени от Я">

   						<? 
   							if(isset($_POST["named"]) && $_POST["named"] == "r") {?>
   								<input type="hidden" name="named" value="r">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "g") { ?>
   								<input type="hidden" name="named" value="g">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "b") { ?>
   								<input type="hidden" name="named" value="b">
   						<?}?>

					</form>
				</td>
				<td>
					
				</td>
				<td>
					<form method="POST" class="form2">
   						<input type="submit" name="test" value="По номеру зачетки от 1">

   						<? 
   							if(isset($_POST["named"]) && $_POST["named"] == "r") {?>
   								<input type="hidden" name="named" value="r">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "g") { ?>
   								<input type="hidden" name="named" value="g">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "b") { ?>
   								<input type="hidden" name="named" value="b">
   						<?}?>
					</form>
					<form method="POST">
   						<input type="submit" name="test" value="По номеру зачетки от 9">

   						<? 
   							if(isset($_POST["named"]) && $_POST["named"] == "r") {?>
   								<input type="hidden" name="named" value="r">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "g") { ?>
   								<input type="hidden" name="named" value="g">
   						<?} if (isset($_POST["named"]) && $_POST["named"] == "b") { ?>
   								<input type="hidden" name="named" value="b">
   						<?}?>
					</form>
				</td>
			</tr>
			
			<?
				if(isset( $_POST['test'])) {
					switch ( $_POST['test']) {
						case 'По имени от А':
							usort($data, function($a, $b){
							$a = explode('|', $a);
							$b = explode('|', $b);
							return strnatcmp($a[1], $b[1]);
							});
							break;
						case 'По имени от Я':
							usort($data, function($a, $b){
							$a = explode('|', $a);
							$b = explode('|', $b);
							return strnatcmp($b[1], $a[1]);
							});
							break;
						case 'По номеру зачетки от 1':
							usort($data, function($a, $b){
							$a = explode('|', $a);
							$b = explode('|', $b);
							return strnatcmp($a[3], $b[3]);
							});
							break;
						case 'По номеру зачетки от 9':
							usort($data, function($a, $b){
							$a = explode('|', $a);
							$b = explode('|', $b);
							return strnatcmp($b[3], $a[3]);
							});
							break;
					}
				}	
			?>

			<?
	    		# В цикле обходим массив данных
	    		foreach( $data as $value ):
	    
	        	# Разбиваем строку по |
	        	$value = explode( "|", $value );
			?>
		    <tr>
		        <td><?=$value[0]?></td>
		        <td><?=$value[1]?></td>
		        <td><?=$value[2]?></td>
		        <td><?=$value[3]?></td>
		    </tr>
			<?
	    		endforeach;
			?>
		</table>
		<div>
		<form action="index.php" method="POST">
			<input type="radio" name="named" <? if(isset($_POST["named"]) && $_POST["named"] == "r") { ?> checked = "checked"<? } ?>value="r"> Красный <br>
			<input type="radio" name="named" <? if(isset($_POST["named"]) && $_POST["named"] == "b") { ?> checked = "checked"<? } ?> value="b"> Синий <br>
			<input type="radio" name="named" <? if(isset($_POST["named"]) && $_POST["named"] == "g") { ?> checked = "checked"<? } ?> value="g"> Зеленый <br>

			<?
				if(isset($_POST["test"]) && $_POST["test"] == "По имени от А") { ?>
					<input type="hidden" name="test" value="По имени от А">
			<?}?>
			<?
				if(isset($_POST["test"]) && $_POST["test"] == "По имени от Я") { ?>
					<input type="hidden" name="test" value="По имени от Я">
			<?}?>
			<?
				if(isset($_POST["test"]) && $_POST["test"] == "По номеру зачетки от 1") { ?>
					<input type="hidden" name="test" value="По номеру зачетки от 1">
			<?}?>
			<?
				if(isset($_POST["test"]) && $_POST["test"] == "По номеру зачетки от 9") { ?>
					<input type="hidden" name="test" value="По номеру зачетки от 9">
			<?}?>

			<input type="submit"/>

		</form>
		</div>
	</body>
</html>