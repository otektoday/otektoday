<?php
$mystring = $_SERVER['REQUEST_URI'];
$filename = 'head.php';
$pos = strpos($mystring, $filename);
if ($pos === true) {
header("Location:https://" . $_SERVER['HTTP_HOST']);
}
$reNew = '';
$setl = txtLang('en','ar','tr');
if(!empty(session_id())){
$reNew = session_id();
} else {
$reNew = mt_rand();
}

include '../include/contactinfo.php';

$theIMG = isset($headIMG) ? str_replace('..','',$headIMG) : '/assets/images/bespokeclinics1.jpg';
?>
<!-- title -->
<title><?php echo $sitename;echo ' &#8739; '.$title;?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
<!-- description -->
<meta name="description" content="<?php echo getLangArray($sitedesc)?>">
<!-- keywords -->
<meta name="keywords" content="creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, coming soon, faq">
<meta name="author" content="19 Agency">
<!-- ::::::::::::::Google / Search Engine Tags::::::::::::::-->
<meta itemprop="name" content="<?php echo $sitename; echo ' &#8739; '.$title;?>">
<meta itemprop="title" content="<?php echo $sitename; echo ' &#8739; '.$title;?>">
<meta itemprop="description" content="<?php echo $sitedesc;?>">
<meta itemprop="image" content="<?php echo 'https://'. $_SERVER['HTTP_HOST'].$theIMG;?>?<?php echo $reNew;?>">

<!-- ::::::::::::::Facebook Meta Tags::::::::::::::-->
<meta property="og:url" content="<?php echo 'https://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $sitename; echo ' &#8739; '.$title;?>">
<meta property="og:description" content="<?php echo $sitedesc;?>">
<meta property="og:image" content="<?php echo 'https://'. $_SERVER['HTTP_HOST'].$theIMG;?>?<?php echo $reNew;?>">

<!-- ::::::::::::::Twitter Meta Tags::::::::::::::-->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo 'https://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
<meta name="twitter:title" content="<?php echo $sitename; echo ' &#8739; '.$title;?>">
<meta name="twitter:description" content="<?php echo $sitedesc;?>">
<meta name="twitter:image" content="<?php echo 'https://'. $_SERVER['HTTP_HOST'].$theIMG;?>?<?php echo $reNew;?>">
<!-- favicon -->
<link rel="shortcut icon" href="../assets/images/logo/favicon.png">
<link rel="apple-touch-icon" href="../assets/images/logo/57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="../assets/images/logo/72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="../assets/images/logo/114x114.png">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/slick.css" />
<link rel="stylesheet" href="../assets/css/lightgallery.min.css" />
<link rel="stylesheet" href="../assets/css/animate.css" />
<link rel="stylesheet" href="../assets/css/jQueryUi.min.css" />
<link rel="stylesheet" href="../assets/css/textRotate.css" />
<link rel="stylesheet" href="../assets/css/select2.min.css" />
<link rel="stylesheet" href="../assets/css/style.css?<?php echo $reNew;?>" />
<link rel="stylesheet" href="../assets/css/theme/theme_type1.css" />
<link rel="stylesheet" href="<?php echo txtLang('../assets/css/table.css?','../assets/css/tablertl.css?','../assets/css/table.css?').$reNew;?>">
<!-- responsive css -->
<link rel="stylesheet" href="../assets/css/otek.css?<?php echo $reNew;?>">
<link rel="stylesheet" href="../assets/css/fontawesome-all.css" />
<link rel="stylesheet" href="../assets/css/flaticon.css" />

<!-- ::::::::::::::MAIN CSS::::::::::::::-->
<link rel="manifest" href="../manifest.webmanifest?<?php echo $reNew;?>" />




<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<!--[if IE]>
<script src="../assets/js/html5shiv.js"></script>
<![endif]-->
<?php 
$getheadScript = getsitecontent(0,$conn,NULL,1,'Head Script');
if(!empty($getheadScript)){
echo $getheadScript[0]['ContentText'];
}
?>