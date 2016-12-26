<? 
	global $db, $comment, $products, $articles;
?>

<form name="supplier" id="frmEdit" class="form" action="admin.php?do=comments&act=viewsm<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Thông tin chi tiết bình luận</h6>
		</div>
		<div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
                <input type="text" name="name" class="tipS" disabled="disabled" value="<?=$comment['cmt_name'];?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" class="tipS" disabled="disabled" value="<?=$comment['cmt_email']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tin tức/Sản phẩm</label>
			<div class="formRight">
				<?
					$post = "";
                    if ($comment["cmt_do"] == "articles")
                        for ($j=0; $j<count($articles); $j++) {
                            if ($comment['cmt_post_id'] == $articles[$j]['id'])
                            {
                                $post = "Tin tức: ".$articles[$j]["name_vn"];
                            }
                        }
                ?>
				<?
                    if ($comment["cmt_do"] == "products")
                        for ($j=0; $j<count($products); $j++) {
                            if ($comment['cmt_post_id'] == $products[$j]['id'])
                            {
                                $post = "Sản phẩm: ".$products[$j]["name_vn"];
                            }
                        }
                ?>
                <input type="text" name="phone" class="tipS" disabled="disabled" value="<?=$post?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nội dung bình luận:</label>
			<div class="formRight">
				<textarea rows="20" cols="" class="tipS" name="short_vn" disabled="disabled"><?=$comment["cmt_content"]?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>