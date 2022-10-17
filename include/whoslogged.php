<?php 
$pos = isset($mystring) ? pnameb('--'.$mystring, 'admin') : false;
if ($pos !== false && !isset($_POST['purpose'])) {
$targetlog='admin';
}
if(empty($targetlog)){
$targetlog='admin';}
if(empty($returnlog)){
$returnlog='admin-home';
}
$Class='';
if(empty($noclass)){
$Class='col-xs-12 col-sm-12 col-md-12 text-center';
}
echo '<div class="'.$Class.'"><button id="logbutton-'.$targetlog.'" data-return="'.$returnlog.'" class="btn back-primary back-theme-hover color-fff color-fff-hover border-primary border-theme-hover rounded-5 caps plr-30 ptb-10"><i class="fal fa-sign-in-alt"></i> '.txtLang('Login','الدخول للحساب','Giriş Yap').'</button></div>';
if(empty($nojs)){
include '../include/js.php';
}
if(empty($nodie)){
die();
}
?>