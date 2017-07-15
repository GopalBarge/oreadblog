<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Mechanical Engineering on o'read</title>

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
<link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-style.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-category.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
	<script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>   
	<script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-post.js"></script> 							


</head>

<body>


	<div class="container">


		<?php include('inc/header.php');?>

		<section>     
			
			<div class="category-profile">

				<h2 class="subcategory-name"><?=$this->oCatFollow->cat_name;?></h2>
				<span class="followers"><?=$this->oCatFollow->followers;?> Followers</span>

<?php if(isset($_SESSION['is_logged'])){?>
				<a href="#" class="follow-btn-link" >
					<div  class="follow-btn <?=$this->oCatFollow->isFollow == 1?'red':'' ?>" onclick="followCategory('<?=ROOT_REL_PATH?>blog/like','<?=$this->oCatFollow->category_id;?>','<?=$this->oCatFollow->isFollow == 1?'unfollow':'follow' ?>','category',<?=$this->oCatFollow->followers;?>);" ><?=$this->oCatFollow->isFollow == 1?'Unfollow':'Follow' ?></div>
				</a>
<?php } ?>
				<div id="extra"></div>
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

			<!--toggle follow n color change-->


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


												<!--All scripts here-->

									 <?php require 'inc/footer.php' ?>