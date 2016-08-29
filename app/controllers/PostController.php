
<?php


class PostController {

	private $dbc;
	private $post_id;

	public function __construct($dbc) {

		//save database connection
		$this->dbc = $dbc;

		$this->post_id = $_GET['post_id'];

		echo $this->post_id;

		if ( isset( $_POST['new-account'] ) ) {
			// $this -> validateRegistrationForm();
			header('Location: index.php?page=rooms');
		}

	}

	public function buildHTML() {

		$plates = new League\Plates\Engine('app/templates');

		$data = [];

		echo $plates->render('post', $data);
	}

	public function getData() {

		$sql = "SELECT comment_id, comment_content
		 		FROM comments 
		 		WHERE post_id = $this->post_id";

		$result = $this->dbc->query($result);

		return $result;

	}
}


?>