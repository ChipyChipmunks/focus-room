
<?php 

	
    $this -> layout('master', [
      'title' => 'Welcome to Pinterest',
      'description' => 'Sign up and be inspired'
    ]);

 ?>



 <form id="sign-in" action="" method="post"><br>
      	<input type="text" name="email" placeholder="Email:"><br><br>
      	<?php if ( isset( $emailMessage ) ) : ?>
        	<p> <?= $emailMessage ?> </p>
        <?php endif; ?>
      	<input type="password" name="password" placeholder="Password:"><br><br>
      	<?php if ( isset( $passwordMessage ) ) : ?>
        	<p> <?= $passwordMessage ?> </p>
        <?php endif; ?>
      	<input type="submit" class="button alert" name="login" value="Sign in">
</form>