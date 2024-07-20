<?php

$dir = 'files';
$scanFiles = array_diff(scandir($dir,SCANDIR_SORT_DESCENDING),['.','..']);

$dirTxt = 'result';
$createText = 'Result_'.date('d_F_Y') . '.txt';
$contentText = '';
$scanText = array_diff(scandir($dirTxt,SCANDIR_SORT_DESCENDING),['.','..']);


foreach ($scanText as $key => $txtFile) {
    if ($txtFile == $createText) {
        if (unlink($dirTxt . '/' .$key.'_'. $createText)) {
            echo 'Success Deleted!';
        } else {
            die('Error Deleted File!, program has been stopped!');
        }
    }
}


foreach ($scanFiles as $key => $file) {
    $pathDetail = $dir.'/'.$file;
    $type = pathinfo($pathDetail, PATHINFO_EXTENSION);
    $data = file_get_contents($pathDetail);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    if (file_put_contents($dirTxt.'/'.$key.'_'.$createText, $base64)) {
        echo "Convert Img To Text Success!";    
    }else {
        die('Error Convert Img To Text , program has been stopped!');
    }
}
