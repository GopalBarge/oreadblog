<?php if(isset($_SESSION['is_logged'])){?>

                         <nav>
                          
                            <ul>
                                      <li><a href='<?=ROOT_REL_PATH?>home'><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                      <li><a href='<?=ROOT_REL_PATH?>explore'><i class="fa fa-align-left" aria-hidden="true"></i></a></li>
                                      <li><a onclick="myFunction()"><i class="fa fa-bell dropbtn" aria-hidden="true"></i></a></li>
                                      <li><a href="<?=ROOT_REL_PATH?>profile"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                      <ul id="myDropdown" class="drop-list">
                                                <h2>Hey, Who did you notice?</h2>
                                                <li id="notification"><a href="">Lorem ispsum dolor sit amet.</a></li>
                                            
                                            </ul>
                            </ul>
                          
                          </nav>  
                          <?php } else{?>

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
                              
                                 <form  method="post">
                                      
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
                              
                                 <form  method="post">
                                      
                                        <input type="text" placeholder="Full Name" name="name" required>
                                        <input type="text" placeholder="Email" name="email" required>
                                        <input type="password" placeholder="Password" name="password" required>
                                            
                                        <button type="button" onclick="registerUser('<?=ROOT_REL_PATH?>user/register');">Sign In</button>
                                        <span class="psw"><a href="#">Forgot password?</a></span>
                                    </form>
                                                
                                                
                                            </div>                                        
                                     </div> 
                                   
                              </div>
                            <!-- Modal content -->
                          
                          </div>
                        <!-- Login Modal -->
                          <?php }?>
