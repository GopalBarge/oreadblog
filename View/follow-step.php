    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Follow Steps on o'read</title>

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

    <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-steps.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">

    			<script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?=ROOT_URL?>static/js/oread-post.js"></script> 
    <script type="text/javascript">
    var values = []; // declare it outside document.ready
        $( document ).ready(function() {  
            $('.category').click(function(i) {
                 if(values.indexOf($(this).attr("id")) < 0){
                 values.push($(this).attr("id")); // add value to array
                $(this).css({'color': '#FFF',
                        'background': '#FF2125',
                        'border': '1px solid #FF2125'});
                 $("#user_cat").val(values);
             }else{
                $(this).css({'color': '#333',
                        'background': '',
                        'border': ''});
              var index  =  values.indexOf($(this).attr("id"));
              values.splice(index,1);
               $("#user_cat").val(values);
             }

    var butn= '<input type="submit" name="next" id="next" value="GO" disabled>';
    if(values.length<5)
    {
    var num=values.length;0
    var rem=5-num;
        var msg="You have added " +num+ " topics, add "+rem+" more to complete this step.";
        $("#cat_count").text(msg);
         $("#cat_count").append(butn);
     }
     else{
        $("#cat_count").text('');
        
        $("#cat_count").append(butn);
        $("#next").removeAttr("disabled");
     }
                 
            }); 
        }); 

    </script>                          


    </head>

    <body>


    <div class="container">


    			<header>
                        <a href="<?=ROOT_URL?>"><img src="<?=ROOT_URL?>static/oread_files/oread-logo.svg" alt="oread Logo" width="60" class="logo"/></a>
                        
                                <label>
                                  <input id="search" type="text" placeholder="Search" />
                                </label>
                                    
                    <a href="<?=ROOT_URL?>profile" class="user-btn"><i class="fa fa-user" aria-hidden="true"></i></a>         
                    
                </header>         
                	
    <section>

     <div class="tabcontent">
                         <h2>1 more step! Follow 5 or more interests to personalize your o'read</h2>
                 		
                    			<ul id="category-container">
                                
                                
                                <?php if (empty($this->categories)): ?>
        <p class="bold">There is no record.</p>    
    <?php else: ?>

        <?php foreach ($this->categories as $category): ?>  
                                
                                		<li><a class="category"  id="<?=$category->term_id;?>"><?=$category->name;?></a></li>
                                             
                                   
                                    <?php endforeach ?>
                                    <?php endif ?>
                                     
                                </ul>
    					</div>
    </section>


    <footer>
    		<form action="<?=ROOT_REL_PATH?>user/follow_step" method="post">
          <input type="hidden" name="user_cat" id="user_cat">  
           <p id='cat_count'><input type="submit" name="next" id="next" value="NEXT" disabled="disabled">   
            </form>
           

            </p>
    	
    </footer>





    <!--All scripts here-->
    			
    	
    <!--All scripts here-->

    </div>
    </body>
    </html>
