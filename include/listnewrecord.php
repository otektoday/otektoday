<?php 
// $ControlIcon = '';
if (empty($ControlID)){
$ControlID = 'addnewrecord';
$ControlText = txtLang('Add','اضف','Ekle');
$ControlIcon = '<i class="fal fa-sparkles"></i>';
}
if(empty($ControlClass)){
$ControlClass = 'back-primary back-theme-hover color-fff color-fff-hover border-primary border-theme-hover';
}
$ControlClassA = $ControlClass=='black'?'black':'green';
$ControlClassS = $ControlClass=='black'?'green':'black';
$btnLocation = !empty($SearchBar) ? 'col-xs-12 col-md-12' : '';
$styleSnr = empty($NoAddBtn) ||  !empty($Summing)? ' style="justify-content: space-between; margin-top:20px;margin-bottom:20px;display: inline-block;"' : ' style="display: flow-root; margin-top:20px;margin-bottom:20px;"';
echo '<div class="'.$btnLocation.' addnewSearch '.$ControlID;if(!empty($SearchBar)){ echo ''; }if(!empty($CssClass)){ echo ' '.$CssClass; } echo '" '.$styleSnr.'>';
if(empty($NoAddBtn)){ 
echo '<div id="'.$ControlID.'" class="btn '.$ControlClass.' rounded-5 caps plr-30 ptb-10 ';if(!empty($SearchBar)){ echo txtLang('float-left','float-right','float-left'); } echo'">'.$ControlIcon.' '.$ControlText.'</div>';
}
if(!empty($Summing)){
echo '<div class="summing"></div>';
}
if(!empty($SearchBar)){
if(!empty($_POST['SearchContext'])){
$SearchContext = $_POST['SearchContext'];
} else {
$SearchContext = '';
}
echo '
<div class="'.txtLang('float-right','float-left','float-right').' col-lg-4 col-md-5 col-6">
<form autocomplete="nomore" class="header-search">
<div class="search-form pos-relative st-form-field st-style1">
<input data-id="SearchBar" type="text" class="search-field big-input" placeholder="'.txtLang('Search','بحث','Arama').'" value="'.$SearchContext.'">
<button class="search-submit" type="submit"><i class="fas fa-search gray color"></i></button>
</div>
<!-- /input-group -->
</form>
</div>';
} echo'
<!-- .widget-search end -->
</div>';
?>


