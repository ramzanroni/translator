<?php
		
		include 'vendor/autoload.php';
		include '../connection.php';
		use \Statickidz\GoogleTranslate;
		$target=$_POST['target'];
		$source=$_POST['source'];
		$text=$_POST['inputData'];
		// $source = 'en';
		// $target = 'bn';
		// $text = 'This is me';

		$trans = new GoogleTranslate();
		$result = $trans->translate($source, $target, $text);
		// echo $result;
		$insertData=mysqli_query($conn, "INSERT INTO `translator`(`selected_language`, `transfarm_language`, `input_language`, `output_language`) VALUES ('$source','$target','$text','$result')");
		if ($insertData) 
		{
			echo "Translate Success";
		}
		else
		{
			echo "Something is wrong";
		}
		?>