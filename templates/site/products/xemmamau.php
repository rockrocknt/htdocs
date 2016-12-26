<?php
global $do,$cat,$FullUrl,$lg, $FullUrl,$catphukien;

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>DANH SÁCH MÃ MÀU</title>
</head>
<body>
<table border="1" width="50%">
    <tr><td>ID</td>
        <td>HINH MÃ MÀU</td></tr>
    <?php
    $list = products::getallcolorcode();
    for($i=0;$i<count($list);$i++){
        $item = $list[$i];
        ?>
        <tr>
            <td><?=$item['colorcode_id']?></td>
            <td><img src="/image_site/color/<?=$item['colorcode_img_on']?>"</td>
        </tr>
    <?
    }//for($i=0;$i<count($list);$i++){
    ?>

</table>
</body>
</html>