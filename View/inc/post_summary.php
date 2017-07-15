 <li>
    <!--	User info and post time-->

    <div class="user-info">                
     <a  id="post-user-img"><img src="<?=ROOT_REL_PATH?>static/oread_files/scarllet.jpg" /></a>
     <a  id="post-user" href="<?=ROOT_REL_PATH?>user/<?=$oPost->user_login;?>"><p><?=$oPost->user_name;?><span id="post-time"><?=$oPost->post_elapsed_time;?></span></p></a>
 </div>

 <!--	User info and post time-->

 <div class="category-info">
    <a href="<?=ROOT_REL_PATH?>category/?id=<?=($oPost->cat_id)?>" id="category"><?=$oPost->cat_name;?></a>
</div>   


<div class="post-content">
   <?php if($oPost->post_type == 'link') { ?>
<a target='_SELF' href="<?=($oPost->guide)?>" id="post-content">
        <h2><?=nl2br(mb_strimwidth($oPost->post_title, 0, 100, '...'))?></h2>
        <div class="image-wrap" id="wrapper">
           <?php if($oPost->image_url){?>
<img src="<?=$oPost->image_url?>"/>
           <?php }?>
           
       </div>
       <p><?=((mb_strimwidth($oPost->post_content, 0, 150, '...')))?></p>
   </a>
   <?php } else { ?>

    <a href="<?=ROOT_REL_PATH?>blog/post/<?=($oPost->post_name)?>" id="post-content">
        <h2><?=nl2br(mb_strimwidth($oPost->post_title, 0, 100, '...'))?></h2>
        <!-- <div class="image-wrap" id="wrapper">
           <img src="<?=ROOT_REL_PATH?>static/oread_files/img/female-reproductive.png"/>
       </div> -->
       <p><?=nl2br(htmlspecialchars(mb_strimwidth($oPost->post_content, 0, 150, '...')))?></p>
   </a>
<?php } ?>
</div>


<div class="social-icon">

    <?php if(isset($_SESSION['is_logged'])){?>
   

    <a id="like_a_<?=$oPost->ID;?>">
    <span  id="like_<?=$oPost->ID;?>" 
    class="fa fa-heart fa-lg" 
    aria-hidden="true" <?php echo $oPost->likedPost == 1 ?"style=color:#F00;":""; ?>' 
    onclick="addLikes('<?=ROOT_REL_PATH?>blog/like',<?=$oPost->ID;?>,'<?php echo $oPost->likedPost == 1 ?"unlike":"like"; ?>','post');"></span><span id="like_span_<?=$oPost->ID;?>"><?=$oPost->like_count;?></span>
    </a>


    

  
   <a id="comment_<?=$oPost->ID;?>" href="<?=ROOT_REL_PATH?>blog/post/<?=($oPost->post_name)?>#comment-box" id="comments"><span class="fa fa-comment fa-lg" aria-hidden="true" <?php echo $oPost->postCommented == 1 ?"style=color:#F00;":""; ?>' ></span><?=$oPost->comment_count;?></a>

    <a  id="share_$oPost->ID"><span class="fa fa-share-alt fa-lg" aria-hidden="true"></span></a>
    <?php } 

    else { ?>
    <a onclick="$('#myBtn').click();" id="likes"><span class="fa fa-heart fa-lg" aria-hidden="true"></span>0</a>
    <a onclick="$('#myBtn').click();" id="comments"><span class="fa fa-comment fa-lg" aria-hidden="true"></span><?=$oPost->comment_count;?></a>
    <a onclick="$('#myBtn').click();" id="share"><span class="fa fa-share-alt fa-lg" aria-hidden="true"></span></a>
    <?php }  ?>        
</div>



</li>