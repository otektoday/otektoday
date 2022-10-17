<?php 
$isControlPanel = pnameb($mystring,'admin') || pagename($mystring)=='404' || pagename($mystring)=='landing' || pagename($mystring)=='thankyou' ? 'hidden' : '';
$footerContent = getsitecontent(0,$conn,NULL,1,'Footer Section');
?>
<?php include '../include/contactinfo.php';?>

<div class="clonemsg hidden"></div>
<div id="lightBox" class="lightBox hidden ishidden">
<div id="addadminmsg" class="alert text-center font-weight-bold caps"></div>
</div>
  <!-- Start Footer -->
  <footer class="st-site-footer st-sticky-footer st-dynamic-bg <?php echo in_array(pagename($mystring),['404','admin','comingsoon','landing','thankyou']) ? 'hidden' : '';?>" data-src="<?php echo getFileValue('../assets/images/footer-bg.png');?>">
    <div class="st-main-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <div class="st-text-field">
                <img src="<?php echo getFileValue($logoImage['GalleryImage'],0,'../assets/images/logo/logo.png');?>" style="height:50px;object-fit:contain;" alt="Nischinto" class="st-footer-logo">
                <div class="st-height-b25 st-height-lg-b25"></div>
                <div class="st-footer-text"><?php echo $sitedesc;?></div>
                <div class="st-height-b25 st-height-lg-b25"></div>
                <ul class="st-social-btn st-style1 st-mp0">
                  <?php include '../include/socialmedia.php';?>
                </ul>
              </div>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title"><?php echo getLangArray($usefullinks[0]['ContentHead']);?></h2>
              <ul class="st-footer-widget-nav st-mp0">
                <?php $footerMenu = 1;?>
                <?php include '../include/menu.php';?>
              </ul>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title"><?php echo getLangArray($departments[0]['ContentHead']);?></h2>
              <ul class="st-footer-widget-nav st-mp0">
                <?php 
                $footerCategory = getCategory(0,$conn,NULL,1,1);
                if(!empty($footerCategory)){
                foreach ($footerCategory as $fotCat) {
                    echo '
                    <li><a '.aLinkData('../departments','CategoryID',$fotCat['CategoryID']).'>'.getLangArray($fotCat['CategoryName']).'</a></li>
                    ';
                }
                }
                ?>
              </ul>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title"><?php echo getLangArray($contacts[0]['ContentHead']);?></h2>
              <ul class="st-footer-contact-list st-mp0">
                <li><span class="st-footer-contact-title"><i class="fad fa-map-marker-alt color-secondary"></i></span><a href="https://google.com/maps/search/<?php echo $maploc[0].','.$maploc[1]?>/@<?php echo $maploc[0].','.$maploc[1]?>,17z" target="_blank"><?php echo $adres;?></a></li>
                <li><span class="st-footer-contact-title"><i class="fad fa-envelope color-secondary"></i></span> <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
                <li><span class="st-footer-contact-title"><i class="fad fa-phone-volume color-secondary" style="rotate: -45deg;"></i></span><a href="tel:<?php echo phoneNumber($phone);?>" data-whatsapp="<?php echo phoneNumber($whatsapp);?>"><?php echo $phone;?></a></li>
              </ul>
            </div>
          </div><!-- .col -->
        </div>
      </div>
    </div>
    <div class="st-copyright-wrap">
      <div class="container">
        <div class="st-copyright-in">
          <div class="st-left-copyright">
            <div class="st-copyright-text"><?php echo txtLang('Copyright','جميع الحقوق محفوظة','Telif Hakkı').' '.date('Y').', '.$sitename.' ',txtLang('All right reserved','','Tüm hakları saklıdır');?>. <span style=""><?php echo txtLang('Powered by','تم التطوير','developed by');?> <a href="https://otek.today" target="_blank" style="color:#139bd7;">ÖTEK Today</a></span></div>
          </div>
          <div class="st-right-copyright">
            <div class="st-copyright-text"><a href="../policy"><?php echo txtLang('Privacy Policy','سياسة الخصوصية','');?></a> </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Start Video Popup -->
  <div class="st-video-popup" id="videopopup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
      <div class="st-video-popup-layer"></div>
      <div class="st-video-popup-container">
        <div class="st-video-popup-align">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="about:blank"></iframe>
          </div>
        </div>
        <div class="st-video-popup-close"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->

  <!-- Start Video Popup -->
  <div class="st-video-popup" id="contactpopup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
      <div class="st-video-popup-layer"></div>
      <div class="st-video-popup-container rounded-10">
        <div class="st-video-popup-align">
            <form method="POST" class="st-appointment-form mtb-50 mlr-75 sm-mlr-10" id="modal-appointment" style="font-size: initial;">
                <h2 class="st-appointment-form-title text-center"><?php echo getLangArray($makeappointment[0]['ContentHead']);?></h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="st-form-field st-style1">
                        <input type="text" id="fMessageFrom" name="fMessageFrom" class=" MessageFrom" placeholder="<?php echo getLangArray($yourname[0]['ContentHead']);?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-form-field st-style1">
                        <input type="text" id="fMessageEmail" name="fMessageEmail" class=" MessageEmail" placeholder="<?php echo getLangArray($emailaddress[0]['ContentHead']);?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-form-field st-style1">
                        <input type="text" id="fMessagePhone" name="fMessagePhone" class=" MessagePhone" placeholder="<?php echo getLangArray($phonenumber[0]['ContentHead']);?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-form-field st-style1">
                        <input name="fMessageDate" type="text" id="fMessageDate" class="udate MessageDate" placeholder="dd/mm/yyyy" data-format="dd/mm/yy">
                        <div class="form-field-icon"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-form-field st-style1">
                        <div class="st-custom-select-wrap">
                            <select name="fMessageDepartment" id="fMessageDepartment" class="st_select1 MessageDepartment" data-placeholder="<?php echo getLangArray($selectdepartment[0]['ContentHead']);?>">
                              <option></option>
                              <?php 
                              if(!empty($messageCategorys)){
                              foreach ($messageCategorys as $messageCategory) {
                                  echo '
                                  <option value="'.$messageCategory['CategoryID'].'">'.getLangArray($messageCategory['CategoryName']).'</option>
                                  ';
                              }
                              }
                              ?>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="st-form-field st-style1">
                        <div class="st-custom-select-wrap">
                            <select name="fMessageTreatment" class="st_select1 MessageTreatment" id="fMessageTreatment" data-placeholder="<?php echo getLangArray($selecttreatment[0]['ContentHead']);?>">
                              <option></option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="st-form-field st-style1">
                        <input type="hidden" id="fMessageSubject" class="MessageSubject" name="fMessageSubject" value="<?php echo pagename($mystring).' - Modal Appointment';?>">
                        <textarea cols="30" rows="10" id="fMessageBody" name="fMessageBody" class=" MessageBody" placeholder="Write something here..."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="st-btn st-style1 color-fff back-primary back-fff-hover color-primary-hover border-primary st-size-medium w-100" data-id="recordsubmitbtn" type="submit" name="submit"><?php echo getLangArray($sendmessage[0]['ContentHead']);?></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="st-video-popup-close rounded-10 mt-5 mr-5"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->

  <div id="scrollTopBtn" class="back-secondary back-fff-hover border-primary-hover color-fff color-primary-hover rounded-20 justify-center align-items-center" style="filter: drop-shadow(1px 1px 5px #00000080);"><i class="fas fa-long-arrow-alt-up"></i></div>
<div id="socialcontainer">
  <div id="socialMediaBtn" class="back-secondary back-fff-hover border-primary-hover color-fff color-primary-hover rounded-20 justify-center align-items-center" style="filter: drop-shadow(1px 1px 5px #00000080);"><img src="../assets/images/logo/57x57xf.png" style="width:35px;height:35px;object-fit:contain;"></div>
  <a href="../whatsapp/" target="_blank" <?php echo empty($whatsapp) ? 'class="hidden"' : ''?>>
    <div class="socialMediaBtn back-fff-hover border-primary-hover color-fff color-primary-hover rounded-20 justify-center align-items-center" data-bottom="67" data-left="30" style="background-color:#00a884;"><i class="fab fa-whatsapp"></i></div>
  </a>
  <a href="../messenger/" target="_blank" <?php echo empty($messenger) ? 'class="hidden"' : ''?>>
    <div class="socialMediaBtn back-fff-hover border-primary-hover color-fff color-primary-hover rounded-20 justify-center align-items-center" data-bottom="109" data-left="30" style="background-color:#267ff3;"><i class="fab fa-facebook-messenger stroke"></i></div>
  </a>
  <a href="../telegram/" target="_blank" <?php echo empty($telegram) ? 'class="hidden"' : ''?>>
    <div class="socialMediaBtn back-fff-hover border-primary-hover color-fff color-primary-hover rounded-20 justify-center align-items-center" data-bottom="25" data-left="72" style="background-color:#2481cc;"><i class="fab fa-telegram"></i></div>
  </a>
  <a href="tel:<?php echo phoneNumber($phone);?>" target="_blank" data-whatsapp="<?php echo phoneNumber($whatsapp);?>" <?php echo empty($phone) ? 'class="hidden"' : ''?>>
    <div class="socialMediaBtn back-fff-hover border-primary-hover color-fff color-primary-hover rounded-20 justify-center align-items-center" data-bottom="25" data-left="114" style="background-color:var(--primary);"><i class="fad fa-phone-volume" style="rotate: -45deg;"></i></div>
  </a>
</div>