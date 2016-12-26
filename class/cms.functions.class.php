<?php
class cmsFunction{
    public static function isNoEdit($item)
	{
		if ((cmsFunction::isLockItem($item)) || ($item['admin_id'] != $_SESSION['admin_id'] && !cmsFunction::isNewsManager()))
		{
			return true;
		}
		return false;
	}
	
	public static function isNewsManager() {
		global $db;
		
		$sql = "select * from admin_groups_detail where rightid=12 and active=1 and admingroupid=".$_SESSION['group_user'];
		$r = $db->getRow($sql);
		if ($r["id"])
			return true;
		return false;
	}

    public static function isLockItem($post)
	{
		if ($post['is_lock']==1 && !cmsFunction::isNewsManager())
			return true;
		return false;
	}

    public static function PhanQuyenAdmin($do)
	{
		global $db;

		$sql = "select * from admin_groups where active=1 and id=".$_SESSION['group_user'];
		$userGroup = $db->getRow($sql);
		$type = SafeQueryString('type');
		$cid = SafeQueryString('cid');
		$group = 0;
		
		if (!$userGroup) {	// kiem tra xem nhom user co duoc active hay khong
			unset($_SESSION["store_login"]);
			unset($_SESSION["admin_username"]);
			unset($_SESSION["admin_id"]);
			unset($_SESSION['group_user']);
			unset($_SESSION['counter_login']);
			$page = "admin.php";
			$msg = "Nhóm quản trị này chưa được kích hoạt!";
			page_transfer($msg, $page);
		}
		else
		{
            $act   = isset($_GET["act"])  ? $_GET["act"]  : "";
            if (($act=="del") || ($act=="dellist")){
                if ($userGroup['id'] > 1)
                {
                    die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />liên hệ admin bạn không có quyền xóa!PhanQuyenAdmin()");
                }
            }
			switch ($do)
			{
				case "categories":
					$group = 2;
					break;

				case "articles":
					$group = 3;
					break;

				case "products":
					$group = 4;
					break;
				case "images":
					if ($type==2)
						$group = 4;
					else if ($type==5)
						$group = 9;
					break;

				case "orders":
					$group = 5;
					break;
				case "thankyou":
					$group = 5;
					break;

				case "admin_groups":
					$group = 6;
					break;
				case "users":
					$group = 6;
					break;
				case "userlog":
					$group = 6;
					break;

				case "member":
					$group = 7;
					break;
				case "contact_logs":
					$group = 7;
					break;
				case "comments":
					$group = 7;
					break;

				case "infos":
					$group = 8;
					break;
				case "img_group":
					$group = 8;
					break;
				case "img":
					$group = 8;
					break;

				case "albums":
					$group = 9;
					break;
				case "video":
					$group = 9;
					break;

				case "widgets":
					$group = 10;
					break;

				case "nicks":
					$group = 11;
					break;
				case "optin_type":
					$group = 11;
					break;
				case "optin":
					$group = 11;
					break;
			}

			if ($group)
			{
				$sql = "select * from admin_groups_detail where active=1 and admingroupid=".$_SESSION['group_user'];
				$rightList = $db->getAll($sql);
				$bool = false;
				// kiem tra xem user co duoc phan quyen vao $do hay khong
				for ($i=0; $i<count($rightList); $i++)
					if ($rightList[$i]['rightid'] == $group)
					{
						$bool = true;
						break;
					}
	
				if (!$bool)	// neu khong co thi chuyen ve trang no duoc phan quyen
				{
					$page = "admin.php";
					$msg = "Bạn không thể chỉnh sửa nội dung trong này!";
					page_transfer($msg, $page);
				}
			}
		}
	}

    public static function isShowGroupMenu($id)
	{
		global $db;

		$sql = "select * from admin_groups where active=1 and id=".$_SESSION['group_user'];
		$userGroup = $db->getRow($sql);
		$sql = "select * from admin_groups_detail where active=1 and admingroupid=".$_SESSION['group_user'];
		$rightList = $db->getAll($sql);
		
		for ($i=0; $i<count($rightList); $i++)
			if ($rightList[$i]['rightid'] == $id)
			{
				return true;
			}
		
		return false;
	}

    public static function insertUniquekey($table, $uniqueKey, $lg, $id, $cid)
	{
		global $db;
		
		if ($uniqueKey=="")
			return $uniqueKey;
		
		$sql = "select * from $table where unique_key_$lg='$uniqueKey' and cid=$cid";
		$r = $db->getRow($sql);
		
		if ($r)
			return $uniqueKey.'-'.$id;
		return $uniqueKey;
	}

    public static function updateUniquekey($table, $uniqueKey, $lg, $id, $cid)
	{
		global $db;
		
		if ($uniqueKey=="")
			return $uniqueKey;
		
		$sql = "select * from $table where unique_key_$lg='$uniqueKey' and cid=$cid";
		$r = $db->getRow($sql);
		
		if ($r && $r['id']!=$id)
			return $uniqueKey.'-'.$id;
		return $uniqueKey;
	}

    public static function insertTag($id, $type, $name_tags, $unique_key_tags)
	{
		global $db;

		$tag['idart'] = $id;
		$tag['post_in'] = $type;
		$unique_key_tag = explode(",", $unique_key_tags);
		$name_tag = explode(",", $name_tags);

		for($k=0; $k<count($name_tag); $k++)
		{
			if($unique_key_tag[$k] !='')
			{
				$sql = "select * from tags where unique_key_tag='".$unique_key_tag[$k]."' and name_tag like '".$name_tag[$k]."'";
				$checkTag = $db->getRow($sql);
				if($checkTag)
				{
					$tag['idtag'] = $checkTag['idtag'];
					vaInsert('tags_art', $tag);
				}
				else
				{
					$arrTag['unique_key_tag'] = $unique_key_tag[$k];
					$arrTag['name_tag'] = $name_tag[$k];
					$tagid = vaInsert('tags', $arrTag);
					$tag['idtag'] =$tagid;
					vaInsert('tags_art', $tag);
				}
			}
		}
	}

    public static function updateTag($id, $type, $name_tags, $unique_key_tags)
	{
		global $db;

		$tag['idart'] = $id;
		$tag['post_in'] = $type;
		$unique_key_tag = explode(",", $unique_key_tags);
		$name_tag = explode(",", $name_tags);
	
		for($k=0; $k<count($name_tag); $k++)
		{
			if($unique_key_tag[$k] !='')
			{
				$sql = "select * from tags where unique_key_tag='".$unique_key_tag[$k]."' and name_tag like '".$name_tag[$k]."'";
				$checkTag = $db->getRow($sql);

				if($checkTag)
				{
					$sql = "update tags_art set active=1 where active=0 and idart=$id and post_in='$type' and idtag=".$checkTag['idtag'];
					$db->query($sql);

					if (!$db->db_affected_rows())
					{
						$tag['idtag'] = $checkTag['idtag'];
						vaInsert('tags_art', $tag);
					}
				}
				else
				{
					$arrTag['unique_key_tag'] = $unique_key_tag[$k];
					$arrTag['name_tag'] = $name_tag[$k];
					$tagid = vaInsert('tags', $arrTag);
					$tag['idtag'] =$tagid;
					vaInsert('tags_art', $tag);
				}
			}
		}
	}

    public static function createTag($str)
	{
		$replaceList = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ");
		$str = str_replace($replaceList, "a", $str);
		$replaceList = array("è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ");
		$str = str_replace($replaceList, "e", $str);
		$replaceList = array("ì", "í", "ị", "ỉ", "ĩ", "Ì", "Í", "Ị", "Ỉ", "Ĩ");
		$str = str_replace($replaceList, "i", $str);
		$replaceList = array("ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ");
		$str = str_replace($replaceList, "o", $str);
		$replaceList = array("ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ");
		$str = str_replace($replaceList, "u", $str);
		$replaceList = array("ỳ", "ý", "ỵ", "ỷ", "ỹ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ");
		$str = str_replace($replaceList, "y", $str);
		$replaceList = array("đ", "Đ");
		$str = str_replace($replaceList, "d", $str);
		$replaceList = array(" ", "!", "@", "%", "^", "*", "(", ")", "|", "+", "=", "<", ">", "?", "/", ".", ":", ";", "'", "\"", "&", "#", "[", "]", "~", "$");
		$str = str_replace($replaceList, "-", $str);
		$str = str_replace("---", "-", $str);
		$str = str_replace("--", "-", $str);
		
		$str = strtolower($str);
		$str = cmsFunction::renameTag($str);
		
		return $str;
	}

    public static function renameTag($filename){
	
		$filename = str_replace("& ", "", $filename);
	
		$filename = str_replace(" &", "", $filename);
	
		$filename = str_replace("&", "", $filename);
	
		$filename = str_replace(" - ", "-", $filename);
	
		$filename = str_replace(" -", "-", $filename);
	
		$filename = str_replace("- ", "-", $filename);
	
		$filename = str_replace(" ", "-", $filename);
	
		return $filename;
	}

    public static function createImgName($str)
	{
		$replaceList = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ");
		$str = str_replace($replaceList, "a", $str);
		$replaceList = array("è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ");
		$str = str_replace($replaceList, "e", $str);
		$replaceList = array("ì", "í", "ị", "ỉ", "ĩ", "Ì", "Í", "Ị", "Ỉ", "Ĩ");
		$str = str_replace($replaceList, "i", $str);
		$replaceList = array("ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ");
		$str = str_replace($replaceList, "o", $str);
		$replaceList = array("ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ");
		$str = str_replace($replaceList, "u", $str);
		$replaceList = array("ỳ", "ý", "ỵ", "ỷ", "ỹ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ");
		$str = str_replace($replaceList, "y", $str);
		$replaceList = array("đ", "Đ");
		$str = str_replace($replaceList, "d", $str);
		$replaceList = array(" ", "!", "@", "%", "^", "*", "(", ")", "|", "+", "=", "<", ">", "?", "/", ".", ":", ";", "'", "\"", "&", "#", "[", "]", "~", "$");
		$str = str_replace($replaceList, "-", $str);
		$str = str_replace("---", "-", $str);
		$str = str_replace("--", "-", $str);
		
		$str = strtolower($str);
		$str = RenameFile($str);
		
		return $str;
	}
}
?>