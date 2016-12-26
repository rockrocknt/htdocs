
<table cellpadding="0" cellspacing="0" width="100%" >
	<tr><td height="15"></td></tr>
	<tr>
		<td align="center" >

			<table  width="70%"  border="0" cellpadding="0" cellspacing="0">
			  	<form action="admin.php?do=profile&act=editsm" method="post"enctype="multipart/form-data" name="f1" >
				<tr>
					<td width="9">
						</td>
					<td height=22 class=top width=100% >
						<TABLE width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width="25%" height="20" ><strong>Profiles</strong></td>
							</tr>
						</table>			
					</td>
					<td width="10" align=right>
						</td>
				</tr>
				<tr>
					<td colspan="3" height="100"  valign="middle">
						<table class="table" width="98%" align="center" border="0" cellpadding="0" cellspacing="0">
							<TR>
							  <TD width=120><B>User name :</B> </TD>
							  <TD width="388"><font color="#3300FF" size="5">{$profile.username}      </TD>
							</TR>
							<TR>
							  <TD><b>Email : </b> </TD>
							  <TD><INPUT name=email id="email" value="{$profile.email}" size=50>
							  </TD>
							</TR>
						  
							<TR>
							  <TD><B>First name :</B> </TD>
							  <TD><INPUT name=firstname id="firstname" value="{$profile.firstname}" size="30" >
							  </TD>
							</TR>
							<TR>
							  <TD><B>Last name :</B> </TD>
							  <TD><INPUT name=lastname id="lastname" value="{$profile.lastname}" size="30" >
							  </TD>
							</TR>
							<TR>
							  <TD>&nbsp;</TD>
							  <TD>
							  <img name="img" src="./upload/store/{$profile.img}" width="100" height="100" >
							  <Br>
							  <input type="file" name="file" size="32">
								</TD>
							</TR>
						   
							<TR>
							  <TD><B>Sex :</B> </TD>
							  <TD>
							  <select name="sex" id="sex">
								{if $profile.sex==1} 
								
								<option value="1" selected >Male</option>
								{else}		
								<option value="1" >Male</option>
								{/if}
						
								{if $profile.sex==0} 
								<option value="0" selected >Female</option>
								{else}		
								<option value="0" >Female</option>
								{/if}
						
								</select>
							  </TD>
							</TR>
							<TR>
							  <TD><B>Address :</B> </TD>
							  <TD><INPUT name=address id="address" value="{$profile.address}" size=46 >
							  </TD>
							</TR>
						   
							<TR>
							  <TD><B> City:</B> </TD>
							  <TD><INPUT name=city id="city" value="{$profile.city}" >
							  </TD>
							</TR>
							<TR>
							  <TD><B> State:</B> </TD>
							  <TD><INPUT name=state id="state" value="{$profile.state}" maxLength=20></TD>
							</TR>
						   
							<TR>
							  <TD><B>Phone:</B> </TD>
							  <TD>          <INPUT name=phone id="phone" value="{$profile.phone}" maxLength=20>
							  </TD>
							</TR>
							<TR>
							  <TD><B>Fax:</B> </TD>
							  <TD>          <INPUT name=fax id="fax" value="{$profile.fax}" maxLength=20>
							  </TD>
							</TR>
							<TR>
							  <TD><B>Note :</B> </TD>
							  <TD><textarea name="note" cols="35" rows="5" id="note">{$profile.note}
									</textarea></td>
  </tr>
</table>
					</td>
				</tr>
				<tr>
					<td colspan="3" height="20">
						<TABLE width="100%">
							<tr>
								<td width="350"><a href="admin.php?do=profile&act=changepass">Change Password</a></td>
								<td align="center"><input type="image" name="profile" src="images/admin/submit.gif"></td>
							</tr>
						</table>
					</td>
				</tr>
				</form>
			</table>
</td>
  </tr>
</table>	

