<?php
	class albums {
		public $name;
		public $short;
		public $img;
		public $dated;
		public $unique_key;
		public $cid;
		public $id;
		public $title;
		public $keyword;
		public $description;
		public $reverse_unique_key;
		// khoi tao
		public function __construct($album) {
			global $lg;
			$rlg = $lg=="vn"?"en":"vn";
	
			$this->name = $album["name_$lg"];
			$this->short = $album["short_$lg"];
			$this->unique_key = $album["unique_key_$lg"];
			$this->img = $album["img"];
			$this->cid = $album["cid"];
			$this->dated = $album["dated"];
			$this->id = $album["id"];
            $this->title = $album["title_$lg"];
            $this->keyword = $album["keyword_$lg"];
            $this->description = $album["des_$lg"];
			$this->reverse_unique_key = $album["unique_key_$rlg"];
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

        public function getName() {
            return $this->name;
        }
		
		public function getImage($w, $h=0) {
            return getTimThumb($this->img, $w, $h);
        }
		
		public function getImageNoThumb() {
			return GetImage($this->img);
		}
		
		public function getShort() {
            return $this->short;
        }
		
		public function getDate() {
            return $this->dated;
        }
		
		public function getItems($limit=0) {
			global $db, $lg;
	
			$sql = "select * from images where active=1 and name_$lg<>'' and cid=".$this->id." and type=1 order by num asc, id desc";
			if ($limit > 0)
				$sql .= " limit $limit";
			return $db->getAll($sql);
        }
		
		public function getLink() {
			global $db;
			
			$sql = "select * from categories where id=".$this->cid;
			$parent = $db->getRow($sql);
			$parent = new Categories($parent);
			$plink = $parent->getLinkNoExtLink();
			
			return $plink.$this->unique_key.'.html';
        }
		
		public function __destruct() {
		}
	}
?>