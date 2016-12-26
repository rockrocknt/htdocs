<?php

class EVM_Mailer {

	var $subject = "";
	var $Sendername = "";
	var $Senderaddy = "";
	var $message = "";
	var $Recipients = "";
	var $CC_list = "";
	var $BCC_list = "";
	var $attachments = array(); // filename(as attachment name),location(path+filename of attachment),mime-type
	var $ishtml = 0; // 0=text, 1=html

	var $warnings = array();
	var $action_msgs = array();
	var $error_msgs = array();

	function get_file($filename){ 
		if ($fp = fopen($filename, 'rb')) { 
			$return = fread($fp, filesize($filename)); 
			fclose($fp); 
			return $return; 
		} else {
			return FALSE;
		}
	}

	function set_subject($msg) {

		if (strlen($msg) > 255) { // Limit subject line to 255 characters
			$msg = substr($msg,0,255);
			array_push($this->warnings,"Subject line was truncated to 255 characters.");
		}

		$this->subject = $msg;
		array_push($this->action_msgs,"Subject line set to: " . $msg);

	}

	function set_sender($name,$addy) {

		if (strlen($addy) > 255) { // Limit sender address to 255 characters
			$array_push($this->error_msgs,"Sender email address too long. (255 char max)");
		} else {
			if (strlen($name) != 0) {
				$this->Sendername = $name;
				array_push($this->action_msgs,"Sender name set to: " . $name);
			} else {
				array_push($this->action_msgs,"Sender name not set (empty field)");
			}
			if (strlen($addy) == 0) {
				array_push($this->error_msgs,"Sender email address too short or invalid");
			} else { // validate email address here
				if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $addy)) {
					array_push($this->error_msgs,"Email address not correctly formatted");
				} else {
					array_push($this->action_msgs,"Email address format has been validated");
					$this->Senderaddy = $addy;
				}
			}
		}
	}

	function set_message($msg) {

		$this->message = $msg;
		array_push($this->action_msgs,"Email message set");

	}

	function add_recipient($name,$addy) {

		if (strlen($addy) > 255) { // Limit sender address to 255 characters
			$array_push($this->error_msgs,"Recipient email address too long. (255 char max) " . $addy);
		} else {
			if (strlen($name) == 0) {
				array_push($this->warnings,"No recipient name for " . $addy);
			} else {
				$build_address = (strlen($name) == 0) ? $name . " " : "";
				$build_address .= "<";
				$build_address .= $addy;
				$build_address .= ">";

				if (count($this->Recipients) > 1) {
					$this->Recipients .= ", " . $build_address;
					array_push($this->action_msgs,"Recipient added: " . $addy);
				} else {
					$this->Recipients .= $build_address;
					array_push($this->action_msgs,"Recipient added: " . $addy);
				}
			}
		}
	}

	function add_CC($name,$addy) {

		if (strlen($addy) > 255) { // Limit sender address to 255 characters
			$array_push($this->error_msgs,"CC email address too long. (255 char max) " . $addy);
		} else {
			if (strlen($name) == 0) {
				array_push($this->warnings,"No CC name for " . $addy);
			} else {
				$build_address = (strlen($name) == 0) ? $name . " " : "";
				$build_address .= "<";
				$build_address .= $addy;
				$build_address .= ">";

				if (count($this->CC_list) > 1) {
					$this->CC_list .= ", " . $build_address;
					array_push($this->action_msgs,"CC added: " . $addy);
				} else {
					$this->CC_list .= $build_address;
					array_push($this->action_msgs,"CC added: " . $addy);
				}
			}
		}
	}

	function add_BCC($name,$addy) {

		if (strlen($addy) > 255) { // Limit sender address to 255 characters
			$array_push($this->error_msgs,"BCC email address too long. (255 char max) " . $addy);
		} else {
			if (strlen($name) == 0) {
				array_push($this->warnings,"No BCC name for " . $addy);
			} else {
				$build_address = (strlen($name) == 0) ? $name . " " : "";
				$build_address .= "<";
				$build_address .= $addy;
				$build_address .= ">";

				if (count($this->BCC_list) > 1) {
					$this->BCC_list .= ", " . $build_address;
					array_push($this->action_msgs,"CC added: " . $addy);
				} else {
					$this->BCC_list .= $build_address;
					array_push($this->action_msgs,"CC added: " . $addy);
				}
			}
		}
	}

	function add_attachment($aname,$location,$mimetype) {

// -----------------------------------------------------------------
// The following code checks the mime-type passed to the object vs.
// mime-types available to PHP on the server.  If you want to ensure
// that all mime-types are accepted, comment out this code.

		if (function_exists('mime_content_type')) {
			$vmime = mime_content_type($location);
			if ($vmime == $mimetype) {
				array_push($action_msgs,"mime type validated");
			}
		}


// -----------------------------------------------------------------


		if ($mimetype == "") {
			array_push($this->error_msgs,"No mime type for attachment: " . $location);
		}
		if ($aname == "") {
			array_push($this->error_msgs,"No attachment name specified for attachment: " . $location);
		}
		if ($location == "") {
			array_push($this->error_msgs,"No file name specified for attachment");
		} else {
			if (!file_exists($location)) {
				array_push($this->error_msgs,"attachment: " . $location . " does not exist");
			} else {
				if (!is_readable($location)) {
					array_push($this->error_msgs,"attachment: " . $location . " could not be read");
				} else {
					$toarray = $aname;
					$toarray .= ",";
					$toarray .= $location;
					$toarray .= ",";
					$toarray .= $mimetype;
					array_push($this->attachments,$toarray);
					array_push($this->action_msgs,$location . " set as attachment");
				}
			}
		}
	}

	function set_message_type($mtype) {

		switch ($mtype) {
			case "text":
				$this->ishtml = 0;
				array_push($this->action_msgs,"Message body set to text");
				break;
			case "html":
				$this->ishtml = 1;
				array_push($this->action_msgs,"Message body set to html");
				break;
			default:
				$this->ishtml = 0;
				array_push($this->action_msgs,"Message body set to text");
				break;
		}
	}

	function get_actions() {
		$returnstring = "";
		if (count($this->action_msgs) > 0) {
			for ($i=0;$i<count($this->action_msgs);$i++) {
				$returnstring .= $this->action_msgs[$i] . "<br>\n";
			}
		}
		return $returnstring;
	}

	function get_warnings() {
		$returnstring = "";
		if (count($this->warnings) > 0) {
			for ($i=0;$i<count($this->warnings);$i++) {
				$returnstring .= $this->warnings[$i] . "<br>\n";
			}
		}
		return $returnstring;
	}

	function get_errors() {
		$returnstring = "";
		if (count($this->error_msgs) > 0) {
			for ($i=0;$i<count($this->error_msgs);$i++) {
				$returnstring .= $this->error_msgs[$i] . "<br>\n";
			}
		}
		return $returnstring;
	}

	function send() {

		if (count($this->error_msgs) == 0) {

			$boundary = '=_'.md5(uniqid(rand()).microtime()); 

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Date: ". date("r",time()) . "\r\nFrom: ";
			$headers .= ($this->Sendername == "") ? "" : $this->Sendername . " ";
			$headers .= "<";
			$headers .= $this->Senderaddy;
			$headers .= ">\r\n";
			$headers .= "To: ";
			$headers .= $this->Recipients;
			$headers .= "\r\n";
			if (strlen($this->CC_list) > 0) {
				$headers .= "CC: ";
				$headers .= $this->CC_list;
				$headers .= "\r\n";
			}
			if (strlen($this->BCC_list) > 0) {
				$headers .= "BCC: ";
				$headers .= $this->BCC_list;
				$headers .= "\r\n";
			}
			$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
			$headers .= "Content-Transfer-Encoding: 8bit\r\n";

			$meat = "--$boundary\r\n";
			if ($this->ishtml == 0) {			
				$meat .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
			}
			if ($this->ishtml == 1) {
				$meat .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n";
			}
			$meat .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
			$meat .= $this->message;
			$meat .= "\r\n\r\n\r\n--";
			$meat .= $boundary;
			$meat .= (count($this->attachments) > 0) ? "\r\n" : "--\r\n";
			if (count($this->attachments) > 0) {
				set_magic_quotes_runtime(0);
				for ($j=0;$j<count($this->attachments);$j++) {
					$last_attachment = count($this->attachments) - 1;
					list($filename,$location,$mimetype) = split(',',$this->attachments[$j]);
					$meat .= "Content-Type: ";
					$meat .= $mimetype;
					$meat .= "; name=\"";
					$meat .= $filename;
					$meat .= "\"\r\n";
					$meat .= "Content-Transfer-Encoding: base64\r\n";
					$meat .= "Content-Disposition: attachment\r\n\r\n";
					$meat .= rtrim(chunk_split(base64_encode($this->get_file($location))));
					if ($j == $last_attachment) {
						$meat .= "\r\n--";
						$meat .= $boundary;
						$meat .= "--";
					} else {
						$meat .= "\r\n--";
						$meat .= $boundary;
						$meat .= "\r\n";
					}
				}
				set_magic_quotes_runtime(get_magic_quotes_gpc());
			}

			mail($this->Recipients,$this->subject,$meat,$headers);
			return TRUE;

		} else {
			return FALSE;
		}
	}
}

?>