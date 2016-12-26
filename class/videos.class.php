<?php
	class videos{
		public $name;
		public $cid;
		public $id;
		public $url;
		public $unique_key;
		public $img;
		public $title;
		public $keyword;
		public $description;
		public $reverse_unique_key;
		// khoi tao
		public function __construct($video) {
			global $lg;
			$rlg = $lg=="vn"?"en":"vn";
	
			$this->name = $video["name_$lg"];
			$this->id = $video["id"];
			$this->url = $video["url"];
			$this->cid = $video["cid"];
			$this->unique_key = $video["unique_key_$lg"];
			$this->img = $video["img"];
            $this->title = $video["title_$lg"];
            $this->keyword = $video["keyword_$lg"];
            $this->description = $video["des_$lg"];
			$this->reverse_unique_key = $video["unique_key_$rlg"];
		}
		
		public function getReverseUniqueKey() {
			return $this->reverse_unique_key;
		}

        public function getDescription() {
            return $this->description;
        }

        public function getKeyword() {
            return $this->keyword;
        }

        public function getTitle() {
            return $this->title;
        }
		
		public function getImage($w, $h=0) {
            return getTimThumb($this->img, $w, $h);
        }
		
		public function getImageNoThumb() {
            return GetImage($this->img);
        }

        public function getName()
        {
            return $this->name;
        }
		
		public function getUrl() {
            return $this->url;
        }
		
		public function getID() {
			return $this->id;
		}
		
		public function getLink() {
			global $db;
			
			$sql = "select * from categories where id=".$this->cid;
			$parent = $db->getRow($sql);
			$parent = new Categories($parent);
			$plink = $parent->getLinkNoExtLink();
			
			return $plink.$this->unique_key.'.html';
        }
		
		public function getCode() {
			parse_str( parse_url($this->url, PHP_URL_QUERY ), $my_array_of_vars );
			$code= $my_array_of_vars['v'];
			return "http://www.youtube.com/embed/".$code;
		}
		
		public function getRelate() {
			global $db, $lg;
			// cu hon
			$sql = "select * from video where active=1 and name_$lg<>'' and id<".$this->id." and cid=".$this->cid." order by id desc limit 4";
			$older = $db->getAll($sql);
			// moi hon
			$sql = "select * from video where active=1 and name_$lg<>'' and id>".$this->id." and cid=".$this->cid." order by id asc limit 4";
			$newer = $db->getAll($sql);
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

		public function getVideo($w, $h) {
			$parse = parse_url($this->url);
			$domain =  $parse['host'];
		
			if($domain=="www.youtube.com") {
				parse_str( parse_url($this->url, PHP_URL_QUERY ), $my_array_of_vars );
				$idurl= $my_array_of_vars['v'];
				
				$string = "<iframe width='".$w."' height='".$h."' src='http://www.youtube.com/embed/".$idurl."?wmode=opaque&amp;rel=0' style='border:medium none;'></iframe>";
				echo $string;
			} else {
				echo "Cần 1 plugin video!";
			}
		}
		
		public function __destruct() {
		}
	}
?>