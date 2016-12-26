<? global $stips, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá sản phẩm này?'))
		{
			location.href = l;	
		}
	}
	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}
	
	function TreeFilterChanged(value){
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request");
		  return;
		  } 
		var url="ajax/checkComp.php";
		url=url+"?id="+value;
		url=url+"&sid="+Math.random();
		url=url+"&comp=2";
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		
	}
	
	function ReadyTreeFilterChanged(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
			if(xmlHttp.responseText != "0")
				location.href = "admin.php?do=products&act=list&productatt_id="+xmlHttp.responseText;
			else{
				alert('Danh mục này không thuộc thể loại sản phẩm!');
			}
		}
	}	
</script>



<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=productattchild&act=add<?=isset($_GET['productatt_id'])?('&productatt_id='.$_GET['productatt_id']):''?>'" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=productattchild&act=dellist<?=isset($_GET['productatt_id'])?('&productatt_id='.$_GET['productatt_id']):''?>');return false;" />
    </div>
    <div style="float:right;">
        <div class="selector">
            <script type="text/javascript">
                function rediret()
                {
                    location.href='admin.php?do=productattchild&productatt_id=' + jQuery('#productatt_id').val();
                }
            </script>
            <select name="productatt_id" id="productatt_id" onchange= "rediret()">
                <?php
                global $productattList;
                $parent = isset($_GET['productatt_id'])?(''.$_GET['productatt_id']):'';
                for($i = 0; $i < count($productattList); $i++)
                {
                    $productatt = $productattList[$i];
                    ?>
                    <option value="<?=$productatt['productatt_id']?>"
                        <?php
                        if ($parent == $productatt['productatt_id'])
                            echo "selected";
                        ?>
                        ><?=$productatt['productatt_name_vn']?></option>

                <?php
                }
                ?>

            </select>
        </div>  
    </div>
    <?php
    /*
     *<img  src="./images/admin/question-button2.png" alt="Tooltip" class="icon_que tipS dnone" style="float:right; margin:5px 5px 0 0;" original-title="Dùng để di chuyển đến các danh mục thuộc thể loại sản phẩm (có màu xanh)">
     */
    ?>

</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<? if(isset($_SESSION['error'])){ ?>
<div class="nNote nFailure hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['error']?></strong></p>
</div>
<? }; unset($_SESSION['error']); ?>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách các thuộc tính sản phẩm</h6>
      <?php // var_dump($stips); ?>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td class="sortCol"><div>Tên thuộc tính<span></span></div></td>
        <td width="100">Thuộc tính cha</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10"><?=$plpage?></td>
      </tr>
    </tfoot>
    <tbody>
    <? 
		if ($stips) {
		for ($i=0; $i<count($stips); $i++) { ?>
      <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["productattchild_id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center">
            <input type="text" value="<?=$stips[$i]["productattchild_num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Số thứ tự thuộc sản phẩm, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]["productattchild_id"]?>" onchange="return updateNumber_productatt('productattchild', '<?=$stips[$i]["productattchild_id"]?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]["productattchild_id"]?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
          <td class="title_name_data">

              <?php
              if ($_GET['productatt_id'] == 2)
              {
              ?>
              <div style=" display: block;
    height: 18px;
    width: 38px;background:<?php echo  $stips[$i]["productattchild_colorcode"];?>;">&nbsp;</div>
                  <?php
              }
                  ?>
              <a href="admin.php?do=productattchild&act=edit&id=<?=$stips[$i]["productattchild_id"]?><?=isset($_GET["productatt_id"])?'&productatt_id='.$_GET["productatt_id"]:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold">
                  <?=$stips[$i]["productattchild_name_vn"]?>
                  <br/>
                  <?php
                  if ($stips[$i]["productatt_id"] == 2)
                  {
                      ?>
                      <img src="<?=$stips[$i]["productattchild_img"]?>"/>
                  <?php
                  }
                  ?>
              </a>
          </td>
          <td align="center">
              <?php
              for($ii = 0; $ii < count($productattList); $ii++)
              {
                  $productatt = $productattList[$ii];
                  if ($productatt['productatt_id'] == $stips[$i]["productatt_id"]) echo $productatt['productatt_name_vn'];
              }
              ?>
          </td>

          <td class="actBtns">
            <a href="admin.php?do=productattchild&act=edit&id=<?=$stips[$i]["productattchild_id"]?><?=isset($_GET["productatt_id"])?'&productatt_id='.$_GET["productatt_id"]:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>

            <a href="" onclick="CheckDelete('admin.php?do=productattchild&act=del&id=<?=$stips[$i]["productattchild_id"]?><?=isset($_GET["productatt_id"])?'&productatt_id='.$_GET["productatt_id"]:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/admin/icons/dark/close.png" alt=""></a>

            <? $product = new products($stips[$i]); ?>



        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="10" align="center">Không có thuộc tính con</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>