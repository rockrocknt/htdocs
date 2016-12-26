<?php
session_start();
include('../language/'.$_SESSION['lg'].'.php');
?>
	function CheckOptIn()
	{
		if(IsEmpty('name'))	
		{
			alert('Xin vui lòng điền tên');
			document.getElementById('name').focus();
			return false;
		}
		else if(IsEmpty('mail'))	
		{
			alert('Xin vui lòng điền Email');
			document.getElementById('email').focus();
			return false;
		}
        else if(!IsEmail('mail'))
		{
			alert('Email không hợp lệ');
			document.getElementById('email').focus();
			return false;
		} 
		else{
            document.getElementById('optin').submit();
        }
	}
    
    
	function CheckAllOptIn()
	{
    	//alert('test');
		/*if(IsEmpty('name'))	
		{
			alert('Xin vui lòng điền tên');
			document.getElementById('name').focus();
			return false;
		}
		else if(IsEmpty('email'))	
		{
			alert('Xin vui lòng điền email');
			document.getElementById('email').focus();
			return false;
		}
		else if(!IsEmail('email'))
		{
			alert('Email không hợp lệ');
			document.getElementById('email').focus();
			return false;
		}
        else if(!MatchValue('email', 'email2'))	
		{
			alert('Email không khớp');
			document.getElementById('email').focus();
			return false;
		}
		else{
			OptInSubmitAction();
            return true;
           }*/
	}
    function CheckAllForgotPassword()
    {
    	if(IsEmpty('email_forgot'))	
		{
			alert('Xin vui lòng điền email');
			document.getElementById('email_forgot').focus();
			return false;
		}
		else if(!IsEmail('email_forgot'))
		{
			alert('Email không hợp lệ');
			document.getElementById('email_forgot').focus();
			return false;
		} 
		else{
            return true;
           }
    }
    function CheckAllMemberChange()
	{    	
    	if(IsEmpty('password_old'))	
		{
			alert('Xin vui lòng điền mật khẩu');
			document.getElementById('password_old').focus();
			return false;
		} 
    	else if(IsEmpty('password_new'))	
		{
			alert('Xin vui lòng điền mật khẩu');
			document.getElementById('password_new').focus();
			return false;
		} 
        else if(!MatchValue('password_new', 'password2_new'))
        {
        	alert('<?=MATCH_PASSWORD_VALIDATTION?>');
			document.getElementById('password2_new').focus();
			return false;
        }  
		else{
            return true;
           }
	}
    function CheckAllMemberReg()
	{    	
    	if(IsEmpty('name_reg'))	
		{
			alert('Xin vui lòng điền tên');
			document.getElementById('name_reg').focus();
			return false;
		}
        else if(IsEmpty('email_reg'))	
		{
			alert('Xin vui lòng điền email');
			document.getElementById('email_reg').focus();
			return false;
		}
		else if(!IsEmail('email_reg'))
		{
			alert('Email không hợp lệ');
			document.getElementById('email_reg').focus();
			return false;
		}
        <?php /*?>else if(!MatchValue('email_reg', 'email2_reg'))	
		{
			alert('Email không khớp');
			document.getElementById('email2_reg').focus();
			return false;
		}<?php */?>
        else if(IsEmpty('password_reg') && IsChecked('is_register'))	
		{
			alert('Xin vui lòng điền mật khẩu');
			document.getElementById('password_reg').focus();
			return false;
		} 
        else if(!MatchValue('password_reg', 'password2_reg') && IsChecked('is_register'))
        {
        	alert('Mật khẩu không khớp');
			document.getElementById('password2_reg').focus();
			return false;
        }  
		else{
            return true;
           }
	}
    function CheckAllEmailPassword()
	{    	
    	if(IsEmpty('email'))	
		{
			alert('Xin vui lòng điền email');
			document.getElementById('email').focus();
			return false;
		}
		else if(!IsEmail('email'))
		{
			alert('Email không hợp lệ');
			document.getElementById('email').focus();
			return false;
		}
        else if(IsEmpty('password'))	
		{
			alert('Xin vui lòng điền mật khẩu');
			document.getElementById('password').focus();
			return false;
		}        
		else{
            return true;
           }
	}
    
    function OptInSubmitAction()
    {
      document.frmOptin.email.value = document.getElementById('email').value;
      document.frmOptin.name.value = document.getElementById('name').value;
      document.frmOptin.submit() ;
    }