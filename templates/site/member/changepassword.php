<? global $FullUrl, $prefix_url, $lg; ?>
<div class="ct-div-sub">
<? if (isset($_SESSION["member_login"])) { ?>
    <form action="#" id="formChangePass" class="webForm" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label><?=LABEL_OLD_PASSWORD?> <span class="required">*</span></label>
                    <input type="password" id="oldPassword"  />
                </td>
            </tr>
            <tr>
                <td>
                    <label><?=LABEL_NEW_PASSWORD?> <span class="required">*</span></label>
            		<input type="password" id="newPassword"  />
                </td>
            </tr>
            <tr>
                <td>
                    <label><?=LABEL_NEW_PASSWORD_RETYPE?> <span class="required">*</span></label>
                    <input type="password" id="newPassRetype"  />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="lgchange" value="<?=$lg?>" />
                    <input type="submit" id="changePassSubmit" value="<?=LABEL_SEND?>" />
                    <img src="<?=$FullUrl?>/images/site/loader.gif" class="ajax-loader" alt="loader" />
                </td>
            </tr>
            <tr>
                <td class="ajax-result"></td>
            </tr>
        </table>
    </form>
<? } ?>
</div>
<div class="bt-spam-ct"></div>