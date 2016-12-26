<? global $product, $stips, $customfields, $tags; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<script type="text/javascript">
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
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
			if(xmlHttp.responseText != "0"){		
				//location.href = "admin.php?do=products&act=add&cid="+xmlHttp.responseText;
			}
			else{
				alert('Danh mục này không thuộc thể loại sản phẩm!');
			}
		}
	}

	function TreeFilterChanged2(value){
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
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged2;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged2(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			if(xmlHttp.responseText != "0"){
				$('#validate').submit();
			}
			else{
				alert('Danh mục này không thuộc thể loại sản phẩm!');
			}
		}
	}
	
	function alertWarning(){
		if(confirm("Các thông tin trong phần 'Nội dung SEO' sẽ bị trở về trạng thái ban đầu!"))
		{
			return CreateTitleSEO();
		}
	}
</script>

<form name="supplier" id="validate" class="form" action="admin.php?do=products&id=<?=$_GET['id']?>&act=edit_thuoctinhsm<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Chọn thuộc tính của sản phẩm "<span style="color: brown;"><?=$product['name_vn']?></span>"</h6>
		</div>
        <?php
        global $db,$productattList,$productattchildList, $productsearchkeyList;
        foreach ($productattList as $productatt)
        {
            if ($productatt['productatt_id']  != 6)
            {
            ?>
            <div class="formRow">
                <label style="color: brown;"><?=$productatt['productatt_name_vn']?></label>
                <div class="clear"></div>
            </div>
            <?php
            foreach ($productattchildList as $productattchild)
            {
                if ($productattchild['productatt_id'] == $productatt['productatt_id'] )
                {
            ?>
            <div class="formRow">
                <label><?=$productattchild['productattchild_name_vn']?>
                    <?php
                    if ($productattchild["productatt_id"] == 2)
                    {
                        ?>
                       <br/> <img src="<?=$productattchild["productattchild_img"]?>"/>
                    <?php
                    }
                    ?>
                </label>
                <div class="formRight">


                    <input type="checkbox" name="idatt[]" id="check2" value="<?=$productattchild['productattchild_id']?>"

                        <?php

                    foreach ($productsearchkeyList as $productsearchkey)
                    {
                        if ($productsearchkey['productattchild_id'] == $productattchild['productattchild_id'])
                        {
                            ?>
                           checked="checked
                            <?
                        }
                    }
                        ?>
                        />
                </div>
                <div class="clear"></div>
            </div>
        <?php
                } //  if ($productattchild['productatt_id'] ==$productatt['productatt_id'] )
            }
            }// if ($productatt['productatt_id']  != 6)
        }
        ?>



	</div>
	<div class="widget">

		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_articles" value="<?=$product['id']?>" />
            	<input type="submit" class="blueB"  value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>