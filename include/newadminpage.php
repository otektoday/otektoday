<?php
include '../include/function.php';
$nologneed=1;
include '../selecting/selecting.dc.php';
if (isset($_POST['TableName'])) {
$TableName = $_POST['TableName'];

if(!file_exists('../admin-'.mb_strtolower(str_replace(' ','-',$TableName)))){
mkdir('../admin-'.mb_strtolower(str_replace(' ','-',$TableName)), 0777, true);
}
$file = '../admin-'.mb_strtolower(str_replace(' ','-',$TableName)).'/index.php';
$content = '<?php 

?>';

// Write the contents back to the file
file_put_contents($file, $content);

$file = '../admin-'.mb_strtolower(str_replace(' ','-',$TableName)).'/datacontrol.js';
$content = 'jQuery(function ($) {

});';

// Write the contents back to the file
file_put_contents($file, $content);
$file = '../forms/'.mb_strtolower(str_replace(' ','-',$TableName)).'.form.php';
$content = '<?php 

?>';

// Write the contents back to the file
file_put_contents($file, $content);

$file = '../forms/'.mb_strtolower(str_replace(' ','-',$TableName)).'.list.php';
$content = '<?php 

?>';

// Write the contents back to the file
file_put_contents($file, $content);

$file = '../datacontrol/'.mb_strtolower(str_replace(' ','-',$TableName)).'.dc.php';
$content = '<?php 

?>';

// Write the contents back to the file
file_put_contents($file, $content);
}
?>