
<?php
class RoomController extends PageController {

	private $room_id;

	private $postNameMessage;
	private $postContentMessage;

	public function __construct($dbc) {

		parent::__construct();

		//save database connection
		$this->dbc = $dbc;

		$this->room_id = isset( $_GET['room_id'] ) ? $_GET['room_id'] : 0;

		if ( isset( $_POST['new-post'] ) ) {
			$this -> validatePost();
		}

		// $room_data = $this->getRoomData();
	}

	public function checkFormContent() {

		$totalErrors = 0;

		if ( $_POST['post-name'] == '' ) {
			$this->postNameMessage = $this->postNameMessage . '<br>Post must have a name';
			$totalErrors++;
		}

		if ( strlen ($_POST['post-name'] ) > 30) {
			$this->postNameMessage = $this->postNameMessage . '<br>Post name cannot be longer than 30 characters';
			$totalErrors++;
		}

		if ( $_POST['post-content'] == '') {
			$this->postContentMessage = $this->postContentMessage . '<br>Post must have content';
		}

		if ( strlen ($_POST['post-content'] ) > 300) {
			 $this->postNameMessage = $this->postNameMessage . '<br>Post content cannot be longer than 300 characters';
			 $totalErrors++;
		}
	}

	public function validatePost() {
		
		$this->checkFormContent();

		if ($totalErrors == 0) {

			$post_name = $_GET['post-name'];
			$post_content = $_GET['post-content'];
			$owner_id = 1;
			
			//prepare the SQL
			$sql = "INSERT INTO posts (post_name, post_content, owner_id)
					VALUES ('$post_name', '$post_content', '$owner_id')";


			$this->dbc->query($sql);

			//Autolog in & redirect to rooms page
			header('Location: index.php?page=rooms');
		}

	}
	

	public function buildHTML() {

		$plates = new League\Plates\Engine('app/templates');

		$data = [];

		$data['room'] = $this->getRoomData();
		$data['posts'] = $this->getPostData();

		echo $plates->render('room', $data);

	}

	private function getPostData(){
		$roomID = $_GET['room_id'];
		$sql = "SELECT post_name, post_id, room_id, owner_id FROM posts WHERE room_id = $roomID";
		$result = $this->dbc->query($sql);
		$val = $result->fetch_all(MYSQLI_ASSOC);
		return $val;
	}

	private function getRoomData(){
		$roomID = $_GET['room_id'];
		$sql = "SELECT room_name, room_id, owner_id FROM rooms WHERE room_id = $roomID";
		$result = $this->dbc->query($sql);
		$val = $result->fetch_all(MYSQLI_ASSOC);
		return $val;
	}

}
?>