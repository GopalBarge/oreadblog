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
      
      
    </head>

    <body>


      <div class="container">
        <?php include('inc/header.php');?>
        
        <section> 
         
          <div class="tabcontent">
            <form method="post" action="<?=$this->oPost->post_name?>">
              <input type="hidden" name="edit_submit" value="<?=$this->oPost->ID?>">

              <label>
                <input id="heading_box" type="text" name="title"  placeholder="Write a title or paste a link of website."  value="<?=$this->oPost->post_title?>" />
                <P >Post Permalink: <?=$this->oPost->post_name?>      
                </P>
              </label>
              
              
              <div class="select-box">
                
                <div class="select-style">
                  <select name="category" >
                    <option value="" disabled selected>Choose category</option>
                    
                    <optgroup label="Featured Categories">
                      <option value="1" <?php if($this->oPost->category_id == '1') echo 'selected="selected"'; ?> >Education</option>
                      <option value="2" <?php if($this->oPost->category_id == '2') echo 'selected="selected"'; ?>>Foods</option>
                      <option value="3" <?php if($this->oPost->category_id == '3') echo 'selected="selected"'; ?>>Travels</option>
                      <option value="4" <?php if($this->oPost->category_id == '4') echo 'selected="selected"'; ?>>Products</option>
                      <option value="5" <?php if($this->oPost->category_id == '5') echo 'selected="selected"'; ?>>Technology</option>
                      <option value="6" <?php if($this->oPost->category_id == '6') echo 'selected="selected"'; ?>>News</option>
                    </optgroup>
                    
                    <option value="7" <?php if($this->oPost->category_id == '7') echo 'selected="selected"'; ?>>Mechanical Engineering</option>
                    <option value="8" <?php if($this->oPost->category_id == '8') echo 'selected="selected"'; ?>>Medical Science</option>
                    <option value="9" <?php if($this->oPost->category_id == '9') echo 'selected="selected"'; ?>>Nanotechnology</option>
                    <option value="10" <?php if($this->oPost->category_id == '10') echo 'selected="selected"'; ?>>Engineering Thermodynamics</option>
                    <option value="11" <?php if($this->oPost->category_id == '11') echo 'selected="selected"'; ?>>Human Anatomy</option>
                    <option value="12" <?php if($this->oPost->category_id == '12') echo 'selected="selected"'; ?>>Engineering Physics</option>
                    <option value="13" <?php if($this->oPost->category_id == '13') echo 'selected="selected"'; ?>>Neuroscience</option>
                    <option value="14" <?php if($this->oPost->category_id == '14') echo 'selected="selected"'; ?>>Renewable Energy Engineering</option>
                    
                  </select>
                </div>
                
              </div>
              
                     <!--  <div class="fileUpload btn btn-primary">
                            <span>Insert Media</span>
                            <input type="file" class="upload" />
                          </div> -->
                          
                          <textarea name="body" id="topic_box"><?=$this->oPost->post_content?></textarea>

                          <button class="post-btn" type="submit" value="publish" name="post_status">Post Your Interest</button>
                          <button class="save-btn" type="submit" value="draft" name="post_status" >Save as Draft</button>
                          
                        </form>
                      </div>
                      
                      <p></p>
                    </section>

<?php if(isset($_SESSION["is_logged"])) {?> 
    <a href="<?=ROOT_REL_PATH?>blog/add" class="write"><p>Write Now</p></a>
    <?php } 
    ?>

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
