
<?php


class RoomsController {

	private $dbc;

	public function __construct($dbc) {

		//save database connection
		$this->dbc = $dbc;
	}

	

	public function buildHTML() {

		$plates = new League\Plates\Engine('app/templates');

		$data = [];

		$rooms = $this->getRooms();


		$data['rooms'] = $rooms;

		echo $plates->render('rooms', $data);
	}

	public function getRooms() {

		$sql = "SELECT room_name, room_id, owner_id FROM rooms";
		$result = $this->dbc->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

}


?>