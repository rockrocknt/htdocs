<?

class Log
{
	static function insertActionAfterLogIn()
	{
		if(isset($_SESSION['group_user'])){
			$arr['user_id'] = $_SESSION['user_id'];
			$arr['action_id'] = 1;
			
			vaInsert('user_activity_log', $arr);
		}
	}
	
	static function insertAction($action, $article_id, $article_name)
	{
		if(isset($_SESSION['group_user'])){
			$arr['user_id'] = $_SESSION['user_id'];
			$arr['action_id'] = $action;
			$arr['article_id'] = $article_id;
			$arr['note'] = $article_name;
			
			vaInsert('user_activity_log', $arr);
		}
	}
}

?>