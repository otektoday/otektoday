<?php 
if(!empty(session_id())){
$reNew = session_id();
} else {
$reNew = mt_rand();
}
if(!empty($mystring)){
echo '<div id="clear" data-id="clear">';
echo '<!-- javascript libraries -->';
echo '<script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>';
echo '<script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>';
echo '<script src="../assets/js/isotope.pkg.min.js"></script>';
echo '<script src="../assets/js/jquery.slick.min.js"></script>';
echo '<script src="../assets/js/counter.min.js"></script>';
echo '<script src="../assets/js/lightgallery.min.js"></script>';
echo '<script src="../assets/js/ripples.min.js"></script>';
echo '<script src="../assets/js/wow.min.js"></script>';
echo '<script src="../assets/js/jQueryUi.js"></script>';
echo '<script src="../assets/js/textRotate.min.js"></script>';
echo '<script src="../assets/js/select2.min.js"></script>';
echo '<script src="../assets/js/plugins.js"></script>';
echo '<script src="../assets/js/main.js"></script>';
echo '<script src="../assets/js/otek/sw.js?'.$reNew.'"></script>';
echo '<script src="../assets/js/otek/fslightbox.js?'.$reNew.'"></script>';
echo '<script src="../assets/js/otek/otek.js?'.$reNew.'"></script>';
echo '<script src="../assets/js/otek/mailgo.min.js?'.$reNew.'"></script>';
if(pagename($mystring)=='admin-webmessage' || pagename($mystring)=='admin-newsubscription'){
echo '<script src="../assets/js/otek/xlsx.core.min.js?'.$reNew.'"></script>
<script src="../assets/js/otek/Blob.js?'.$reNew.'"></script>
<script src="../assets/js/otek/FileSaver.js?'.$reNew.'"></script>
<script src="../assets/js/otek/tableexport.js?'.$reNew.'"></script>';
}
echo '<script src="datacontrol.js?'.$reNew.'"></script>';
echo '</div>';
}