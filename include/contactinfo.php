<?php 
$getCont = sistemcontactinfobyid(0,$conn,1);
$maploc = explode(',','1,1');
if (!empty($getCont)) {
    if (is_object($getCont)) {
        while ($rowgetCont = mysqli_fetch_assoc($getCont)) {
            switch (getLangArray($rowgetCont['ContactName'],1)) {
            case 'maploc':
                $maploc = explode(',', getLangArray($rowgetCont['ContactInfo']));
            break;
            default:
                ${getLangArray($rowgetCont['ContactName'], 1)} = getLangArray($rowgetCont['ContactInfo']);
            break;
            }
        }
    }
}

$sitecontent = sitecontentbyid(0, $conn, null, 1);
if (!empty($sitecontent)) {
    if (is_object($sitecontent)) {
        while ($rowsitecontent = mysqli_fetch_assoc($sitecontent)) {
            ${strtolower(str_replace(' ','',getLangArray($rowsitecontent['ContentSection'], 1)))}[] = $rowsitecontent;
        }
    }
}

?>