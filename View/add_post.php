    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Write your topics, stories, short notes on o'read</title>

  <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>
      <link rel="shortcut icon" type="image/png" href="<?=ROOT_URL?>static/oread_files/favicon.png"/>
      
      
      <!--This page design and development by Grapps services grapps.knowledgeflow.in-->



  <!-- optimized here -->
  <meta name="description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
  <link rel="canonical" href="#">
  <meta property="og:locale" content="en">
  <meta property="og:type" content="website">
  <meta property="og:title" content="o'read - Knowledge flow">
  <meta property="og:description" content="o'read best educational website for student read, learn, share and comment your favorite educational topics.">
  <meta property="og:url" content="http://oread.knowledgeflow.in">

  <!-- optimized here -->

  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-write.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
  <script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>   
  								
  		<script type="text/javascript">
      
      /*function checkforUrl(){
        if(learnRegExp($("#heading_box").val())){

        }else{

        }
      }
    function learnRegExp(s) {    
      var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      return regexp.test(s);    
 }*/
      </script>

  </head>

  <body>


  <div class="container">



<?php include('inc/header.php');    ?>

        
  <section> 
  	    <div class="tabcontent">
               		<form method="post" action="add">
                  <input type="hidden" name="add_submit" value="true">

            	 		<label>
                        <input id="heading_box" type="text" name="title"  placeholder="Write a title or paste a link of website."   />
                      </label>
                      
  				<div class="select-box">
                      
                      <div class="select-style">
                          <select name="category">
                            <option value="" disabled selected>Choose category</option>
                            
                            <optgroup label="Featured Categories">
                                <option value="1">Education</option>
                                <option value="2">Foods</option>
                                <option value="3">Travels</option>
                                <option value="4">Products</option>
                                <option value="5">Technology</option>
                                <option value="6">News</option>
        					  </optgroup>
                            	
                            <option value="7">Mechanical Engineering</option>
                            <option value="8">Medical Science</option>
                            <option value="9">Nanotechnology</option>
                            <option value="10">Engineering Thermodynamics</option>
                            <option value="11">Human Anatomy</option>
                            <option value="12">Engineering Physics</option>
                            <option value="13">Neuroscience</option>
                            <option value="14">Renewable Energy Engineering</option>
                             
                          </select>
                      </div>
                      
                    </div>
                    
                    <div class="fileUpload btn btn-primary">
                          <span>Insert Media</span>
                          <input type="file" class="upload" />
                      </div>
                      
                      <textarea name="body" id="topic_box">Write topic, story, news, short notes (optional for direct from website).</textarea>
                      <button class="post-btn" type="submit" value="Publish" name="post_status">Post Your Interest</button>
                      <button class="save-btn" type="submit" value="draft" name="post_status" >Save as Draft</button>
                     
                      
      </form>
      </div>
         
         <p></p>
  </section>


  		<!--<a href="#" class="write"><p>Post Topic</p></a>-->





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

  </div>
  </body>
  </html>
