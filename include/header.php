<?php 
include '../include/contactinfo.php';

$headrTheme = in_array(pagename($mystring),['comingsoon','landing','thankyou','home','404']) ? 'color-fff' : 'color-secondary';
$defaultLogo = pagename($mystring) != 'home' && pagename($mystring) != '404' ? (isset($white) ? ['logo-dark default','logo-light'] : ['logo-dark','logo-light default']) : ['logo-dark','logo-light default'];

$logoImage = getBannerGallery(0,$conn,'Website Logo',1);
$logoImage = empty($logoImage) ? array('GalleryImage'=>'../assets/images/logo/logo.png') : $logoImage;
$messageCategorys = getCategory(0,$conn,NULL,1,1);
?>
  <div class="st-perloader">
    <div class="st-perloader-in">
      <div class="st-wave-first">
        <svg   enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08" xmlns="http://www.w3.org/2000/svg"><g><path d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z" /></g></svg>
      </div>
      <div class="st-wave-second">
        <svg   enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08" xmlns="http://www.w3.org/2000/svg"><g><path d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z" /></g></svg>
      </div>
    </div>
  </div>
  <!-- Start Header Section -->
  <header class="st-site-header st-style1 st-sticky-header">
    <div class="st-top-header">
      <div class="container">
        <div class="st-top-header-in">
          <ul class="st-top-header-list">            
            <li>
              <i class="fad fa-envelope <?php echo $headrTheme;?>"></i>
              <a href="mailto:<?php echo $email;?>" class="<?php echo $headrTheme;?>"><?php echo $email;?></a></li>
            <li>
            <i class="fad fa-phone-volume <?php echo $headrTheme;?>" style="rotate: -45deg;"></i>
              <a href="tel:<?php echo phoneNumber($phone);?>" class="<?php echo $headrTheme;?>"><?php echo $phone;?></a></li>
          </ul>
          <a href="#" class="st-top-header-btn st-smooth-move color-secondary color-fff-hover st-contact-open"><?php echo getLangArray($appointment[0]['ContentHead']);?></a>
        </div>
      </div>
    </div>
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-main-header-left">
            <a class="st-site-branding" href="../home/"><img src="<?php echo getFileValue($logoImage['GalleryImage'],0,'../assets/images/logo/logo-light.png')?>" style="height:50px;object-fit:contain;filter: drop-shadow(1px 1px 5px #00000080);" alt="<?php echo $sitename?>"></a>
          </div>
          <div class="st-main-header-right <?php echo in_array(pagename($mystring),['comingsoon','landing','thankyou']) ? 'hidden' : '';?>">
            <div class="st-nav">
              <ul class="st-nav-list">
                <?php include '../include/menu.php';?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->
