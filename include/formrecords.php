<?php 
if(!empty($ButtomText)){
// $ButtomLR = explode('|',$ButtomText);
$ButtomLeftText = $ButtomText[0];
$ButtomRightText = $ButtomText[1];
} else {
$ButtomLeftText = '<i class="far fa-check-circle"></i> '.txtLang('Submit','موافق','Gönder');
$ButtomRightText = '<i class="far fa-times-circle"></i> '.txtLang('Cancel','الغاء','Vazgeç');
}
if(empty($purpose)){
$purpose='';
}
echo '<div class="col-md-12 flex justify-evenly recordsubmitbtn mt-20" data-purpose="'.$purpose.'" style="margin-top:20px;margin-bottom:20px;">
<div class="">
    <div data-id="recordsubmitbtn" data-purpose="'.$purpose.'" class="btn back-primary back-theme-hover color-fff color-fff-hover border-primary border-theme-hover rounded-5 caps plr-30 ptb-10">'. $ButtomLeftText.'</div>
</div>
<div class="">
    <div data-id="recordaddcancel" data-purpose="'.$purpose.'" class="btn back-secondary back-theme-hover color-fff color-fff-hover border-secondary border-theme-hover rounded-5 caps plr-30 ptb-10">'. $ButtomRightText.'</div>
</div>
</div>';
?>