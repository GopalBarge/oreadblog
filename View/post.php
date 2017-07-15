<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Write your topics, stories, short notes, news on o'read</title>

  <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>
  <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>

  <!-- optimized here -->
  <meta name="description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
  
  <meta property="og:locale" content="en">
  <meta property="og:type" content="website">
  <meta property="og:title" content="o'read - Knowledge flow">
  <meta property="og:description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
  <meta property="og:url" content="http://oread.knowledgeflow.in">

  <!-- optimized here -->
  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-home.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-style.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-post.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
  <script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>   
<script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-post.js"></script> 


</head>

<body>


  <div class="container">
    <?php include('inc/header.php');?>
    <section> 

      <div class="content">


        <!--  User info and post time-->

        <div class="user-info">                
         <a href="#" id="post-user-img"><img src="<?=ROOT_REL_PATH?>static/oread_files/scarllet.jpg" /></a>
         <a href="#" id="post-user"><p><?=$this->oPost->user_name;?> <span id="post-time"><?=$this->oPost->post_elapsed_time;?></span></p></a>
       </div>

       <!--  User info and post time-->

       <div class="category-info">
        <a href="#" id="category"><?=$this->oPost->cat_name;?></a>
      </div>   



      <div class="post-content">

        <h2><?=($this->oPost->post_title)?></h2>

        <img src="<?=$this->oPost->image_url?>"/> 

        <p><?=nl2br(($this->oPost->post_content))?></p>

      </div>

<div class="social-icon">

    <?php if(isset($_SESSION['is_logged'])){?>
   

    <a id="like_a_<?=$this->oPost->ID;?>">
    <span  id="like_<?=$this->oPost->ID;?>" 
    class="fa fa-heart fa-lg" 
    aria-hidden="true" <?php echo $this->oPost->likedPost == 1 ?"style=color:#F00;":""; ?>' 
    onclick="addLikes('<?=ROOT_REL_PATH?>blog/like',<?=$this->oPost->ID;?>,'<?php echo $this->oPost->likedPost == 1 ?"unlike":"like"; ?>','post');"><?=$this->oPost->like_count;?></span>
    </a>


    

  
   <a id="comment_<?=$this->oPost->ID;?>" href="<?=ROOT_REL_PATH?>blog/post/<?=($this->oPost->post_name)?>#comment-box" id="comments"><span class="fa fa-comment fa-lg" aria-hidden="true" <?php echo $this->oPost->postCommented == 1 ?"style=color:#F00;":""; ?>' ></span><?=$this->oPost->comment_count;?></a>

    <a  id="share_$this->oPost->ID"><span class="fa fa-share-alt fa-lg" aria-hidden="true"></span></a>
    <?php } 

    else { ?>
    <a onclick="$('#myBtn').click();" id="likes"><span class="fa fa-heart fa-lg" aria-hidden="true"></span>0</a>
    <a onclick="$('#myBtn').click();" id="comments"><span class="fa fa-comment fa-lg" aria-hidden="true"></span><?=$this->oPost->comment_count;?></a>
    <a onclick="$('#myBtn').click();" id="share"><span class="fa fa-share-alt fa-lg" aria-hidden="true"></span></a>
    <?php }  ?>        
</div>



    </div>
    <ul class="comments">

      <!--comments-->
      <form action="" method="post">

       <input type="hidden" name="postId" value="<?=($this->oPost->ID)?>">

       <input id="comment-box" type="text"  name="comment" placeholder="Add a comment" />
       <?php if(isset($_SESSION['is_logged'])){?>
       <input class="post-comment"  name="add_comment" type="button"  onclick="addComment(<?=($this->oPost->ID)?>);" value="Add" />
       <?php } else { ?>
       <input class="post-comment" id="post-comment" name="add_comment" type="button"  onclick="$('#myBtn').click();" value="Add" />
       <?php }  ?>
     </form>
     <!--comments end-->
   </ul>
   <ul class="comments" id="comments-ul">
    <?php foreach ($this->oComments as $oComment): ?>
      <li>
       <a href="#" id="comment-user-img"><img src="<?=ROOT_REL_PATH?>static/oread_files/scarllet.jpg" />
         <p id="comment-user"><?=$oComment->user_name?><span id="comment-time"><?=$oComment->comment_elapsed_time?></span></p></a>
         <p id="comment">
          <?=$oComment->comment_content?>
        </p>

      </li>
    <?php endforeach ?> 
  </ul>
</section>


<!--All scripts here-->


<!--Drop down menu-->

<script>
  function addComment(postId){
    $.ajax({
      url: '',
      type: 'post',
      data: {'add_comment': 'Add', 'postId': postId, 'comment':$("#comment-box").val()},
      datatype: 'html',
      success: function(rsp){
       var commLi = '<li><a href="#" id="comment-user-img"><img src="<?=ROOT_REL_PATH?>static/oread_files/scarllet.jpg" /><p id="comment-user"><?=$_SESSION['fullname']?><span id="comment-time">Posted few seconds ago</span></p></a><p id="comment">'+$("#comment-box").val()+'</p></li>';
       $("#comments-ul").prepend(commLi);
       $("#comment-box").val('');
     }
   });
  }

                                              /* When the user clicks on the button, 
                                              toggle between hiding and showing the dropdown content */
                                              function myFunction() {
                                                document.getElementById("myDropdown").classList.toggle("show");
                                              }

                          // Close the dropdown menu if the user clicks outside of it
                          window.onclick = function(event) {
                            if (!event.target.matches('.dropbtn')) {

                              var dropdowns = document.getElementsByClassName("drop-list");
                              var i;
                              for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {
                                  openDropdown.classList.remove('show');
                                }
                              }
                            }
                          }   
                        </script>
                        <!--Drop down menu-->


                        <!--All scripts here-->

                      
 <?php if(isset($_SESSION["is_logged"])) {?> 
    <a href="<?=ROOT_REL_PATH?>blog/add" class="write"><p>Write Now</p></a>
    <?php } 
    ?>


<?php include('inc/footer.php');?>