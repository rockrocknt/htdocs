<?php
$data = $_POST;
if (!empty($data['keySession'])) {
		if (!empty($data['value'])) {
			$_SESSION[$data['keySession']] = $data['value'];
		}
}