<?php
	global $FullUrl, $prefix_url, $lg, $do, $article, $product;

	if ($do == "articles")
		$post = $article;
	else
		$post = $product;

	$cmtList = $post->getComments();
?>
<div class="container-sub-div">
    <h3 class="title-h3"><?=SITE_COMMENT?> (<?=$post->getNumComment()?>)</h3>
    <div class="ct-div-sub">
        <div class="comment-wrapper">
            <div class="cmtBox">
                <h3 class="reply-title"><?=SITE_SEND_COMMENT?></h3>
                <form action="#" id="formComment" class="webForm" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <label><?=LABEL_NAME?> <span class="required">*</span></label>
                                <input style="width:255px;" id="commentName" type="text" value="<?=isset($_SESSION['member_name'])?$_SESSION['member_name']:''?>" tabindex="1" class="validate[required]" />
                            </td>
                            <td style="padding-left:5px;">
                                <label><?=LABEL_EMAIL?> <span class="required">*</span></label>
                                <input style="width:255px;" id="commentEmail" type="text" value="<?=isset($_SESSION['member_email'])?$_SESSION['member_email']:''?>" tabindex="2" class="validate[required,custom[email]]" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label><?=SITE_SEND_COMMENT?> <span class="required">*</span></label>
                                <textarea tabindex="3" id="commentMessage" cols="5" rows="5" class="validate[required]" style="width:520px; height:100px; resize:vertical;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label><?=LABEL_CAPTCHA?> <span class="required">*</span></label>
                                <input tabindex="4" type="text" id="commentCaptcha" class="validate[required]" style="width:150px;" />
                                <img alt="Captcha" id="captchaImg" src="<?=$FullUrl?>/CaptchaSecurityImages.php?width=100&amp;height=28&amp;characters=6" />
                                <a id="reload" href="#" title="Reload"><img alt="reload" src="<?=$FullUrl?>/images/site/reload.png" /></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" id="type" value="<?=$do?>" />
                                <input type="hidden" id="post_id" value="<?=$post->getID()?>">
                                <input type="hidden" id="lgComment" value="<?=$lg?>" />
                                <input type="submit" value="<?=LABEL_SEND?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="ajax-result"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="load-comments">
                <?php if ($cmtList) { ?>
                <ul class="comment-list" id="appendcmt">
                    <?php 
                    $num = Info::getInfoField("paging_comment");
                    foreach($cmtList as $i=>$comment) {
                        $comment = new comments($comment);
                        $id = $comment->getID();
                        if ($i == $num)
                            break;
                    ?>
                    <li>
                        <div class="cmt-info">
                            <span class="cmt-author"><?=$comment->getAuthor()?></span>
                            <span class="cmt-date">(<?=FormatDate($comment->getDate())?>)</span>
                            <span class="cmt-reply">
                                <a id="active-rep-<?=$id?>" href='#' onclick="return ReplyCmt(<?=$id?>, <?=$post->getID()?>, '<?=$do?>', '<?=$lg?>')"><?=SITE_REPLY?></a>
                            </span>
                             <span class="cmt-reply">
                                <a href='#' id="cancel-rep-<?=$id?>" style="display:none" onclick="return CancelRep(<?=$id?>)"><?=SITE_CANCEL?></a>
                            </span>
                        </div>
                        <div><?=$comment->getContent()?></div>
                        <div id="replay-on-<?=$id?>"></div>
                        <?php if($comment->getHasChild() == 1) {
                                $commentchild = $comment->getChilds();				
                                if($commentchild) {
                            ?>
                            <ul class='cmt-childrens'>
                                <?php foreach($commentchild as $cmtchild) {
                                        $cmtchild = new comments($cmtchild);
                                    ?>
                                <li>
                                    <div>
                                        <span class="cmt-author"><?=$cmtchild->getAuthor()?></span>
                                        <span class="cmt-date">(<?=FormatDate($cmtchild->getDate())?>)</span>
                                    </div>
                                    <div><?=$cmtchild->getContent()?></div>
                                </li>
                                <?php } ?>
                            </ul>
                        <?php }} ?>
                    </li>
                    <?php } ?>
                    <?php if (count($post->getComments()) > $num) { ?>
                    <li class="viewmorecmt" style="text-align:center;"><a href="#" onclick="return viewMoreComment('<?=$post->getID()?>', '<?=$do?>', '<?=$num?>', '<?=$lg?>')"><?=VIEW_ORTHER_COMMENT?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>