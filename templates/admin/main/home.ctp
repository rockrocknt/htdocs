<? global $homeArticles, $homeComments, $homeOrders, $homeProducts; ?>

<div class="widget">
    <div class="title"><h6>Chào mừng bạn đến với CMS - HỆ THỐNG QUẢN TRỊ NỘI DUNG WEBSITE - Powered by <a href="http://www.imgroup.vn" title="IM Group" target="_blank"><strong>IM Group</strong></a></h6><div class="clear"></div></div>
    <p>Nếu bạn có thắc mắc trong quá trình sử dụng CMS, xin vui lòng xem hướng dẫn tại <strong><a href="http://support.imgroup.vn/su-dung-cms/cms-v5-0/" target="_blank">http://support.imgroup.vn/su-dung-cms/cms-v5-0/</a></strong></p>
</div>

<div class="widgets">
	<?php if (cmsFunction::isShowGroupMenu(5)) { ?>
    <div class="oneTwo">            
        <div class="widget">
            <div class="title"><img src="./images/admin/article-icon.png" alt="" class="titleIcon" /><h6>Đơn hàng mới</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                <thead>
                    <tr>
                    	<td>Thông tin người mua</td>
                        <td width="150">Ngày đặt hàng</td>
                        <td width="60">Xem chi tiết</td>
                    </tr>
                </thead>
                <tbody>
                <? if ($homeOrders) {
					foreach ($homeOrders as $order){ ?>
                    <tr>
                        <td style="text-align:left;">
                            <div class="order-infos">
                                <p><span class="order-info-title">Tên:</span><span><?=$order['orderName']?></span></p>
                                <p><span class="order-info-title">Email:</span><span><?=$order['orderEmail']?></span></p>
                                <p><span class="order-info-title">Phone:</span><span><?=$order['orderPhone']?></span></p>
                            </div>
                        </td>
                        <td><span class="green f11"><?=formatDateTime($order['odr_insert_date'])?></span></td>
                        <td class="actBtns">
                            <a href="admin.php?do=orders&act=detail&id=<?=$order["odr_id"]?>" target="_blank" title="" class="smallButton tipS" original-title="Xem đơn hàng"><img src="./images/admin/eye_inv.png" alt=""></a>
                        </td>
                    </tr>
                   <? } ?>
                   <? } else { ?>
                   <tr>
                   		<td colspan="4">Không có đơn hàng nào</td>
                   </tr>
                   <? } ?>
                </tbody>
            </table> 
        </div>
        <div class="clear"></div>
    </div>
	<?php } ?>
    <!-- 2 columns widgets -->
    <?php if (cmsFunction::isShowGroupMenu(4)) { ?>
    <div class="oneTwo">            
        <div class="widget">
            <div class="title"><img src="./images/admin/product-icon.png" alt="" class="titleIcon" /><h6>Sản phẩm mới</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                <thead>
                    <tr>
                    	<td>Ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Ngày đăng</td>
                        <td width="60">Thao tác</td>
                    </tr>
                </thead>
                <tbody>
                <? if ($homeProducts) {
					foreach ($homeProducts as $product){ ?>
                    <tr>
                    	<td><img src="/<?php echo $product["img"]; ?>" width=60 alt="<?php echo $product["img"]; ?>" /></td>
                        <td style="text-align:left;"><a href="admin.php?do=products&act=edit&id=<?=$product["id"]?>&cid=<?=$product['cid']?>" title=""><?=$product["name_vn"]?></a></td>
                        <td><span class="green f11"><?=formatDateTime($product['dated'])?></span></td>
                        <td class="actBtns">
                            <a href="admin.php?do=products&act=edit&id=<?=$product["id"]?>&cid=<?=$product['cid']?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/admin/icons/dark/pencil.png" width="14" alt=""></a>
            				<? $product = new products($product); ?>
            				<a href="<?=$product->getLink()?>" target="_blank" title="" class="smallButton tipS" original-title="Xem sản phẩm"><img src="./images/admin/eye_inv.png" alt=""></a>
                        </td>
                    </tr>
                   <? } ?>
                   <? } else { ?>
                   <tr>
                   		<td colspan="4">Không có sản phẩm nào</td>
                   </tr>
                   <? } ?>
                </tbody>
            </table> 
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php } ?>
</div>

<div class="widgets">
	<?php if (cmsFunction::isNewsManager()) { ?>
    <div class="oneTwo">            
        <div class="widget">
            <div class="title"><img src="./images/admin/article-icon.png" alt="" class="titleIcon" /><h6>Tin tức mới</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                <thead>
                    <tr>
                    	<td>Ảnh</td>
                        <td>Tiêu đề</td>
                        <td width="150">Ngày đăng</td>
                        <td width="60">Thao tác</td>
                    </tr>
                </thead>
                <tbody>
                <? if ($homeArticles) {
					foreach ($homeArticles as $article){ ?>
                    <tr>
                    	<td><img src="<?=getTimThumb($article["img"], 50)?>" alt="" /></td>
                        <td style="text-align:left;"><a href="admin.php?do=articles&act=edit&id=<?=$article["id"]?>&cid=<?=$article['cid']?>" title=""><?=$article["name_vn"]?></a></td>
                        <td><span class="green f11"><?=formatDateTime($article['dated'])?></span></td>
                        <td class="actBtns">
                            <a href="admin.php?do=articles&act=edit&id=<?=$article["id"]?>&cid=<?=$article['cid']?>" title="" class="smallButton tipS" original-title="Sửa tin tức"><img src="./images/admin/icons/dark/pencil.png" width="14" alt=""></a>
            				<? $article = new articles($article); ?>
            				<a href="<?=$article->getLink()?>" target="_blank" title="" class="smallButton tipS" original-title="Xem tin tức"><img src="./images/admin/eye_inv.png" alt=""></a>
                        </td>
                    </tr>
                   <? } ?>
                   <? } else { ?>
                   <tr>
                   		<td colspan="4">Không có tin tức nào</td>
                   </tr>
                   <? } ?>
                </tbody>
            </table> 
        </div>
        <div class="clear"></div>
    </div>
	<?php } ?>
    <!-- 2 columns widgets -->
    <?php if (cmsFunction::isShowGroupMenu(7)) { ?>
    <div class="oneTwo">            
        <div class="widget none">
            <div class="title"><img src="./images/admin/comment-icon.png" alt="" class="titleIcon" /><h6>Bình luận mới</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                <thead>
                    <tr>
                        <td>Thông tin</td>
                        <td>Nội dung bình luận</td>
                        <td width="60">Xem chi tiết</td>
                    </tr>
                </thead>
                <tbody>
                <? if ($homeComments) {
					foreach ($homeComments as $comment) { ?>
                    <tr>
                        <td style="text-align:left;">
                            <div class="order-infos">
                                <p><span class="order-info-title">Tên:</span><span><?=$comment['cmt_name']?></span></p>
                                <p><span class="order-info-title">Email:</span><span><?=$comment['cmt_email']?></span></p>
                            </div>
                        </td>
                        <td><?=SubStrEx(strip_tags($comment['cmt_content']), 25)?></td>
                        <td class="actBtns">
            				<a href="admin.php?do=comments&act=detail&id=<?=$comment["cmt_id"]?>" target="_blank" title="" class="smallButton tipS" original-title="Xem bình luận"><img src="./images/admin/eye_inv.png" alt=""></a>
                        </td>
                    </tr>
                   <? } ?>
                   <? } else { ?>
                    <tr>
                        <td colspan="4">Không có bình luận nào</td>
                    </tr>
                   <? } ?>
                </tbody>
            </table> 
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php } ?>
</div>