<? global $FullUrl, $prefix_url, $lg; ?>
<div class="ct-div-sub">
    <form action="#" id="formForgotPass" class="webForm" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label><?=LABEL_EMAIL?> <span class="required">*</span></label>
                    <input type="text" id="forgotEmail" />
                </td>
            </tr>
            <tr>
                <td>
                    <label><?=LABEL_CAPTCHA?> <span class="required">*</span></label>
                    <input type="text" id="forgotCaptcha" style="width:150px;" />
                    <img alt="Captcha" id="captchaImg" src="<?=$FullUrl?>/CaptchaSecurityImages.php?width=100&height=28&characters=6" />
                    <a id="reload" href="#" title="Reload"><img alt="reload" src="<?=$FullUrl?>/images/site/reload.png" /></a>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="lg" value="<?=$lg?>" />
                    <input type="submit" id="forgotSumbit" value="<?=LABEL_SEND?>" />
                    <img src="<?=$FullUrl?>/images/site/loader.gif" class="ajax-loader" alt="loader" />
                </td>
            </tr>
            <tr>
                <td class="ajax-result"></td>
            </tr>
        </table>
    </form>
</div>
<div class="bt-spam-ct"></div>
<script type="text/javascript">
	$(document).ready(function(e) {
        $("#dialogReset").dialog("open");
    });
</script>