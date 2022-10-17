<?php 

include '../include/function.php';
$nologneed=1;
include '../selecting/selecting.dc.php';
include '../include/contactinfo.php';



if(!empty($_POST['webmessageman'])){

$nameRequester=base64_decode($_POST['MessageFrom']);
$emailRequester=base64_decode($_POST['MessageEmail']);

$phoneRequester = base64_decode($_POST['MessagePhone']);

$subjectRequester = base64_decode($_POST['MessageSubject']);
$msgRequester = base64_decode($_POST['MessageBody']);
$emailSubject=txtLang($sitename.' Website Message',' رسالة من الموقع الإكتروني'.$sitename,$sitename.' Websitesinden Mesajı');
$messageRequester = $emailSubject.'<br>';

$messageRequester .= txtLang('Name','الأسم','Adı').': '.'<br>'.$nameRequester.'<br>'.'<br>';
$messageRequester .= txtLang('Email','بريد إلكتروني','ePosta').': '.'<br>'.$emailRequester.'<br>'.'<br>';

$messageRequester .= txtLang('Phone','هاتف','Telefone').': '.'<br>'.$phoneRequester.'<br>'.'<br>';

$messageRequester .= txtLang('Subject','الموضوع','Konu').': '.'<br>'.$subjectRequester.'<br>'.'<br>';
$messageRequester .= txtLang('Message','الرسالة','Mesaj').':<br> '.'<br>'.$msgRequester.'<br>';

echo smtpmailer('info@bespokeclinics.com','ws@bespokeclinics.com',txtLang($sitename.' Website','موقع '.$sitename,$sitename.' Websitesi'),base64_encode($emailSubject),base64_encode($messageRequester),$emailRequester,$nameRequester);

// mb_send_mail($nameRequester,$serviceRequester,$messageRequester);

} else {



}







?>