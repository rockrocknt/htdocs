<? global $optIn_title, $optInIsActive; ?>

<? if($optInIsActive==1){ ?>
<form method="post" id="optin">
<div id="optin">
  <table>
    <tr>
     
      <td class="textBox"><input id="name" name="fields_fname" value="Tên của bạn..." onfocus="if (this.value == 'Tên của bạn...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Tên của bạn...';}" type="text" />
      </td>
       <td class="textBox"><input id="mail" name="fields_email" value="Email của bạn..." onfocus="if (this.value == 'Email của bạn...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email của bạn...';}" type="text" />
      </td>
    </tr>
 
  </table>
  <p class="stt_optin"><?=$optIn_title?$optIn_title:"Hãy để lại email của bạn để nhận bản tin của chúng tôi"?></p>
  <input type="button" value="" name="Submit" id="bton" onclick="CheckOptIn()" />
</div>
</form>
<? } ?>