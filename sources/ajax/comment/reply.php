<?php 
	global $FullUrl, $lg;
    $cmt_pid= SafeFormValue('cmt_pid');
	$postid = SafeFormValue('post_id');
	$type =SafeFormValue('type');
?>
<div class="cmtBox">
    <h3 class="reply-title" style="margin-top:10px; padding-top:10px; border-top:1px solid #ccc;"><?=SITE_SEND_COMMENT?></h3>
    <form action="#" id="formRepComment" class="webForm" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label><?=LABEL_NAME?> <span class="required">*</span></label>
                    <input style="width:245px;" id="repcommentName" type="text" value="<?=isset($_SESSION['member_name'])?$_SESSION['member_name']:''?>" tabindex="1" class="validate[required]" />
                </td>
                <td style="padding-left:5px;">
                    <label><?=LABEL_EMAIL?> <span class="required">*</span></label>
                    <input style="width:245px;" id="repcommentEmail" type="text" value="<?=isset($_SESSION['member_email'])?$_SESSION['member_email']:''?>" tabindex="2" class="validate[required,custom[email]]" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label><?=LABEL_MESSAGE?> <span class="required">*</span></label>
                    <textarea tabindex="3" id="repcommentMessage" cols="5" rows="5" class="validate[required]" style="width:500px; height:100px; resize:vertical;"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label><?=LABEL_CAPTCHA?> <span class="required">*</span></label>
                    <input tabindex="4" type="text" id="repcommentCaptcha" class="validate[required]" style="width:150px;" />
                    <img alt="Captcha" id="captchaImgReply" src="<?=$FullUrl?>/CaptchaSecurityImages.php?width=100&height=28&characters=6" />
                    <a href="#" id="reloadReply" onclick="return reloadReplyCaptcha();" title="Reload"><img alt="reload" src="<?=$FullUrl?>/images/site/reload.png" /></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" id="pid" value="<?=$cmt_pid?>">
                    <input type="submit" value="<?=LABEL_SEND?>" onclick="return ReplyComment()" />
                </td>
            </tr>
        </table>
    </form>
</div>