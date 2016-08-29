
<?php 

    $this -> layout('master', [
      'title' => 'Welcome to Pinterest',
      'description' => 'Sign up and be inspired'
    ]);


?> 




 

<body id="rooms-body">

	<div id="sidebar-left">
		<ul id="rooms-list">

			<?php foreach ($rooms as $value): ?>
 				<li class="room-list-item"> <a class="room-link" href="index.php?page=room&room_id=<?=$value['room_id']?>"><?=$value['room_name']?></a></li>
			<?php endforeach; ?>

		</ul>
	</div>