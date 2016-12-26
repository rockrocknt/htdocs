	<td valign="top" width="100%" >
	<table width="100%" cellpadding="0" cellspacing="0" class="menuadmin">
		<? include("./includes/ngay.php")?>
		<tr>
			<td height="360" valign="top">
				<table border="0" width="98%" align="center" cellpadding="0" cellspacing="0">
					
					<tr>
						<td>&nbsp;</td>
					</tr>
					
						<tr>
						  <td align="center">


<center>
<table cellpadding="0" cellspacing="0" height="300" width="100%">
	<tr><td height="15"></td></tr>
	<tr>
		<td align="center" valign="top">
		
			<table  width="50%"  border="0" cellpadding="6" cellspacing="0" class="border1" style="border-bottom-width:1px; font-family:tahoma; font-size:12px; font-weight:bold">
			<form name="form1" method="post" action="admin.php?do=profile&act=changepasssm" onSubmit=" return isNotEmpty(this.oldpass) && isNotEmpty(this.newpass) && isNotEmpty(this.confirmpass)">
				<? if($_GET['error']) {?>
				<tr>
				  <td height="20" colspan="2" ><span><? if ($_GET['error']=='1') echo 'Wrong old password!'; elseif ($_GET['error']=='2') echo 'Confirm password not match'; elseif ($_GET['error']=='3') echo 'Sorry your account not actived, Please check your email to complete registration'; ?></span></td>
			  </tr>
			  <? }?>
				<tr bgcolor="#FF0000">
					<td width="500" height="26" align="center" style="color:#FFFFFF"><strong>Change Password:</strong>
					
						<strong><?=$_SESSION[admin_username]?>&nbsp;</strong>						
					</tr>
				<tr>
					<td height="146" colspan="2"  valign="middle">
						<table class="table" style="font-size:12px; color:#0066FF;" height="100" width="89%" align="center" border="0" cellpadding="3" cellspacing="0">
						<tr>
							<td width="43%" height="20">Old password</td>
							<td width="57%">
						  		<input name="oldpass" type="password" id="oldpass">
						  </td>
						</tr>
						<tr>
							<td height="20" >New password</td>
							<td><input name="newpass" type="password" id="newpass"></td>
						</tr>
						<tr>
							<td height="28">Confirm password</td>
							<td><input name="confirmpass" type="password" id="confirmpass"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Change"></td>
						</tr>
						<tR><td colspan="2">&nbsp;</td></tR>
					  </table>
					</td>
				</tr>
				
			  </form>
		  </table>
		</td>
  </tr>
</table>
</center>
						  </td>
						</tr>
						
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>