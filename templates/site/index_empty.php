<?php global $do, $act, $tpl, $title_bar;

?>


        <?php $filename = TPL_DIR.$do.'/'.$tpl.'.php';

        if(file_exists($filename))
            include($filename);
        else
            print('This page is not available'.$filename);
        ?>

