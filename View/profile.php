  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Learning Topics on o'read</title>

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
    <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-profile.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
    <script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>   
<script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-post.js"></script> 


  </head>

  <body>


    <div class="container">

     <?php include('inc/header.php');?>


     <section>      



      <div class="user-profile">
<?php if(isset($_SESSION['id']) && $this->oProfileData->id == $_SESSION['id']){ ?>
<div class="setting">
        <a href="settings.html"><i class="fa fa-cog" aria-hidden="true"></i></a>
        <a href="<?=ROOT_REL_PATH?>user/logout"><i class="fa fa-power-off" aria-hidden="true"></i></a>
      </div>
<?php } ?>
       


      <div class="user-img">
       <img id="uploadimage" src="<?=ROOT_URL?>static/oread_files/scarllet.jpg" />
       <h2><?=$this->oProfileData->name?></h2>
       <p>@<?=$this->oProfileData->user_login?></p>

       <ul class="tab">
        <li><a ><span><?=$this->oProfileData->topics?></span>Topics</a></li>
        <li><a ><span><?=$this->oProfileData->followers?></span>Followers</a></li>
        <li><a ><span><?=$this->oProfileData->following?></span>Following</a></li>
      </ul> 

    </div>





  </div>


  <div id="post" class="tabcontent">

    <ul id="post-container" class="cols">


     <?php foreach ($this->oPosts as $oPost):     

     require 'inc/post_summary.php'; 
     endforeach ?>  
   </ul>
   <!--tab containger--></div>







</section>
<?php if(isset($_SESSION["is_logged"])) {?> 
    <a href="<?=ROOT_REL_PATH?>blog/add" class="write"><p>Write Now</p></a>
    <?php } 
    ?>

<!--All scripts here-->



<!--tabs script--> 


                     </div>
                   </body>
                   </html>
