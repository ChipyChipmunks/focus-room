

<?php 

    $this -> layout('master', [
      'title' => 'Welcome to Pinterest',
      'description' => 'Sign up and be inspired'
    ]);


?> 




 

<body id="rooms-body">

	<div id="sidebar-left">
		<ul id="rooms-list">

			<?php foreach ($comments as $comment): ?>
 				<li class="room-list-item"> <p class="room-link"><?=$comment['comment_content']?></p></li>
			<?php endforeach; ?>

		</ul>
	</div>