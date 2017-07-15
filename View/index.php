  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=\oreadblog\Engine\Config::SITE_NAME?></title>

    <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>

    <!-- optimized here -->
    <meta name="description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
    <link rel="canonical" href="#">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:title" content="o'read - Knowledge flow">
    <meta property="og:description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
    <meta property="og:url" content="http://oread.knowledgeflow.in">

    <!-- optimized here -->

    <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-style.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">

    <script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-post.js"></script> 
    <script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-user.js"></script> 


    <script>
     $(function() {
      $( "#tabs-1" ).tabs();
    });
  </script>

</head>

<body>


  <div class="container">

   <header>
    <a href="/oreadblog"><img src="<?=ROOT_URL?>static/oread_files/oread-logo.svg" alt="oread Logo" width="60" class="logo"/></a>


    <label>
      <input id="search" type="text" placeholder="Search" />
    </label>




    <nav>

      <ul>

        <li><a id="myBtn">Sign In or Register</a></li>
        <li><a href='https://play.google.com/store/apps/details?id=com.knowledgeflow.oread' target="_blank"><i class="fa fa-mobile fa-3x" aria-hidden="true"></i></a></li>

      </ul>

    </nav>

    <!-- Login Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close"><img src="<?=ROOT_URL?>static/oread_files/close-button.png" width="20" /></span>


        <div id ="tabs-1">
          <ul>
            <li><a href = "#sigin">Sign In</a></li>
            <li><a href = "#register">Register</a></li>
          </ul>


          <!-- sign in form-->
          <div id = "sigin" class="login-tabcontent">


           <h2>Sign in to o'read</h2>

           <div class="social-option">
            <a href="#" class="facebook-login"><span class="fa fa-heart fa-facebook fa-lg" aria-hidden="true"></span></a>
            <a href="#" class="twitter-login"><span class="fa fa-heart fa-twitter fa-lg" aria-hidden="true"></span></a>
            <a href="#" class="google-login"><span class="fa fa-heart fa-google-plus fa-lg" aria-hidden="true"></span></a>

          </div>

          <p>or Login with Email</p>
<div style="color: red;" id="login-error"></div>
          <form action="<?=ROOT_REL_PATH?>user/login" method="post" id="LoginForm">

            <input type="text" placeholder="User Name or Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>

            <button type="submit">Sign In</button>
            <span class="psw"><a href="#">Forgot password?</a></span>
          </form>


          <!-- sign in form-->


        </div>

        <div id = "register" class="login-tabcontent">

         <h2>Join o'read</h2>
         <p>You need to be signed in to this action. Please create an account.</p>

         <div class="social-option">
          <a href="#" class="facebook-login"><span class="fa fa-heart fa-facebook fa-lg" aria-hidden="true"></span></a>
          <a href="#" class="twitter-login"><span class="fa fa-heart fa-twitter fa-lg" aria-hidden="true"></span></a>
          <a href="#" class="google-login"><span class="fa fa-heart fa-google-plus fa-lg" aria-hidden="true"></span></a>

        </div>

        <p>or Login with Email</p>
          <div style="color: red;" id="results"></div>
        <form  action="<?=ROOT_REL_PATH?>user/register" method="post" id="RegistrationForm" >

          <input type="text" placeholder="Full Name" name="name" required>
          <input type="email" placeholder="Email" name="email" required>
          <input type="password" placeholder="Password" name="password" required>

         <button type="submit">Sign In</button>
          <span class="psw"><a href="#">Forgot password?</a></span>
        </form>

<br />


      </div>                                        
    </div> 

  </div>
  <!-- Modal content -->

</div>




</header>   

<section>

  <div class="header-inner">

    <div class="layer">

      <h1>What you read today! <span style="color: #FF2125;">o'read</span></h1>

    </div>
    
  </div>

</section>


<section>
  <div class="tabcontent">             		
    <ul id="post-container" class="cols">

      <?php if (empty($this->oPosts)): ?>
        <p class="bold">There is no Blog Post.</p>    
      <?php else: ?>

        <?php foreach ($this->oPosts as $oPost): 
        require 'inc/post_summary.php';
        endforeach ?>
      </ul>
    </div>
  </section>


<?php endif ?>

<?php require 'inc/footer.php' ?>