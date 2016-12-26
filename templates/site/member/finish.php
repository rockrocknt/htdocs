<ul>
	<li>
		<h4><?php //echo REGISTER; ?></h4>
        <div class="SubBox07" style="margin-top:10px;">
            <div class="SendInfo" style="display:block; text-align:center;">
                <br /><br />
				<?php if($msg==1){	?>
				<strong><?= REGISTER_SUCCESSFUL; ?></strong><br /><br />
				<?= LOGIN_USE_WEBSITE_NOW; ?><br /><br />
				<input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==2){	?>
				 <strong><?= EMAIL_EXIST_MESS; ?></strong><br /><br />
				<input type="button" value="<?=BACK?>" onclick="history.go(-1);" />
				<?php	}else if($msg==3){	?>
				  <strong><?= SUCCESSFULL_LOGIN; ?></strong><br /><br />
				 <?= USE_WEBSITE_NOW; ?><br /><br />
				<input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==4){	?>
				 <strong><?= LOGIN_FAIL; ?></strong><br /><br />
				 <?= CHECK_USERNAME_PASS; ?><br /><br />
				<?php	}else if($msg==5){	?>
				 <strong><?=DANG_XUAT_THANH_CONG?></strong><br /><br />
				 <input type="button" value="<?=VE_TRANG_CHU?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==6){	?>
				 <strong><?= WRONG_PASSWORD; ?></strong><br /><br />
				 <input type="button" value="<?= BTN_REGISTER_RETRY; ?>" onclick="history.go(-1);" />
				<?php	}else if($msg==7){	?>
				 <strong><?= CHANGE_PASSWORD_SUCCESSFULL; ?></strong><br /><br />
				 <input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==8){	?>
				 <strong><?= INVALID_EMAIL; ?></strong><br /><br />
				 <input type="button" value="<?= BTN_REGISTER_RETRY; ?>" onclick="history.go(-1)" />
				<?php	}else if($msg==9){	?>
				 <strong><?= CHECK_EMAIL_CONFIRM_INFO; ?></strong><br /><br />
				 <input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==10){	?>
				 <strong><?= INVALID_LINK; ?></strong><br /><br />
				 <input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==11){	?>
				 <strong><?= LABEL_PASSWORD_NEW; ?><?php echo $new_pass; ?></strong><br /><br />
				 <input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}else if($msg==12){	?>
				 <?=NEED_LOGON?>
				 <input type="button" value="<?=BACK?>" onclick="window.location.href='index.php';" />
				<?php	}	?>
        </div>  
	</li>
</ul>
