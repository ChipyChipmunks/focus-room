

<!DOCTYPE php>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Focus Rooms</title>

    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">

    <link rel="stylesheet" href="fonts/font-awesome-4.6.3/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Focus Rooms</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <br><br><br><br>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">

            <?php 
              $rooms = array("Overview", "Reports", "Analytics", "Export", "Nav Item", "Another Nav Item",
                "One more nav", "Another nav", "More navigation", "Nav item again", "One more nav", "Another nav");
            ?>

            <?php for ($i = 0; $i < count($rooms); $i++): ?>
              <?php  if ($i === 0): ?>
                <li class="active"><a href="#"><?="$rooms[$i]"?> <span class="sr-only">(current)</span></a></li>
                <?php else: ?>
                  <li><a href="#"><?="$rooms[$i]"?></a></li>
              <? endif ?>
            <?php endfor ?>
          </ul>
        </div>
      </div>
    </div>

        <div id="main" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Overview</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <ul id="posts">

                <?php
                  $message = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

                  $image = "http://placehold.it/100/100/";

                  ?>

                <?php 

                 
                  $username = "Liam O'Connor";
                  $controls = 
                    "\t\t"
                    . "<i class='fa fa-pencil-square-o edit' class='post-controls' id='#$i' aria-hidden='true'></i>"
                    . "\t"
                    . "<i class='fa fa-trash-o trash' aria-hidden='true' class='post-controls' id='#$i'></i>";
                    

                ?>

                <?php  for ($i = 0; $i < 5; $i++): ?>
                  <li class='post-card'>
                  <p class="poster">
                    <?=
                      "$username "
                      . "$controls"
                    ?>
                  </p>
                      
                      <p><?=$message?></p>
                      <div class='actions-container'>
                        <button class='comment-post' data-toggle='collapse' data-target='#<?=$i?>'>
                          <i class='fa fa-arrow-down arrow' aria-hidden='true'></i>
                          <p class='comments-p'>comments</p>
                        </button>
                    </div>
                    <div class='dropdown' id='<?=$i?>'>

                      <?php for ($j = 0; $j < rand(1, 5); $j++): ?>
                        <p>
                          <?=
                            "$username "
                            . "$controls"
                          ?>
                        </p>
                        <div class="comment-container">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                          <?php
                            if (rand(0, 2) === 2) {
                              echo("<img src='$image'/>");
                            }
                          ?>

                          <div class="actions-container">
                            <button class='edit-post'>Edit</button>
                            <button class='delete-post'>Delete</button>
                          </div>
                        </div>
                      <?php endfor ?>
                      <textarea class="comment-input" id="#$j"></textarea>
                      <button class="comment-submit" id="<?="#$j"."-submit"?>"> Submit </button>

                      </div>
                  </li>
              <?php  endfor ?>

              </ul>
            </div>
            <div class="full-width" id='submit-container'>
                <textarea id="post-input" placeholder="Enter post..."></textarea>
                <button id="submit">Submit</button>
              </div>
          </div>
        </div>

        <div class="right-sidebar">
          <h2>In this room</h2>
          <ul>
            <li class="user">
              <img src="http://placehold.it/50/50">
              <p>Liam O'Connor</p>
            </li>
          </ul>
        </div>

        <!-- Trigger the modal with a button -->


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Login to Your Account</h1><br>
          <form>
          <input type="text" name="user" placeholder="Username">
          <input type="password" name="pass" placeholder="Password">
          <input type="submit" name="login" class="login loginmodal-submit" value="Login">
          </form>
          
          <div class="login-help">
          <a href="#">Register</a> - <a href="#">Forgot Password</a>
          </div>
        </div>
      </div>
      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="index.js"></script>
    </body>
</html>