<?php
$filename = TPL_DIR.'index.php';
/*
if (isset($_GET['master']))
{

    $filename_temp = TPL_DIR.$_GET['master'].".php";

    if(file_exists($filename_temp))
    {
        $filename = $filename_temp;
    }
}
*/

include($filename);
