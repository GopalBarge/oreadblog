<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Learning Topics on o'read</title>

  <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>
  <link rel="shortcut icon" type="image/png" href="http://oread.knowledgeflow.in/oread_files/favicon.png"/>

  <!-- optimized here -->
  <meta name="description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
  <link rel="canonical" href="#">
  <meta property="og:locale" content="en">
  <meta property="og:type" content="website">
  <meta property="og:title" content="o'read - Knowledge flow">
  <meta property="og:description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
  <meta property="og:url" content="http://oread.knowledgeflow.in">

  <!-- optimized here -->

  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-home.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
  <script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>   

 <script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-post.js"></script>  

</head>

<body>


  <div class="container">

    <?php 
    require 'inc/header.php';
  
  ?>


  <section> 
    <div class="tabcontent">

      <h2 class="highlights">Feutured Stories</h2>
      <p class="tagline">Interests from everything you follow.</p>         		
      <ul id="post-container" class="cols">

        <?php if (empty($this->oPosts)): ?>
          <p class="bold">There is no Blog Post.</p>
          <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blog&amp;a=add'" class="bold">No Blog Post!</button></p>
        <?php else: ?>

          <?php foreach ($this->oPosts as $oPost): 
          require 'inc/post_summary.php';
          endforeach ?>
        </ul>
      </div>
    </section>
    <?php if(isset($_SESSION["is_logged"])) {?> 
    <a href="<?=ROOT_REL_PATH?>blog/add" class="write"><p>Write Now</p></a>
    <?php } 
    ?>

  <?php endif ?>

</div>
</body>
</html>