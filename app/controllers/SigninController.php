

<?php


class SigninController {

	private $dbc;

	public function __construct($dbc) {

		//save database connection
		$this->dbc = $dbc;

		if ( isset( $_POST['login'] ) ) {
			$this -> validateLoginForm();
		}

	}

	public function buildHTML() {

		$plates = new League\Plates\Engine('app/templates');

		$data = [];

		echo $plates->render('signin', $data);
	}

	private function validateLoginForm() {

		$totalErrors = 0;

		if ( $_POST['email'] == '' ) {
			$this->emailMessage =  'Invalid Email';
			$totalErrors++;
		}

		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT user_email, user_hash FROM users WHERE user_email = $filteredEmail";

		$result = $this->dbc->query($sql);

		$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

		if ( isset( $result ) ) {
			if ($hash != $result['user_hash']) {
				$passwordMessage = "Incorrect password";
				$totalErrors++;
			}
		}
		else {
			$emailMessage = "Incorrect email";
			$totalErrors++;
		}

		if ($totalErrors == 0) {
			$_SESSION['id'] = $this->dbc->insert_id;


			header('Location: index.php?page=rooms');
		}

	}
}


?>