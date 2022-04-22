<?php  
include '../connection.php';
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;
// $source=$_POST['source'];
// $target=$_POST['target'];
// $text=$_POST['inputData'];

$source = 'bn';
		$target = 'ar-dz';
		$text = 'আমার সোনার বাংলা'
$trans = new GoogleTranslate();
		$result = $trans->translate($source, $target, $text);
		echo $result;
// $insertData=mysqli_query($conn, "INSERT INTO `translator`(`selected_language`, `transfarm_language`, `input_language`, `output_language`) VALUES ('$source','$target','$text','$result')");
// if ($insertData) 
// {
// 	echo "Translate Success";
// }
// else
// {
// 	echo "Something is wrong";
// }

?>