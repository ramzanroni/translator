# translator
install composer
install this package in composer use windows powershell
CMD command:
composer require statickidz/php-google-translate-free

Usage:
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$source = 'es';
$target = 'en';
$text = 'buenos días';

$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $text);

// Good morning
echo $result;
