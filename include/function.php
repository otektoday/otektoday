<?php
isset($_SESSION) ? '' : session_start();
$lang =  txtLang('en','ar','tr','ex');
function txtLang($en, $ar, $tr, $ex=NULL)
{
	$cookie_name = 'Lang';
	if (isset($_COOKIE[$cookie_name])) {
		$lang = $_COOKIE[$cookie_name];
		// $lang = 'ar';
		$_SESSION['userlang'] = $lang;
		$mylang = $lang;
		// die();
	} else {
		if (!empty($_SESSION['userlang'])) {
			$mylang = $_SESSION['userlang'];
		}  else {
			$Blang = isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2) : 'en';
			$acceptLang = ['en'];
			$Blang = in_array(substr($Blang,0,2), $acceptLang) ? substr($Blang,0,2) : 'en';
			if (!empty($Blang)) {
				$mylang = $Blang;
			} else {
				$mylang = 'en';
			}
			$_SESSION['userlang'] = $mylang;
			setcookie($cookie_name, $mylang, time() + (86400 * 30), '/');
		}
	}
	switch ($mylang) {
		case "en":
			return $en;
			break;
		case "tr":
			return $tr;
			break;
		case "ar":
			return $ar;
			break;
		case "ex":
			return $ex;
			break;
		default:
			return $en;
			break;
	}
}
function appAlert($userPress){
	$cookie_name = 'appAlert';
	$myreq = $userPress;
	setcookie($cookie_name, $myreq, time() + (86400 * 100), '/');
}
if(!empty($_POST['SetappAlert'])){
appAlert($_POST['SetappAlert']);
}
if(!empty($_POST['GetappAlert'])){
echo isset($_COOKIE['appAlert'])?$_COOKIE['appAlert']:'AlertShow';
}
function pnameb($mystring, $pnameb)
{
	$pos = !(strpos($mystring, $pnameb)) ? false : true;
	return $pos;
}

function pagename($mystring)
{
	$mystring = str_replace('/','|',$mystring);
	$pagename = explode('|', $mystring);
	$count = count($pagename);
	$count = $count - 2;
	$pagename = mb_strtolower($pagename[$count]);
	return $pagename;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

function smtpmailer($to, $from, $from_name, $subject, $body, $repemail, $sendername)
{
	global $error;
	$mail = new PHPMailer(true);  // create a new object
	$mail->isSMTP(); // enable SMTP
	$mail->CharSet = 'UTF-8';
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'mail.bespokeclinics.com';
	$mail->Port = 587;
	$mail->isHTML(true);
	$mail->Username = 'ws@bespokeclinics.com';
	$mail->Password = '4PTUhM%X2{go';
	$mail->setFrom($from, $from_name);
	$mail->Subject = base64_decode($subject);
	// $mail->addAttachment('../attchments/otektoday-AboutUs.pdf','otektoday-AboutUs');
	$body=base64_decode($body);
	$mail->Body = str_replace([PHP_EOL,'\n'],'<br>',$body);
	$mail->addAddress($to);
	$mail->addReplyTo($repemail, $sendername);
	// $mail->addBCC($bccemail, $sendername);
	$mail->addBCC($repemail, $sendername);
	$mail->addBCC($from, $sendername);

	if (!$mail->send()) {
		$error = 'Mail error: ' . $mail->ErrorInfo;
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}

function getdatename($date)
{
	if (empty($date)) {
		$date = mb_strtolower(date('D'));
	} else {
		$date = date_create($date);
		$date = date_format($date, 'D');
		$date = mb_strtolower($date);
	}
	$daynum = 0;
	switch ($date) {
		case "mon":
			return 1;
			break;
		case "tue":
			return 2;
			break;
		case "wed":
			return 3;
			break;
		case "thu":
			return 4;
			break;
		case "fri":
			return 5;
			break;
		case "sat":
			return 6;
			break;
		default:
			return 0;
			break;
	}
}

function getdatenubmber($daynum)
{

	switch ($daynum) {
		case '1':
			return txtLang('Pzt','Mon','الأثنين');
			break;
		case '2':
			return txtLang('Sal','Tue','الثلاثاء');
			break;
		case '3':
			return txtLang('Çar','Wed','الأربعاء');
			break;
		case '4':
			return txtLang('Per','Thu','الخميس');
			break;
		case '5':
			return txtLang('Cum','Fri','الجمعة');
			break;
		case '6':
			return txtLang('Cmt','Sat','السبت');
			break;
		case '7':
			return txtLang('Paz','Sun','الأحد');
			break;
		default:
			return 0;
			break;
	}
}

function getmeeting($tdid)
{
	if (isset($tdid)) {
		$daycode = substr($tdid, 0, 3);
		$timcode = substr($tdid, 3, 2);
		$daytimcode = '';
		$daynum = 0;
		$caldate = '';
		switch ($daycode) {
			case "mon":
				$daytimcode = txtLang('Monday','Pazartesi','الأثنين');
				$daynum = 1;
				break;
			case "tue":
				$daytimcode = txtLang('Tuesday','Salı','الثلاثاء');
				$daynum = 2;
				break;
			case "wed":
				$daytimcode = txtLang('Wednesday','Çarşamba','الأربعاء');
				$daynum = 3;
				break;
			case "thu":
				$daytimcode = txtLang('Thursday','Perşembe','الخميس');
				$daynum = 4;
				break;
			case "fri":
				$daytimcode = txtLang('Friday','Cuma','الجمعة');
				$daynum = 5;
				break;
			case "sat":
				$daytimcode = txtLang('Saturday','Cumartesi','السبت');
				$daynum = 6;
				break;
			default:
				$daytimcode = 'Error';
				break;
		}
		$todaydate = getdatename(date('Y-m-d'));
		if ($daynum > $todaydate) {
			$interval = $daynum - $todaydate;
			$interval .= 'days';
			$caldate = date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string($interval));
			$caldate = date_format($caldate, 'd.m.Y');
		} else {
			$interval = 7 - ($todaydate - $daynum);
			$interval .= 'days';
			$caldate = date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string($interval));
			$caldate = date_format($caldate, 'd.m.Y');
		}
		$daytimcode .= ' ';
		$daytimcode .= $caldate;
		$daytimcode .= ' ';
		switch ($timcode) {
			case "10":
				$daytimcode .= '10:30-12:00';
				break;
			case "12":
				$daytimcode .= '12:00-13:30';
				break;
			case "15":
				$daytimcode .= '15:00-16:30';
				break;
			case "16":
				$daytimcode .= '16:30-18:00';
				break;
			default:
				$daytimcode = 'Error';
				break;
		}
		if (pnameb($daytimcode, 'Error') !== false) {
			return false;
		} else {
			return $daytimcode;
		}
	}
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function UserLogout($LogOut=NULL)
{
if(!is_null($LogOut)){
$cookie_VendorID = 'VendorIDL';
$cookie_VuserID = 'VuserID';
$cookie_vendoradmin = 'vendoradmin';
$cookie_vendorlogged = 'vendorlogged';
$cookie_CustomerID = 'CustomerID';
$cookie_customerlogged = 'customerlogged';
$cookie_customerAddress = 'CustomerAddress';
$cookie_customerToken = 'CustomerToken';
$cookie_vendorToken = 'VendorToken';

setcookie($cookie_VendorID, '', time() - 3600, '/');
setcookie($cookie_VuserID, '', time() - 3600, '/');
setcookie($cookie_vendoradmin, '', time() - 3600, '/');
setcookie($cookie_vendorlogged, '', time() - 3600, '/');
setcookie($cookie_vendorToken, '', time() + (86400 * 30), '/');
setcookie($cookie_CustomerID, '', time() - 3600, '/');
setcookie($cookie_customerlogged, '', time() - 3600, '/');
setcookie($cookie_customerAddress, '', time() + (86400 * 30), '/');
setcookie($cookie_customerToken, '', time() + (86400 * 30), '/');
}
// setcookie('PHPSESSID','',time() - 3600, '/');
session_unset();
session_destroy();

return 'done';
// header('Location:../admin/');

}

function WhosLogged()
{
	SessionTime();
	if(!empty($_COOKIE['customerlogged']) && !isset($_SESSION['CustomerID'])){
		$_SESSION['customerlogged'] = $_COOKIE['customerlogged'];
		$_SESSION['CustomerID'] = $_COOKIE['CustomerID'];
		$_SESSION['CustomerGender'] = $_COOKIE['CustomerGender'];
		isset($_COOKIE['CustomerAddress'])?$_SESSION['CustomerAddress'] = $_COOKIE['CustomerAddress']:'';
	}
	if(!empty($_COOKIE['vendorlogged']) && !isset($_SESSION['VendorIDL'])){
		$_SESSION['vendorlogged'] = $_COOKIE['vendorlogged'];
		$_SESSION['VendorIDL'] = $_COOKIE['VendorIDL'];
		$_SESSION['VuserID'] = $_COOKIE['VuserID'];
	}
	if(!empty($_COOKIE['vendoradmin']) && !isset($_SESSION['VendorIDL'])){
		$_SESSION['vendoradmin'] = $_COOKIE['vendoradmin'];
		$_SESSION['VendorIDL'] = $_COOKIE['VendorIDL'];
		$_SESSION['VuserID'] = $_COOKIE['VuserID'];
	}
	if (empty($_SESSION['adminlogged']) && empty($_SESSION['userlogged']) && empty($_SESSION['vendoradmin']) && empty($_SESSION['vendorlogged']) && empty($_SESSION['customerlogged'])) {
		return 'noone';
	}
	if (!empty($_SESSION['adminlogged'])) {
		return 'adminlogged';
	}
	if (!empty($_SESSION['userlogged'])) {
		return 'userlogged';
	}
	if (!empty($_SESSION['adminlogged']) && !empty($_SESSION['userlogged'])) {
		return 'noone';
	}
	if (!empty($_SESSION['vendoradmin'])) {
		return 'vendoradmin';
	}
	if (!empty($_SESSION['adminlogged']) && !empty($_SESSION['vendoradmin'])) {
		return 'noone';
	}
	if (!empty($_SESSION['vendorlogged'])) {
		return 'vendorlogged';
	}
	if (!empty($_SESSION['adminlogged']) && !empty($_SESSION['vendorlogged'])) {
		return 'noone';
	}
	if (!empty($_SESSION['customerlogged'])) {
		return 'customerlogged';
	}
	if (!empty($_SESSION['adminlogged']) && !empty($_SESSION['customerlogged'])) {
		return 'noone';
	}
}
if(!empty($_POST['WhosLogged'])){
	echo WhosLogged();
}

function setSession($sessionName, $sessionValue){
$_SESSION[$sessionName] = $sessionValue;
}
if(!empty($_POST['SETSESSION'])){
SessionTime();
$SessionExplode = explode('|',$_POST['SETSESSION'].'|');
setSession($SessionExplode[0],$SessionExplode[1]);
echo $_SESSION[$SessionExplode[0]];
}
if(!empty($_POST['GETSESSION'])){
echo $_SESSION[$_POST['GETSESSION']];
}
function SessionTime()
{
	$time = $_SERVER['REQUEST_TIME'];

/**
* for a 30 minute timeout, specified in seconds
*/
$timeout_duration = 3600;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    UserLogout();
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time;
}

function generateCode(){
	$options = [
		'cost' => 10,
	];
	$ModifiedDate = date('Y-m-d H:i:s');
	$hash =  password_hash($ModifiedDate, PASSWORD_BCRYPT, $options);
	return $hash;
	if (!empty($_POST['generateCode'])) {
		echo $hash;
	}
}

if (!empty($_POST['generateCode'])) {
	generateCode();
}

function generateKey() {
	$keyLength = 8;
	$str = 'VS1234567890';
	$randStr = substr(str_shuffle($str), 0, $keyLength);
	if (!empty($_POST['genpass'])) {
		echo $randStr;
	} else {
		return $randStr;
	}
  }

  if (!empty($_POST['genpass'])) {
	  generateKey();
  }
function generateKupon() {
	$keyLength = 10;
	$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$randStr = substr(str_shuffle($str), 0, $keyLength);
	if (!empty($_POST['genkupon'])) {
		echo $randStr;
	} else {
		return $randStr;
	}
  }

  if (!empty($_POST['genkupon'])) {
	generateKupon();
  }

  function generateConfCode() {
	$keyLength = 6;
	$str = '1234567890';
	$randStr = substr(str_shuffle($str), 0, $keyLength);
	if (!empty($_POST['genconf'])) {
		echo $randStr;
	} else {
		return $randStr;
	}
  }

  if (!empty($_POST['genconf'])) {
	generateConfCode();
  }

  function newfilename($filename){
	$fileExt = explode('.', $filename);
	$fileActualExt = mb_strtolower(end($fileExt));
	$fileNameNew = uniqid('', true).".".$fileActualExt;
	return $fileNameNew;
  }

  function unlinkfile($filename){
	  if (file_exists($filename)) {
		unlink($filename);
	  }
  }

  if (!empty($_POST['unlinkfile'])) {
	unlinkfile($_POST['unlinkfile']);
}

function project(){
	$project[] = txtLang('Afandem Taksi','Afandem Taksi','Afandem Taksi');
	$projectDesc=[
	'English'=> 'Afandem Taksi It is not just a taxi calling application, it is a safe and affordable transportation application.',
	'Arabic' => 'Afandem Taksi أكثر من مجرد تطبيق لطلب سيارات الأجرة، إنه تطبيق نقل آمن وبأسعار معقولة.',
	'Turkish' => 'Afandem Taksi Sadece bir taksi çağırma uygulaması değil, güvenli ve ekonomik bir ulaşım uygulamasıdır.',
	];
	$project[] = getLangArray(implode('|',$projectDesc));
	return $project;
}

function StatusInfo($statusinfo, $statustxt='0,0')
{
$statusarray = explode(',',$statustxt);
$statusres = array();
if ($statusinfo == 1) {
	$statusres['Status'] = $statusarray[0];
	$statusres['Colour'] = 'color-primary';
}
if ($statusinfo == 0) {
	$statusres['Status'] = $statusarray[1];
	$statusres['Colour'] = 'color-red';
}
if ($statusinfo == 2) {
	$statusres['Status'] = '';
	$statusres['Colour'] = '';
}
return $statusres;
}
function GenderInfo($statusinfo, $statustxt='0,0')
{
$statusarray = explode(',',$statustxt);
$statusres = array();
if ($statusinfo == 1) {
	$statusres['Status'] = $statusarray[0];
	$statusres['Colour'] = 'secondary color';
}
if ($statusinfo == 2) {
	$statusres['Status'] = $statusarray[1];
	$statusres['Colour'] = 'secondary color';
}
if ($statusinfo == 0) {
	$statusres['Status'] = '';
	$statusres['Colour'] = '';
}
return $statusres;
}

function ScoreStars($Score){
	$ScoreStars = '';
	if($Score>intval($Score)){
		$Score = intval($Score+1);
	}
	$Scorearray = array();
	for ($i=0; $i < $Score; $i++) {
		$last = $Score - $i;
		if($Score==1){
			$ScoreStars = '<i data-score="'.$i.'" class="fas fa-star-half-alt"></i>';
		} else {
			if ($last != 1 & $i % 2 != 0) {
				$ScoreStars .= '<i data-score="'.$i.'" class="fas fa-star"></i>';
			}
			if ($last == 1 & $i % 2 != 0) {
				$ScoreStars .= '<i data-score="'.$i.'" class="fas fa-star"></i>';
			}
			if ($last == 1 & $i % 2 == 0) {
				$ScoreStars .= '<i data-score="'.$i.'" class="fas fa-star-half-alt"></i>';
			}
		}
	}
	$repeatScore=((10-$Score)%2==0?(10-$Score)/2:(10-$Score-1)/2);
	$ScoreStars .= str_repeat('<i data-score="'.$Score.'" class="fas fa-star-half-alt"></i>',$repeatScore);
	$ScoreColor = '';
	if($Score>0){
		$ScoreColor = 'red color';
	}
	if($Score>4){
		$ScoreColor = 'orange';
	}
	if($Score>7){
		$ScoreColor = 'green';
	}
	$Scorearray['Stars']=$ScoreStars;
	$Scorearray['Colour']=$ScoreColor;
	return $Scorearray;
}

function GetModuleAccess($ModuleTable, $conn){
	SessionTime();
$datatablename = $ModuleTable;
$WhoLogAccess = 'noaccess';
$dataresult = moduleaccessbyid(0,$conn);
if(!empty($dataresult)){
if(is_object($dataresult)){
while($dataresultrow = mysqli_fetch_assoc($dataresult)){
if ($dataresultrow['ModuleTable'] == $datatablename && $dataresultrow['ModuleStatus'] === 1) {
	switch ($dataresultrow['ModuleAccess']) {
		case 0:
			$WhoLogAccess = 'userlogged';
			break;
		case 1:
			$WhoLogAccess = 'adminlogged';
			break;
		case 2:
			$WhoLogAccess = 'vendoradmin';
			break;
		case 3:
			$WhoLogAccess = 'vendorlogged';
			break;
		case 4:
			$WhoLogAccess = 'customerlogged';
			break;
		default:
			# code...
			break;
	}
} elseif ($dataresultrow['ModuleTable'] == $datatablename && $dataresultrow['ModuleStatus'] === 0) {
    $WhoLogAccess = 'noaccess';
}
}
}
}
return $WhoLogAccess;
}

function autoColor(){
	$rand = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
	$opacity = array('f','4','5','6','7','8','9','a','b');
	$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$opacity[0].$rand[rand(0,15)];
    return $color;
}
/**
 * Check if the file link is exist, if not, it will return a default file link instead
 * @param string $File
 * @param int $Option keep it null if you don't need options
 * @param string $rFile if omitted the default file link will be returned (webapp logo)
 * @return string
 */
function getFileValue($File, $Option = 0, $rFile = null)
{
    $Filex = mb_detect_encoding(base64_decode($File),'UTF-8', true) ? base64_decode($File) : $File;
    $FileValue = explode(';', $Filex.';')[$Option];

    if (!file_exists($FileValue)) {
        if (!is_null($rFile)) {
            $FileValue = $rFile;
        } else {
            $FileValue = '../assets/images/logo/256x256.png';
        }
    }
    return $FileValue;
}
/**
 * Return if the string is encoded or not
 * @param string $encode
 */
function isArabic($talk)
{
    $tak = 'اؤةءىئأبجحخدذرزسشصضطظعغفقكلمنهوي';
    $theFalse = false;
    for ($i = 0; $i < mb_strlen($tak); $i++) {
        $theFalse === false ? (strpos($talk, mb_substr($tak, $i, 1)) !== false ? ($theFalse = true) : '') : '';
    }
    return $theFalse;
}

/**
 * Return the correspondent string for the session language splitted by the charchter '|'
 * @param string $fieldValue
 * @return string
 */
function getLangArray($fieldValue,$lang=NULL){
$fieldValue = !mb_detect_encoding(base64_decode($fieldValue),'UTF-8', true) ? $fieldValue : base64_decode($fieldValue);

$controlValue = explode('|',$fieldValue);
if(count($controlValue)!=4){
$fieldValue .= '|'.str_repeat($controlValue[count($controlValue)-1].'|',4-count($controlValue));
}

$controlValue = explode('|',$fieldValue.'|');
return is_null($lang) ? trim(str_replace('\\n',PHP_EOL,str_replace('\\\'',"’", txtLang($controlValue[0],$controlValue[1],$controlValue[2],$controlValue[3])))) : trim(str_replace('\\n',PHP_EOL,str_replace('\\\'',"’", $controlValue[$lang-1]))) ;
}
/**
 * Return the content of the given input as string 
 * @param string $inString
 * @return string
 */
function displayString($inString){
$inString = base64_encode(base64_decode($inString)) == $inString ? base64_decode($inString) : $inString;
$inString = htmlentities($inString);
return  $inString;
}

/**
 * Insert HTML element for a checkbox with slider css, you need to provide the name of the input as any input should, the status (0,1) as boolean and the id of the record
 * @param string $Name
 * @param int $Status
 * @param int $ID
 * @return string
 */
function tableSwitch($Name,$Status,$ID){
$Checked = $Status== 1?'checked':'';
$Switch = '<label class="color primary" for="'.$Name.'-'.$ID.'" class="switch">
	<input name="'.$Name.'" id="'.$Name.'-'.$ID.'" value="'.$Status.'" type="checkbox" '.$Checked.'>
	<span class="slider round" data-id="'.$Name.'-'.$ID.'"></span>
	</label>';
	return $Switch;
}
/**
 * Insert HTML button which will be used in datacontrol.js, set the icon and text of the button, and option if the search bar should be shown beside the button
 * @param string $Name
 * @param string $Icon
 * @param string $ID
 * @param string $Class
 * @param int $ShowSearch
 * @return string
 */
function actionButton($ID, $Name, $Icon = '<i class="fas fa-sparkles"></i> ',$Class=NULL, $ShowSearch=false, $AddBtn=true){
	$ControlID = $ID;
	$ControlText = $Name;
	$ControlIcon = $Icon;

	if(is_null($Class)){
		unset($ControlClass);
	}else{
		$ControlClass = $Class;
	}

	if(!($ShowSearch)){
		unset($SearchBar);
	}else{
		$SearchBar = $ShowSearch;
	}
 
	if($AddBtn){
		unset($NoAddBtn);
	}else{
		$NoAddBtn = $AddBtn;
	}
	include '../include/listnewrecord.php';

}
function textFormatingControls($textarea){
	$textFormatingControls = '<div class=" flex justify-around mtb-5 col-6 '. txtLang('float-right','float-left','float-right').'">
<div class="btn color-fff border-primary back-primary back-secondary-hover border-primary-hover border-radius-4 ptb-10 plr-30 caps txtformat setparagraf" data-target="'.$textarea.'"><i class="fad fa-paragraph"></i></i></div>
<div class="btn color-fff border-primary back-primary back-secondary-hover border-primary-hover border-radius-4 ptb-10 plr-30 caps txtformat setbold" data-target="'.$textarea.'"><i class="fad fa-bold"></i></div>
<div class="btn color-fff border-primary back-primary back-secondary-hover border-primary-hover border-radius-4 ptb-10 plr-30 caps txtformat setlistul" data-target="'.$textarea.'"><i class="fad fa-list-ul"></i></div>
<div class="btn color-fff border-primary back-primary back-secondary-hover border-primary-hover border-radius-4 ptb-10 plr-30 caps txtformat setlistol" data-target="'.$textarea.'"><i class="fad fa-list-ol"></i></div>
<div class="btn color-fff border-primary back-primary back-secondary-hover border-primary-hover border-radius-4 ptb-10 plr-30 caps txtformat setlist" data-target="'.$textarea.'"><i class="fas fa-list"></i></div>
</div>';

return $textFormatingControls;
}
function displayMedia($mediaFile,$nID=0,$widThing=100){
	$mediaFileString = base64_decode($mediaFile);
$mediaFileElement = '';
$fileList = explode(';',$mediaFileString.';');
$fileExt = explode('.', $fileList[0]);
$fileActualExt = mb_strtolower(end($fileExt));
$fileType = NULL;
$allowed = array('jpg','png','jpeg','svg','webp');
in_array($fileActualExt, $allowed) ? $fileType = 'photo' : '';
$allowed = array('mp4');
is_null($fileType) ? (in_array($fileActualExt, $allowed) ? $fileType = 'video' : '') : '';
$allowed = array('docx','xlsx','pdf','txt');
is_null($fileType) ? (in_array($fileActualExt, $allowed) ? $fileType = 'file' : '') : '';
is_null($fileType) ? (!(strpos($fileList[0],'youtube')) ? '' : $fileType = 'youtube') : '';
if(!is_null($fileType)){
switch ($fileType) {
case 'photo':
    $mediaFileElement = '<img src="'.$fileList[0].'" id="File'.$nID.'" style="width:'.$widThing.'px;max-width:100vw;height:'.intval(($widThing > 888 ? 888 : $widThing) * 9/16).'px;object-fit:contain;">';
break;
case 'video':
    $mediaFileElement = '<video autoplay muted loop="true" id="File'.$nID.'" style="width:'.$widThing.'px;height:'.intval(($widThing > 888 ? 888 : $widThing) * 9/16).'px;object-fit:contain;"> <source type="video/mp4" src="'.$fileList[0].'"></video>';
break;
case 'file':
    $mediaFileElement = '<iframe src="'.$fileList[0].'#toolbar=0&view=FitH" width="'.$widThing.'px" height="'.$widThing.'px">
    </iframe>';
break;
case 'youtube':
    $mediaFileElement = '<object data="'.$fileList[0].'?autoplay=1&mute=1" id="File'.$nID.'" style="width:'.$widThing.'px;height:'.intval(($widThing > 888 ? 888 : $widThing) * 9/16).'px;object-fit:contain;"></object>';
break;

default:
# code...
break;
}
}
return $mediaFileElement;
}
/**
 * Use number format function to display an Integer or Float with or without a currency sign, decimal, and Thousand separator
 * @param string $Amount 
 * @param string $Decimal if it is ',' then the Thousand Separator will be '.' - if it is '.' then the Thousand Separator would be ','
 * @param string $Currency a short two letters for the currency sign Default is 'TL' and the available are 'US', 'EU', 'BP'
 * @param integer $SignBefore a number 0 or 1 to define if the 0= the sign after the number, 1= the sign before the number, Default is 1
 * @param integer $Digits the number of digits after the decimal, Default is 2
 * @return string the final formated number in string format
 */
function amountCurrency($Amount,$Decimal = ',',$Currency='TL', $SignBefore=1,$Digits=2){
	$Thou = $Decimal==','?'.':',';
	$Amount = number_format($Amount,$Digits,$Decimal,$Thou);
	$Sign='';
	switch ($Currency) {
		case 'TL':
			$Sign = '<i class="fal fa-lira-sign"></i>';
			break;
		case 'US':
			$Sign = '<i class="fal fa-dollar-sign"></i>';
			break;
		case 'EU':
			$Sign = '<i class="fal fa-euro-sign"></i>';
			break;
		case 'BP':
			$Sign = '<i class="fal fa-pound-sign"></i>';
			break;
		default:
		$Sign = '';
		break;
	}
	$newAmount=$SignBefore==1 ? $Sign.' '.$Amount:$Amount.' '.$Sign;
	return $newAmount;
}
/**
 * Return a string without any spaces or dashes or brackets or leading zeros but with a leading plus sign
 * @param string $phone
 * @return string
 */
function phoneNumber($phone,$plus='+'){
	$thePhone = $plus.str_replace([' ','-','(',')','#','+'],'',trim($phone));
	return $thePhone;
}

/**
 * Return a date formated 
 * @param string $datevalue
 * @param string $format
 * @return string
 */
function dateFormated($datevalue,$format){
	$dateFormated = date_format(date_create($datevalue),$format);
	return $dateFormated;
}
function aLinkData($link,$key,$value){
	$aLinkData = 'data-href="'.$link.'" data-link="'.base64_encode($key).'" data-srv="'.$value.'"';
	return $aLinkData;
}