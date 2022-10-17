<?php
  include_once '../include/function.php';
  //First we check if the form has been submitted
  $array = array();
  if (isset($_POST['submit']) && isset($_FILES['photo'])) {
    //Then we grab the file using the FILES superglobal
    //When we send a file using FILES, we also send all sorts of information regarding the file
    $photo = $_FILES['photo'];
    //Here we get the different information from the file, and assign it to a variable, just so we have it for later
    //If you use 'print_r($file)' you can see the file info in the browser
    $fileName = $photo['name'];
    $fileType = $photo['type'];
    //The 'tmp_name' is the temporary location the file is stored in the browser, while it waits to get uploaded
    $fileTempName = $photo['tmp_name'];
    $fileError = $photo['error'];
    $fileSize = $photo['size'];

    //Later we are going to decide the file extensions that we allow to be uploaded
    //Here we are getting the extension of the uploaded file
    //First we split the file name into name and extension
    $fileExt = explode('.', $fileName);
    //Then we get the extention
    $fileActualExt = mb_strtolower(end($fileExt));

    //Here we declare which extentions we want to allow to be uploaded (You can change these to any extention YOU want)
      $allowed = array('jpg','png','jpeg','svg');
      if ($_POST['filetype'] == 'photo') {
      $allowed = array('jpg','png','jpeg','svg');
    }
    if ($_POST['filetype'] == 'video') {
      $allowed = array('mp4');
    }
    if ($_POST['filetype'] == 'file') {
      $allowed = array('doc','docx','pdf','xls','xlsx');
    }
    $filefolder = '';
    if (!empty($_POST['filefolder'])) {
      $filefolder = $_POST['filefolder'].'/';
    }
if(!file_exists('../include/attachment/'.$filefolder)){
  mkdir('../include/attachment/'.$filefolder, 0777, true);
}
    //First we check if the extention is allowed on the uploaded file
    if (in_array($fileActualExt, $allowed)) {
      //Then we check if there was an upload error
      if ($fileError === 0) {
        //Here we set a limit on the allowed file size (in this case 500mb)
        if (($fileSize < 9000000 && $_POST['filetype'] == 'photo') || ($fileSize < 90000000 && $_POST['filetype'] == 'video') || ($fileSize < 9000000 && $_POST['filetype'] == 'file')) {
          //We now need to create a unique ID which we use to replace the name of the uploaded file, before inserting it into our rootfolder
          //If we don't do this, we might end up overwriting the file if we upload a file later with the same name
          //Here we create a unique ID based on the current time, meaning that no ID is identical. And we add the file extention type behind it.
          $fileNameNew = uniqid('', true).'.'.$fileActualExt;
          //Here we define where we want the new file uploaded to
          $fileDestination = '../include/attachment/'.$filefolder.$fileNameNew;
          //And finally we upload the file using the following function, to send it from its temporary location to the uploads folder
          move_uploaded_file($fileTempName, $fileDestination);
          //Going back to the previous page
        //   header('Location: index.php');
        array_push($array, array('result' => 'success'));
        $message = txtLang('dosyanız başarıyla yüklendi','your file was uploaded successfully','تم تحميل ملفك بنجاح');
        array_push($array, array('message' => $message));
        array_push($array, array('filephoto' => $fileDestination));
        $jarrayx = json_encode($array);
        echo $jarrayx;
        die();
        }
        else {
          array_push($array, array('result' => 'alert'));
          $message = txtLang('Dosyanız çok büyük','Your file is too big','ملفك كبير جدًا');
          array_push($array, array('message' => $message));
          $jarrayx = json_encode($array);
          echo $jarrayx;
          die();
        }
      }
      else {
        array_push($array, array('result' => 'error'));
        $message = txtLang('Dosyanız yüklenirken bir hata oluştu, tekrar deneyin','There was an error uploading your file, try again','حدث خطأ أثناء تحميل ملفك ، حاول مرة أخرى');
        array_push($array, array('message' => $message));
        $jarrayx = json_encode($array);
        echo $jarrayx;
        die();
      }
    }
    else {
      array_push($array, array('result' => 'error'));
      $message = txtLang('Bu tür dosyaları yükleyemezsiniz','You cannot upload files of this type','لا يمكنك تحميل ملفات من هذا النوع');
      array_push($array, array('message' => $message));
      $jarrayx = json_encode($array);
      echo $jarrayx;
      die();
    }
  }    else {
    array_push($array, array('result' => 'error'));
    $message = txtLang('Dosyanız yüklenirken bir hata oluştu, tekrar deneyin','There was an error uploading your file, try again','حدث خطأ أثناء تحميل ملفك ، حاول مرة أخرى');
    array_push($array, array('message' => $message));
    $jarrayx = json_encode($array);
    echo $jarrayx;
    die();
  }
