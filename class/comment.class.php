<?php
class Comments {
		public $id;
		public $avatar;
		public $has_child;
		public $author;
		public $dated;
		public $content;
		
		public function __construct($comment) {
			$this->id = $comment["cmt_id"];
			$this->avatar = $comment["cmt_avatar"];
			$this->has_child = $comment["has_child"];
			$this->author = $comment["cmt_name"];
			$this->dated = $comment["cmt_insert_date"];
			$this->content = $comment["cmt_content"];
		}
		
		public function getImage($w, $h=0) {
			return getTimThumb($this->avatar, $w, $h);
		}
		
		public function getHasChild() {
			return $this->has_child;
		}
		
		public function getID() {
			return $this->id;
		}
		
		public function getAuthor() {
			return $this->author;
		}
		
		public function getDate() {
			return $this->dated;
		}
		
		public function getContent() {
			return $this->content;
		}
	
		public function getChilds() {
			global $db;
	
			$sql = "select * from comments where cmt_active=1 and cmt_pid=".$this->id." order by cmt_id asc";
			return $db->getAll($sql);
		}

		public function __destruct() {
		}
        public static  function getCommentByProductID($proid)
        {
            global $db;

            $sql = "select * from comments where cmt_active=1 and cmt_product_id=".$proid." order by cmt_id asc";
            return $db->getAll($sql);
        }

	}