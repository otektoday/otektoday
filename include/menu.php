<?php 
$homeLink = pagename($mystring)=='home' ? '': '';
$colorFont = isset($footerMenu) ? 'color-secondary' :(in_array(pagename($mystring),['home','404','comingsoon','landing','thankyou']) ? 'color-fff': 'color-secondary');
$menuElements = getServices(0,$conn,NULL,1,'Menu Elements');
$shdHide = isset($footerMenu) ? ' hidden ' : '';
?>
    <?php 
    foreach ($menuElements as $mElmnt) {
        echo '
        <li><a href="'.$homeLink.''.getLangArray($mElmnt['ServiceDescription']).'" title="'.getLangArray($mElmnt['ServiceName']).'" class="'.$colorFont.' color-primary-hover '.(pagename($mystring) == str_replace(['..','/'],'',getLangArray($mElmnt['ServiceDescription'])) ? 'active' : '').'">'.getLangArray($mElmnt['ServiceName']).'</a></li>
        ';
    }
    ?>
    <li class="menu-item-has-children <?php echo $shdHide;?>"><a href="#" class=" <?php echo $colorFont;?> color-primary-hover"><i class="fal fa-book-reader largefont"></i></a>
        <ul>
        <?php
            if ($_SESSION['userlang']=='en') {
            echo '
            <li><a href="';
            echo '../include/visitorlang.php?lang=tr&bpage='.pagename($mystring);
            echo '" class="unicode enfont text-left color-gray"><img src="../assets/images/icon/flag/tr.png">&nbsp;Türkçe</a></li>';
            echo '
            <li><a href="';
            echo '../include/visitorlang.php?lang=ar&bpage='.pagename($mystring);
            echo '" class="arfont text-right color-gray"><img src="../assets/images/icon/flag/ar.png">&nbsp;العربية</a></li>';
            }
            if ($_SESSION['userlang']=='tr') {
            echo '
            <li><a href="';
            echo '../include/visitorlang.php?lang=en&bpage='.pagename($mystring);
            echo '" class="unicode enfont text-left color-gray"><img src="../assets/images/icon/flag/en.png">&nbsp;English</a></li>';
            echo '
            <li><a href="';
            echo '../include/visitorlang.php?lang=ar&bpage='.pagename($mystring);
            echo '" class="arfont text-right color-gray"><img src="../assets/images/icon/flag/ar.png">&nbsp;العربية</a></li>';
            }
            if ($_SESSION['userlang']=='ar') {
            echo '
            <li><a href="';
            echo '../include/visitorlang.php?lang=tr&bpage='.pagename($mystring);
            echo '" class="unicode enfont text-left color-gray"><img src="../assets/images/icon/flag/tr.png">&nbsp;Türkçe</a></li>';
            echo '
            <li><a href="';
            echo '../include/visitorlang.php?lang=en&bpage='.pagename($mystring);
            echo '" class="unicode enfont text-left color-gray"><img src="../assets/images/icon/flag/en.png">&nbsp;English</a></li>';
            }
        ?>
        </ul>
    </li>
