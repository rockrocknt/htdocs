<?php
	class articles {
		public $name;
		public $short;
		public $content;
		public $img;
		public $dated;
		public $unique_key;
		public $cid;
		public $id;
		public $view;
		public $pubdate;
		public $keyword;
		public $description;
        public $title;
		public $index;
		public $reverse_unique_key;
		// khoi tao
		public function __construct($article) {
			global $lg;
			$rlg = $lg=="vn"?"en":"vn";
	        $this->obj = $article;
			$this->name = $article["name_$lg"];
			$this->short = $article["short_$lg"];
			$this->content = $article["content_$lg"];
			$this->unique_key = $article["unique_key_$lg"];
			$this->img = $article["img"];
			$this->cid = $article["cid"];
			$this->dated = $article["dated"];
			$this->id = $article["id"];
			$this->view = $article["view"];
			$this->pubdate = $article["publish_date"];
			$this->keyword = $article["keyword_$lg"];
			$this->description = $article["des_$lg"];
            $this->title = $article["title_$lg"];
			$this->index = $article["is_noindex"];
			$this->reverse_unique_key = $article["unique_key_$rlg"];
		}
		
		public function getReverseUniqueKey() {
			return $this->reverse_unique_key;
		}
		
		public function getIndex() {
			return $this->index;
		}

        public function getTitle() {
            return $this->title;
        }
		
		public function getKeyword() {
			return $this->keyword;
		}
		
		public function getDescription() {
			return $this->description;
		}
		
		public function getView() {
			return $this->view;
		}
		
		public function getID() {
			return $this->id;
		}
		
		public function getCID() {
			return $this->cid;
		}

        public function getName() {
            return $this->name;
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
		
		public function getShort() {
            return $this->short;
        }
		
		public function getContent() {
            return $this->content;
        }
		
		public function getDate() {
            return $this->pubdate;
        }
		
		public function getLink() {
			global $db,$lg;
			$sql = "select * from categories where id=".$this->cid;
			$parent = $db->getRow($sql);
			/*
			$sql = "select * from categories where id=".$this->cid;
			$parent = $db->getRow($sql);
			$parent = new Categories($parent);
			$plink = $parent->getLinkNoExtLink();
			*/
			
			//return $plink.$this->unique_key.'.html';
            return "/". $parent['unique_key_'.$lg]. "/" .$this->unique_key.'.html';
        }
		
		public function getRelate() {
			global $db, $lg;
			
			$num_relate = Info::getInfoField('num_relate_article');
			
			$sql = "select * from articles where active=1 and name_$lg<>'' and cid=".$this->cid." and id<>".$this->id." order by publish_date desc";
			$total = $db->getAll($sql);

			if (count($total) < $num_relate)
				return $total;

			$num_older = floor($num_relate/2);
			$num_newer = $num_relate%2==0?$num_older:$num_older+1;
			// cu hon
			//$sql = "select * from articles where active=1 and name_$lg<>'' and publish_date<='".$this->pubdate."' and cid=".$this->cid." order by publish_date desc limit $num_older";
            $sql = "select * from articles where active=1 and name_$lg<>'' and id<='".$this->id."' and cid=".$this->cid." order by id desc limit $num_older";
			$older = $db->getAll($sql);

			// moi hon
		//	$sql = "select * from articles where active=1 and name_$lg<>'' and publish_date>='".$this->pubdate."' and cid=".$this->cid." order by publish_date asc limit $num_newer";
            $sql = "select * from articles where active=1 and name_$lg<>'' and id>'".$this->id."' and cid=".$this->cid." order by publish_date asc limit $num_newer";
			$newer = $db->getAll($sql);
         //   var_dump($newer);

            /*
			// tinh so chenh lech
			$count_older = $num_older - count($older);
			$count_newer = $num_newer - count($newer);

			if ($count_older) {
				$sql = "select * from articles where active=1 and name_$lg<>'' and publish_date>'".$this->pubdate."' and cid=".$this->cid." order by publish_date asc limit ".($num_newer+$count_older);
				$newer = $db->getAll($sql);
			} else if ($count_newer) {
				$sql = "select * from articles where active=1 and name_$lg<>'' and publish_date<'".$this->pubdate."' and cid=".$this->cid." order by publish_date desc limit ".($num_older+$count_newer);
				$older = $db->getAll($sql);
			}

            */
			// gom thanh 1 mang & tra ve
			$result = array();
			$index = 0;
			if ($newer)
			{
				for ($i=count($newer)-1; $i>-1; $i--)
				{
					$result[$index] = $newer[$i];
					$index++;
				}
			}
			if ($older)
			{
				for ($j=0; $j<count($older); $j++)
				{
					$result[$index] = $older[$j];
					$index++;
				}
			}

			return $result;
		}
		
		public function getTag($tab='') {
			global $db, $FullUrl, $lg;
	
			$sql = "select tags.* from tags, tags_art where active=1 and idart=".$this->id." and post_in='articles' and tags.idtag=tags_art.idtag";
			$tags = $db->getAll($sql);
			$begintab = $endtab = "";
			$prefix = $lg=='vn'?"/tag/tin-tuc/":"/en/tag/articles/";
			$result = "";
	
			if($tab!=''){
				$begintab = "<".$tab.">";
				$endtab = "</".$tab.">";
			}
			if ($tags)
			{
				foreach ($tags as $i=>$tag) {
					$result .= $begintab."<a href='".$FullUrl.$prefix.$tag["unique_key_tag"]."/' title='".$tag["name_tag"]."'>".$tag["name_tag"]."</a>".$endtab;
					if($i+1 !=count($tags))
						$result .= ", ";
				}
			}
			return $result;
		}
		
		public function getComments() {
			global $db;
	
			$sql = "select * from comments where cmt_post_id=".$this->id." and cmt_do='articles' and cmt_active=1 and cmt_pid=0 order by cmt_id desc";
			return $db->getAll($sql);
		}

		public function getNumComment() {
			global $db;

			$sql = "select * from comments where cmt_post_id=".$this->id." and cmt_do='articles' and cmt_active=1";
			return $db->numRows($db->query($sql));
		}
		
		public function countView() { // tinh luot view
			global $db;
			
			$UniqueSession = "ArtAreViewed";
			$IdString = "[".$this->id."]";
			
			if(!isset($_SESSION[$UniqueSession])) {
				$_SESSION[$UniqueSession] = $IdString;
	
				$sql = "update articles set view=view + 1 where id=".$this->id;
				$db->query($sql);
			} else {
				$mystring = $_SESSION[$UniqueSession];
				$findme = $IdString;
				$pos = strpos($mystring, $findme);
				
				if($pos === false) {
					$_SESSION[$UniqueSession] .= $IdString;
					
					$sql = "update articles set view=view + 1 where id=".$this->id;	
					$db->query($sql);
				}
			}
		}
		
		public function __destruct() {
		}
        public static  function getByCid($CID) {
            global $db;

            $sql = "select * from `articles` where `cid`='$CID' order by num asc, id desc";
            // echo $sql;
            $row = $db->getAll($sql);

            return $row;
        }

        public static  function getlatest($limit) {
            global $db;

            $sql = "select * from `articles` where `active`='1' and `categories_displaytype_id`='1'  order by  id desc limit 0,$limit";
            // echo $sql;
            $row = $db->getAll($sql);

            return $row;
        }
        public static  function getlatest_cid($limit,$cid=0) {
            global $db;

            $sql = "select * from `articles` where  `active`='1'    order by  id desc limit 0,$limit";

            if ($cid > 0)
                $sql = "select * from `articles` where `cid`='$cid' and `active`='1'    order by  id desc limit 0,$limit";
            //  echo $sql;
            $row = $db->getAll($sql);

            return $row;
        }
		 public static  function getmostviewed($limit,$cid=0) {
            global $db;
             $sql = "select * from `articles` where  `cid`=$cid and `active`='1' and `categories_displaytype_id`='1'  order by  view desc limit 0,$limit";
            if ($cid== 0)
            $sql = "select * from `articles` where `active`='1' and `categories_displaytype_id`='1'  order by  view desc limit 0,$limit";

            // echo $sql;
            $row = $db->getAll($sql);

            return $row;
        }
		public  static function getByUniqueKey($uniqueKey)
        {
			
            global $db,$lg;
			
            $sql = "SELECT * FROM `articles`  where `unique_key_vn`='$uniqueKey'";
			
            return $db ->getRow($sql);
        }
	}
?>