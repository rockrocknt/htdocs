<?php
/**
 * e-CMS
 * Copyright (c)	2008, mdnguyen86@yahoo.com
 *
 */
class Categories
{
	public $name;
	public $short;
	public $content;
	public $pid;
	public $unique_key;
	public $id;
	public $comp;
	public $seo_f;
	public $img;
	public $has_child;
	public $ext_url;
	public $keyword;
	public $description;
    public $categories_displaytype_id;
    public $obj;
  var $root_tree=1;
  function admin_index($root=1){
  	if($this->params['named']['root'])
		$root= $this->params['named']['root'];
  	$this->layout = 'admin';
  	$rows = $this->Category->findAll("pid=".$root);
	$this->set('rows',$rows);
	$this->set('root',$root);
	$this->set('root_tree',$this->root_tree);
	$this->set('title_bar','Quản trị thể loại');
  }
  function admin_add(){
  	$this->layout = 'admin';
	$this->set('title_bar','Quản trị thể loại >> Thêm');
	$filter_cat = $this->admin_tree_filter();
	$cats = $this->admin_list_cat(1);
	$this->set('filter_cat',$filter_cat);
	$this->set('cats',$cats);
  }
  function admin_tree_filter($root=1,$selected=0,$comp="a",$name="cat",$onchange="TreeFilterChanged",$where="1"){  	
  	$level = 1;
	$filter_cat = '<select name="'.$name.'" id="'.$name.'" onchange="'.$onchange.'(this.value);">';
	$filter_cat .= "\n<option value='".$root."'>Top</option>\n";	
	$this->dequi($root,$filter_cat,$level,$selected,$comp,$where);
	$filter_cat .= '</select>';
	return $filter_cat;
  }
  function admin_list_cat($root=1){
	$cats = array();
	$this->dequi2($root,$cats);
	return $cats;
  }
  function admin_save_order(){
  
	$this->redirect('/'.$this->data['url']);
  }
  function dequi($root,&$html,$level,$selected,$comp,$where){
	global $db;
	$sql = "select id,name_vn,pid,comp from categories where pid=".$root." and ".$where." order by num asc, id asc";
	$all = $db->getAll($sql);
	if($all){
		for($i=0;$i<count($all);$i++){
			$temp = "";
			for($j=0;$j<$level;$j++)
				$temp .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			$checked = "";
			if($selected == $all[$i]['id'])
				$checked = " selected ";
			$html .= "<option value='".$all[$i]['id']."' ".$checked." style=\"";
			if($all[$i]['comp'] == $comp)
				$html .= "color:#0000ff;";
			if($all[$i]['pid']==1)
				$html .= "font-weight:bold;";
			$html .= "\">".$temp."|-> ".$all[$i]['name_vn']."</option>\n";
			$this->dequi($all[$i]['id'],$html,$level+1,$selected,$comp,$where);
		}
	}
  }  
  function dequi2($root,&$cats){
	$all = $this->Category->findSelfParent($root);
	if($all){
		for($i=0;$i<count($all);$i++){			
			$cats[] = array('id'=>$all[$i]['c1']['id'],
							'name'=>$all[$i]['c1']['name'],
							'ordering'=>$all[$i]['c1']['ordering'],
							'pid'=>$all[$i]['c1']['pid'],
							'parent'=>$all[$i]['c2']['parent']);
		}
		for($i=0;$i<count($all);$i++){			
			$this->dequi2($all[$i]['c1']['id'],$cats);
		}
	}
  }
  	// ham khoi tao
  	public function __construct($cat=null) {
		global $lg;
        $this->obj = $cat;
		$this->id = $cat["id"];
		if (isset($cat["pid"]))
		{
			$this->pid = $cat["pid"];
			$this->name = $cat["name_$lg"];
			$this->short = $cat["short_$lg"];
			$this->content = $cat["content_$lg"];
			$this->unique_key = $cat["unique_key_$lg"];
			$this->comp = $cat["comp"];
			$this->seo_f = $cat["seo_f_$lg"];
			$this->img = $cat["img"];
			$this->has_child = $cat["has_child"];
			$this->ext_url = $cat["ext_url_vn"];
			$this->keyword = $cat["keyword_$lg"];
			$this->description = $cat["des_$lg"];
			$this->new_tab = $cat["new_tab"];
            $this->categories_displaytype_id =  $cat["categories_displaytype_id"];
		}
	}
    public function getcategories_displaytype() {
        return $this->categories_displaytype_id;
    }
	public function getKeyword() {
		return $this->keyword;
	}
	
	public function getDescription() {
		return $this->description;
	}

	public function getUniqueKey() {
		return $this->unique_key;
	}
	
	public function getName() {
		return $this->name;
	}
    public function getNameTab() {
        return $this->obj["nametab_vn"];
    }
	public function getComp() {
		return $this->comp;
	}
	
	public function getContent() {

        if ($this->content == "")
        {
            global $db;
            $sql = "select * from intro where  id=".$this->getID();
            $row = $db->getRow($sql);
            return $row['content_vn'];
        }


        return $this->content;
	}
	
	public function getShort() {

        if ($this->short == "")
        {
          global $lg;
          if (isset($this->obj["short_".$lg])){
            return $this->obj["short_".$lg];
          }
        }

		return $this->short;
	}
	
	public function getSEO() {
		return $this->seo_f;
	}
	
	public function getID() {
		return $this->id;
	}
	
	public function getCID() {
		return $this->pid;
	}
	
	public function getGrandID() {
		global $db;
		
		$sql = "select * from categories where id=".$this->pid;
		$parent = $db->getRow($sql);
		
		$sql = "select * from categories where id=".$parent["pid"];
		$grandParent = $db->getRow($sql);
		
		return $grandParent["id"];
	}
	
	public function getHasChild() {
		return $this->has_child;
	}
	
	public function hasExtLink() {
		return $this->ext_url?true:false;
	}
	
	public function openInNewTab() {
		return $this->new_tab?true:false;
	}
	
	public function getImage($w, $h=0) {
		return getTimThumb($this->img, $w, $h);
	}
	
	public function getImageNoThumb() {
		return GetImage($this->img);
	}
		
	public function isHasImage() {
            return file_exists($this->img)?true:false;
	}
  	// lay categories hien tai, 5 cap tro xuong
    public static function getCurrentCat() {
		global $db, $cat1, $cat2, $cat3, $cat4, $cat5;
		
		if (isset($cat5['id'])) {
			return $cat5;
		}
		
		if (isset($cat4['id'])) {
			return $cat4;
		}
		
		if (isset($cat3['id'])) {
			return $cat3;
		}
		
		if (isset($cat2['id'])) {
			return $cat2;
		}
		
		if (isset($cat1['id'])) {
			return $cat1;
		}
		// la trang chu
		$sql = "select * from categories where comp=5";
		return $db->getRow($sql);
	}
	// tao title_bar, 5 cap tro xuong
    public static function getNavigationBar($class, $sign) {
		global $lg, $FullUrl, $prefix_url, $cat1, $cat2, $cat3, $cat4, $cat5;
		$link = $FullUrl.$prefix_url;
		
		$middle = "<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'>
						<a  itemprop='title' href='$FullUrl$prefix_url' itemprop='url' title='".($lg=='vn'?"Trang chủ":"Home")."'>
						 ".($lg=='vn'?"Trang chủ":"Home")."
						</a>

					</li>
					<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'> ".$sign." 
						<a href='".$link.$cat1["unique_key_$lg"]."/' itemprop='url' title='".$cat1["name_$lg"]."'  itemprop='title'>".$cat1["name_$lg"]."</a>

					</li>";
		$link .= $cat1["unique_key_$lg"]."/";
		
		if (isset($cat2)) {
			$middle .= "<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'> ".$sign." 
							<a href='".$link.$cat2["unique_key_$lg"]."/' title='".$cat2["name_$lg"]."' itemprop='url' itemprop='title'>".$cat2["name_$lg"]."</a>

						</li>";
			$link .= $cat2["unique_key_$lg"]."/";
		}
		
		if (isset($cat3)) {
			$middle .= "<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'> ".$sign." 
							<a href='".$link.$cat3["unique_key_$lg"]."/' title='".$cat3["name_$lg"]."' itemprop='url'><span itemprop='title'>".$cat3["name_$lg"]."</span></a>

						</li>";
			$link .= $cat3["unique_key_$lg"]."/";
		}
		
		if (isset($cat4)) {
			$middle .= "<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'> ".$sign." 
							<a href='".$link.$cat4["unique_key_$lg"]."/' title='".$cat4["name_$lg"]."' itemprop='url'><span itemprop='title'>".$cat4["name_$lg"]."</span></a>

						</li>";
			$link .= $cat4["unique_key_$lg"]."/";
		}
		
		if (isset($cat5)) {
			$middle .= "<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'> ".$sign." 
							<a href='".$link.$cat5["unique_key_$lg"]."/' title='".$cat5["name_$lg"]."' itemprop='url'><span itemprop='title'>".$cat5["name_$lg"]."</span></a>
							<i class='fa fa-angle-double-right'></i>
						</li>";
		}
		
		//return "<ul class='".$class."'>".$middle."</ul>";
        return "<ul class='".$class."'>".$middle."</ul>";
	}
	// lay link categories hien tai, 5 cap tro xuong, co xet link ngoai
    public function getLink() {
		global $prefix_url, $FullUrl;
		
		if ($this->ext_url)
			return $this->ext_url;

		$parentCat = new Categories($this->getParent());

		$link = $this->unique_key.'/';

		while ($parentCat->getUniqueKey())
		{
			$link = $parentCat->getUniqueKey().'/'.$link;
			$parentCat = new Categories($parentCat->getParent());
		}
        $thetag = "";
        if ($this->comp==30)
        {
        //    $thetag = "ptag/";
        }

		//return $FullUrl.$prefix_url.$thetag.$link;
		$link = $this->unique_key.'/';
		return $FullUrl.$prefix_url.$thetag.$link;
	}
	// lay link ko xet den link ngoai, dung de lay link san pham, tin tuc, ...
    public function getLinkNoExtLink() {
		global $prefix_url, $FullUrl;

		$parentCat = new Categories($this->getParent());
		$link = $this->unique_key.'/';

		while ($parentCat->getUniqueKey()) {
			$link = $parentCat->getUniqueKey().'/'.$link;
			$parentCat = new Categories($parentCat->getParent());
		}

		return $FullUrl.$prefix_url.$link;
	}
	// lay thong tin categories cha
    public function getParent() {
		global $db, $lg;

		$sql = "select * from categories where id=".$this->pid;
		return $db->getRow($sql);
	}
	// lay ra cac DANH MUC con cua no
	public function getChilds($page=0, $set_per_page=0,$debug=0) {
		global $db, $lg;

		$sql = "select * from categories where pid=".$this->id." and active=1 and name_$lg<>'' order by num asc, id asc";
        if ($debug==1) echo $sql;
        if ($set_per_page > 0)
		{
			$arr['paging'] = plpage_seo($sql, $page, $set_per_page);
			$sqlstmt = sqlmod($sql, $page, $set_per_page);
            if ($debug==1) echo "sqlstmt = ". $sqlstmt;
			$arr['list'] = $db->getAll($sqlstmt);
          //  var_dump($arr);
			return $arr;
		}
		return $db->getAll($sql);
	}
    // lay ra cac DANH MUC con cua no
    public function getChilds_PID2($page=0, $set_per_page=0,$debug=0) {
        global $db, $lg;

        $sql = "select * from categories where ((pid2=".$this->id.") or (pid3=".$this->id.") or (pid4=".$this->id.") or (pid5=".$this->id."))";
        $sql .= " and active=1 and name_$lg<>'' order by num asc, id asc";
        if ($debug==1) echo $sql;
        if ($set_per_page > 0)
        {
            $arr['paging'] = plpage_seo($sql, $page, $set_per_page);
            $sqlstmt = sqlmod($sql, $page, $set_per_page);
            if ($debug==1) echo "sqlstmt = ". $sqlstmt;
            $arr['list'] = $db->getAll($sqlstmt);
            //  var_dump($arr);
            return $arr;
        }
        return $db->getAll($sql);
    }
	
	public function getNumChild() {
		if ($this->getChilds())
			return count($this->getChilds());
		return 0;
	}
	// lay ra danh sach cac the loai con, khong phan trang (san pham, tin tuc, ...)
	public function getItems($limit=0) {
		global $db, $lg;

		if ($this->comp == 1)
			$sql = "select * from articles where active=1 and name_$lg<>'' and cid=".$this->id." order by num asc, publish_date desc";
		if ($this->comp == 2)
			$sql = "select * from products where active=1 and name_$lg<>'' and cid=".$this->id." order by num asc, id desc";
		if ($this->comp == 4)
			$sql = "select * from video where active=1 and name_$lg<>'' and cid=".$this->id." order by num asc, id desc";
		if ($this->comp == 6)
			$sql = "select * from albums where active=1 and name_$lg<>'' and cid=".$this->id." order by num asc, id desc";
		if ($limit > 0)
			$sql .= " limit $limit";
		return $db->getAll($sql);
	}
	
	public function getItemsWidget($limit=0) {
		global $db, $lg;

		if ($this->comp == 1)
			$sql = "select * from articles where active=1 and not_in_widget=0 and name_$lg<>'' and cid=".$this->id." order by num asc, publish_date desc";
		if ($this->comp == 2)
			$sql = "select * from products where active=1 and not_in_widget=0 and name_$lg<>'' and cid=".$this->id." order by num asc, id desc";
		if ($limit > 0)
			$sql .= " limit $limit";
		return $db->getAll($sql);
	}
	
	public function getNumItem() {
		if ($this->getItems())
			return count($this->getItems());
		return 0;
	}
	// lay ra danh sach cac the loai con, co phan trang (san pham, tin tuc, ...)
	public function getList($page, $set_per_page,$selectAll=0) {
		global $db, $lg;
		
		if ($this->comp == 1)
        {
            $sql = "select * from articles where active=1 and name_$lg<>'' and cid=".$this->id." order by  id  DESC ,publish_date desc";
            if ($selectAll==1)
            {
                $sql = "select * from articles where active=1 and name_$lg<>'' order by id  DESC , publish_date desc";

            }
        }

		if ($this->comp == 2)
			//$sql = "select * from products where active=1 and name_$lg<>'' and ( cid=".$this->id." or  (`cid_list` like '%;$this->id;%') ) order by num asc, id desc";
        $sql = "select * from products where active=1 and name_$lg<>'' and ( cid=".$this->id.")   order by num asc, id desc";
		if ($this->comp == 4)
			$sql = "select * from video where active=1 and name_$lg<>'' and cid=".$this->id." order by num asc, id desc";
		if ($this->comp == 6)
			$sql = "select * from albums where active=1 and name_$lg<>'' and cid=".$this->id." order by num asc, id desc";


        if ($this->comp == 1)
            $arr['paging'] = plpage_seo_article($sql, $page, $set_per_page);
        else
            $arr['paging'] = plpage_seo($sql, $page, $set_per_page);


		$sqlstmt = sqlmod($sql, $page, $set_per_page);
		$arr['list'] = $db->getAll($sqlstmt);

		return $arr;
	}


    public function getListwithSQL($page, $set_per_page,$sql,$pagingtype=0)
	{
    global $db, $lg;

 
    //$arr['paging'] = plpage_seo($sql, $page, $set_per_page);
    $arr['paging'] = plpage_seo_sort($sql, $page, $set_per_page);
    //    if ($pagingtype == 1)
    //        $arr['paging'] = plpage_seo_tag_product($sql, $page, $set_per_page);
    $sqlstmt = sqlmod($sql, $page, $set_per_page);
    //  echo $sqlstmt;
    $arr['list'] = $db->getAll($sqlstmt);

    return $arr;
    }


    public function getListwithSQL_locgia($page, $set_per_page,$sql) {
        global $db, $lg;


         $arr['paging'] = plpage_seo($sql, $page, $set_per_page);
      //  $arr['paging'] = plpage_seo_sort_locgia($sql, $page, $set_per_page);
        $sqlstmt = sqlmod($sql, $page, $set_per_page);
        //  echo $sqlstmt;
        $arr['list'] = $db->getAll($sqlstmt);

        return $arr;
    }



    public function getListAll($page, $set_per_page,$type) {
        global $db, $lg;
        $sql = "***";
        if ($this->comp == 1)
            $sql = "select * from articles where active=1 and name_$lg<>''   order by num asc, publish_date desc";
        if ($type == 2)
            $sql = "select * from products where active=1 and name_$lg<>''   order by num asc, id desc";
        if ($this->comp == 4)
            $sql = "select * from video where active=1 and name_$lg<>'' and   order by num asc, id desc";
        if ($this->comp == 6)
            $sql = "select * from albums where active=1 and name_$lg<>'' and   order by num asc, id desc";
       // echo "333". $sql;
        $arr['paging'] = plpage_seo($sql, $page, $set_per_page);
        $sqlstmt = sqlmod($sql, $page, $set_per_page);
        $arr['list'] = $db->getAll($sqlstmt);

        return $arr;
    }
	public function getView() {
		global $db, $lg;

		if ($this->comp == 1)
			$sql = "select sum(view) as totalview from articles where active=1 and name_$lg<>'' and cid=".$this->id;
		if ($this->comp == 2)
			$sql = "select sum(view) as totalview from products where active=1 and name_$lg<>'' and cid=".$this->id;
		if ($this->comp == 3) {
			$sql = "select view as totalview from categories where id=".$this->id;
		}
			
		$rel = $db->getRow($sql);

		return $rel['totalview']?$rel['totalview']:0;
	}

	public function countView() { // tinh luot view
		global $db;
		
		$UniqueSession = "CatAreViewed";
		$IdString = "[".$this->id."]";
		
		if(!isset($_SESSION[$UniqueSession])) {
			$_SESSION[$UniqueSession] = $IdString;

			$sql = "update categories set view=view + 1 where id=".$this->id;
			$db->query($sql);
		} else {
			$mystring = $_SESSION[$UniqueSession];
			$findme = $IdString;
			$pos = strpos($mystring, $findme);
			
			if($pos === false) {
				$_SESSION[$UniqueSession] .= $IdString;
				
				$sql = "update categories set view=view + 1 where id=".$this->id;	
				$db->query($sql);
			}
		}
	}
	
	public function getRelate() {
		global $db, $lg;
		
		$sql = "select * from categories where active=1 and name_$lg<>'' and pid=".$this->pid." and id<>".$this->id." and comp=3 order by num asc, id asc";
		return $db->getAll($sql);
	}
    public static  function getCatByComp($comp,$categories_displaytype_id=1,$multi =0) {
        global $db;

        $sql = "select * from `categories` where  `comp`=$comp and `categories_displaytype_id`=$categories_displaytype_id";
        if ($multi == 0)
        $row = $db->getRow($sql);
        else
            $row = $db->getAll($sql);
        return $row;
    }

    public static  function getCatByID($ID,$debug=0) {
        global $db;

        $sql = "select * from `categories` where `id`=$ID";
        if ($debug==1) echo $sql;
        $row = $db->getRow($sql);

        return $row;
    }
    public static  function getCatByParentID($pID) {
        global $db;

        $sql = "select * from `categories` where `active`=1 and `pid`=$pID   order by num asc, id asc";
        $row = $db->getAll($sql);

        return $row;
    }
    public static  function getCatBycate_type_ID($categories_displaytype_id) {
        global $db;

        $sql = "select * from `categories` where `categories_displaytype_id`=$categories_displaytype_id";
        $row = $db->getRow($sql);

        return $row;
    }
    public static  function getCatByAlias($ID) {
        global $db;

        $sql = "select * from `categories` where `alias`='$ID'";
       // echo $sql;
        $row = $db->getRow($sql);

        return $row;
    }
    public static  function getCateByPid($pid,$debug=0) {
        global $db, $lg;

        $sql = "select * from categories where pid=".$pid." and active=1 and name_$lg<>'' order by num asc, id asc";
        if ($debug==1) echo $sql;

        return $db->getAll($sql);
    }
    public   function getAlias() {
        global $db;

        $obj = $this->obj;

        return $obj["alias"];
    }

    public   function getCidList() {
        global $db,$lg;

        $obj = $this->obj;

        $productidlist =$obj["cidlist"];

        $list = explode (";",$productidlist);
        $where = "";
        for($iaaa=0;$iaaa<count($list);$iaaa++)
        {
            if (is_numeric($list[$iaaa]))
            {
                if ($where != "") $where .= " or `id`=".$list[$iaaa];
                else $where = " `id`=".$list[$iaaa];
            }

        }
        $sql = "select * from `categories` where ". $where." order by id desc  limit 9";
        $listCid = $db->getAll($sql);
        $listlast = array();
        $index =0;
        for($iaaa=0;$iaaa<count($list);$iaaa++)
        {
            for($iaaa2=0;$iaaa2<count($listCid);$iaaa2++)
            {
                if (isset($listCid[$iaaa2]['id']))
                {
                    $ciddd = $listCid[$iaaa2];
                    if ($list[$iaaa] == $ciddd['id'])
                    {
                        $listlast[$index] = $ciddd;
                        $index++;
                    }
                }
            }
        }



        return $listlast;

    }
	 public   function getSameGroupName($limit) {
        global $db,$lg;

        $obj = $this->obj;

        $group_name =$obj["group_name_$lg"];

        if ($group_name != "")
        {
		    $sql = "select * from categories where `comp`='3' and `group_name_$lg`='".$group_name."' and `id`<>".$this->id."  order by num asc, id asc  limit 0,$limit";
            return $db->getAll($sql);
        }else
        {

            $sql = "select * from `categories` where    `comp`='3' and `group_name_vn` <> ''  ORDER BY RAND() limit 0,5 ";
            return $db->getAll($sql);
        }
         
    }
	
	public function __destruct() {
	}
	public function countView2() { // tinh luot view
			global $db;
			
			$UniqueSession = "ArtAreViewedCate";
			$IdString = "[".$this->id."]";
			
			if(!isset($_SESSION[$UniqueSession])) {
				$_SESSION[$UniqueSession] = $IdString;
	
				$sql = "update categories set view=view + 1 where id=".$this->id;
				$db->query($sql);
			} else {
				$mystring = $_SESSION[$UniqueSession];
				$findme = $IdString;
				$pos = strpos($mystring, $findme);
				
				if($pos === false) {
					$_SESSION[$UniqueSession] .= $IdString;
					
					$sql = "update categories set view=view + 1 where id=".$this->id;	
					$db->query($sql);
				}
			}
		}
	
    public static  function getMenu1() {
        $root["id"] = 121;
        $root = new Categories($root);
        $Menu1 = $root->getChilds();
        return $Menu1;
    }
    public static  function getMenu2($Menu1) {
        $Menu2 = array();
        if($Menu1) {
            foreach ($Menu1 as $i=>$menu) {
                $menu = new Categories($menu);
                if ($menu->getHasChild() == 1) {
                    $Menu2[$i] = $menu->getChilds();
                } else {
                    $Menu2[$i] = "";
                }
            }
        }
        return $Menu2;
    }
	public static  function getmostviewed($limit) { 
            global $db;

            //$sql = "select * from `categories` where    `comp`='3' and `group_name_vn` <> ''  order by  view desc limit 0,$limit";
        $sql = "select * from `categories` where    `comp`='3'  and (categories_displaytype_id <>3) and (categories_displaytype_id <>4)  order by  view desc limit 0,$limit";
            // echo $sql;
            $row = $db->getAll($sql);

            return $row;
        }

    public static    function getCidListFrom($cidlist) {
        global $db,$lg;



        $productidlist =$cidlist;

        $list = explode (";",$productidlist);
        $where = "";
        for($iaaa=0;$iaaa<count($list);$iaaa++)
        {
            if (is_numeric($list[$iaaa]))
            {
                if ($where != "") $where .= " or `id`=".$list[$iaaa];
                else $where = " `id`=".$list[$iaaa];
            }

        }
        $sql = "select * from `categories` where ". $where." order by id desc  limit 9";
        $listCid = $db->getAll($sql);

        $listReturn = array();
        for($iaaa=0;$iaaa<count($list);$iaaa++)
        {
            if (is_numeric($list[$iaaa]))
            {
               for($i=0;$i<count($listCid);$i++)
               {
                   if ($listCid[$i]['id']==$list[$iaaa]){
                       $listReturn[$iaaa] = $listCid[$i];
                   }
               }
            }

        }

        return $listReturn;

    }
	public  static function getByUniqueKey($uniqueKey)
        {
			
            global $db,$lg;
			
            $sql = "SELECT `categories`.*, component.do, component.act FROM `categories` LEFT JOIN `component` ON `categories`.comp =`component`.id  where `unique_key_vn`='$uniqueKey'";
			
            return $db ->getRow($sql);
        }
	public  static function getById($categoryId)
        {
			
            global $db,$lg;
			
            $sql = "SELECT * FROM `categories`  where `categories`.id='$categoryId'";
			
            return $db ->getRow($sql);
        }
		public  static function getByDisplayTypeId($categoryDisplayTypeId)
        {
			
            global $db,$lg;
			
            $sql = "SELECT * FROM `categories`  where `categories`.categories_displaytype_id='$categoryDisplayTypeId'";
			
            return $db ->getRow($sql);
        }
	public function getDisplayType()
	{
		$obj = $this->obj;
		
		return $obj['categories_displaytype_id'];
	}
	
}
?>