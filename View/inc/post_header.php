
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

<!-- <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-style.css" type="text/css" media="all">
<link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">

			<script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>
            <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

 -->
<link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-post.css" type="text/css" media="all">
<link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
<script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>  
<!--login tabs script-->    
                 

                                
            
                                <!--login tabs script-->  
                                

<!--All scripts here-->

       
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
                                      <li><a href='/oreadblog'><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                      <li><a href='explore.html'><i class="fa fa-align-left" aria-hidden="true"></i></a></li>
                                      <li><a onclick="myFunction()"><i class="fa fa-bell dropbtn" aria-hidden="true"></i></a></li>
                                      <li><a href="profile.html"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                      
                                      
                                      <ul id="myDropdown" class="drop-list">
                                                <h2>Hey, Who did you notice?</h2>
                                                <li id="notification"><a href="">Lorem ispsum dolor sit amet.</a></li>
                                            
                                            </ul>
                            </ul>
                          
                          </nav>  
                       
          </header>

