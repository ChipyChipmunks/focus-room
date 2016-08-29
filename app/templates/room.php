

  <?php 

    $room_id = $_GET['room_id'];

    $this -> layout('master', [
      'title' => "Focus Room: $room_id",
      'description' => 'Sign up and be inspired'
    ]);
  ?> 

  <body id="intro">

  	<?php if ( isset( $room[0]['room_name'] ) ) : ?>
       <h1> <?= $room[0]['room_name'] ?> </h1>

    <?php else: ?>
    	<h1>Untitled Room</h1>

    <?php endif; ?>

    <?php foreach($posts as $post): ?>
    	<h1><?= $post['post_name']?></h1>
	<?php endforeach ?>

	<form id='add-post' method="post">
		<input type="text" name="post-name" maxlength="30" placeholder="Post name: "><br>
		<input type="text" name="post-content" maxlength="300" placeholder="Post name: "><br>
		<input type="submit" class="button alert" name="new-post" value="Submit">
	</form>
	