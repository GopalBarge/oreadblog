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
        <li><a href='#post'><span><?=$this->oProfileData->topics?></span>Topics</a></li>
        <li><a href='#followers' ><span><?=$this->oProfileData->followers?></span>Followers</a></li>
        <li><a href='#following' ><span><?=$this->oProfileData->following?></span>Following</a></li>
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
    <div id="followers" class="tabcontent">
							
                            <ul id="follower-container">
                            	
                                <li>
                                	  <div class="follower-info">
                                      
                                      	<a href="#" class="follower-img"><img src="oread_files/tom.jpg" class="avatar"/></a>
                               			<a href="#" id="follower"><p>Tom Cruise <span id="post-time">@tom_cruise01</span></p></a>
                                     </div>
                                      
                                      
                                      <a href="#" class="follow-btn-link"><div class="follow-btn">Follow</div></a>
                                    <div id="extra"></div>
                                	
                                </li>
                                <li>
                                	  <div class="follower-info">
                                      
                                      	<a href="#" class="follower-img"><img src="oread_files/robert01.jpg" class="avatar"/></a>
                               			<a href="#" id="follower"><p>Robert Downey Jr. <span id="post-time">@robert_downey</span></p></a>
                                     </div>
                                      
                                      
                                      <a href="#" class="follow-btn-link"><div class="follow-btn">Follow</div></a>
                                    <div id="extra"></div>
                                	
                                </li>
                                
   <!--follower container--></ul>
              </div>
              <div id="following" class="tabcontent">
							 <ul id="follower-container">
                             
                             <li>
                                	  <div class="follower-info">
                                      
                                      	<a href="#" class="follower-img"><img src="oread_files/downey.jpg" class="avatar"/></a>
                               			<a href="#" id="follower"><p>Robert Downey Jr. <span id="post-time">@robert_downey</span></p></a>
                                     </div>
                                      
                                      
                                      <a href="#" class="follow-btn-link"><div class="unfollow-btn">Unfollowing</div></a>
                                    <div id="unextra"></div>
                                	
                                </li>
                                <li>
                                	  <div class="follower-info">
                                      
                                      	<a href="#" class="follower-img"><img src="oread_files/tom.jpg" class="avatar"/></a>
                               			<a href="#" id="follower"><p>Tom Cruise <span id="post-time">@tom_cruise01</span></p></a>
                                     </div>
                                      
                                      
                                      <a href="#" class="follow-btn-link"><div class="unfollow-btn">Unfollowing</div></a>
                                    <div id="unextra"></div>
                                	
                                </li>
                                
                                
   <!--following container--></ul>
      				</div>







</section>
<?php if(isset($_SESSION["is_logged"])) {?> 
    <a href="<?=ROOT_REL_PATH?>blog/add" class="write"><p>Write Now</p></a>
    <?php } 
    ?>

 <script>
                    
						$('.follower-img').each(function(){
							var imageWidth = $(this).find('img').width();
							var imageheight = $(this).find('img'). height();
							if(imageWidth > imageheight){
								$(this).addClass('landscape');
							}else{
								$(this).addClass('potrait');
						   }
						})
                    
</script>

<script>
						$('ul.tab').each(function(){
              
						  // For each set of tabs, we want to keep track of
						  // which tab is active and its associated content
						  var $active, $content, $links = $(this).find('a');
						
						  // If the location.hash matches one of the links, use that as the active tab.
						  // If no match is found, use the first link as the initial active tab.
						  $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
						  $active.addClass('active');
						
						  $content = $($active[0].hash);
						
						  // Hide the remaining content
						  $links.not($active).each(function () {
							$(this.hash).hide();
						  });
						
						  // Bind the click event handler
						  $(this).on('click', 'a', function(e){
							// Make the old tab inactive.
							$active.removeClass('active');
							$content.hide();
						
							// Update the variables with the new link and content
							$active = $(this);
							$content = $(this.hash);
						
							// Make the tab active.
							$active.addClass('active');
							$content.show();
						
							// Prevent the anchor's default click action
							e.preventDefault();
						  });
						});
        
        
</script>
<script>
                                	$('.follow-btn').click(function() {
										var s = $(this);
										$('#extra').slideToggle('fast', function(){
											s.html(s.text() == 'Follow' ? 'Unfollow' : 'Follow');
											 $(this).css('background-color', '#FF2125'); // green color
										});
										return false;
									});
									
									$(".follow-btn").click(function () {
									   $(this).toggleClass("red");
									});
											
									<!--following n unfollowing	-->	
											
								   $('.unfollow-btn').click(function() {
										var s = $(this);
										$('#unextra').slideToggle('fast', function(){
											s.html(s.text() == 'Following' ? 'Unfollowing' : 'Following');
											 $(this).css('background-color', '#FFF'); // green color
										});
										return false;
									});
									
									$(".unfollow-btn").click(function () {
									   $(this).toggleClass("white");
									});							
									
                                </script>
                               
         <!--toggle follow n color change-->
         
          <!--Drop down menu-->
         
        							 <script>
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

                     </div>
                   </body>
                   </html>
