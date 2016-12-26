<?
global $do, $act;

if (file_exists('./templates/admin/masterpage_empty.ctp')
&& ($do=='products') && ($act=='danhmucphu')
){
    include('./templates/admin/masterpage_empty.ctp');

}else

	include('./templates/admin/masterpage.ctp');



