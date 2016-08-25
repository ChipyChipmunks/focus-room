
  <?php 

    $this -> layout('master', [
      'title' => 'Welcome to Pinterest',
      'description' => 'Sign up and be inspired'
    ]);

  ?> 

  <body id="intro">

    <div class="row align-center text-center" id="hello">
      <h1>Welcome to Focus Room</h1>
      <p>Create & Share targeted disscusion boards</p>

      <form id="sign-up" action="" method="post"><br>
      	<input type="text" name="firstname" placeholder="First name:"><br><br>
      	<input type="text" name="lastname" placeholder="Last name:"><br><br>
      	<input type="text" name="email" placeholder="Email:"><br><br>
      	<?php if ( isset( $emailMessage ) ) : ?>
        	<p> <?= $emailMessage ?> </p>
        <?php endif; ?>
      	<input type="password" name="password" placeholder="Password:"><br><br>
      	<input type="password" name="password-confirm" placeholder="Confirm password:"><br><br>
      	<?php if ( isset( $passwordMessage ) ) : ?>
        	<p> <?= $passwordMessage ?> </p>
        <?php endif; ?>
      	<br>
      	<input type="submit" class="button alert" name="new-account" value="Sign Up">
      </form>

    </div>
