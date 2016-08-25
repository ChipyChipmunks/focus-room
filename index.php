

<?php

  session_start();
  
  require 'vendor/autoload.php'; //Make everything in the vendor folder available to the project
  require 'app/controllers/PageController.php';

  //check the data in $_GET['page']
  $page = isset( $_GET['page'] ) ? $_GET['page'] : 'landing';

  $data = isset( $_GET['room'] ) ? $_GET['room'] : '0';

  //connect to database
  $dbc = new mysqli( 'localhost', 'root', '', 'focus_room' );


  /*
    take the data in the $page = $_GET['page'] and render the appropreate file
  */


  switch ($page) {
    case 'landing' :
      require 'app/controllers/LandingController.php';
      $controller = new LandingController($dbc);
    break;

    case 'rooms':
      require 'app/controllers/RoomsController.php';
      $controller = new RoomsController($dbc);
    break;

    case 'room' :
      require 'app/controllers/RoomController.php';
      $controller = new RoomController($dbc);
    break;
    
    default:

      require 'app/controllers/LandingController.php';
      $controller = new LandingController($dbc);
    break;
  }

  
  $controller->buildHTML();
  
?>