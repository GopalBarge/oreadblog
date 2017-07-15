    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Explore Topics on o'read</title>

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

        <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-explore.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/oread-home.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?=ROOT_URL?>static/oread_files/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
        <script type="text/javascript" src="<?=ROOT_URL?>static/oread_files/jquery-3.1.1.js"></script>   



    </head>

    <body>


        <div class="container">
            <?php include('inc/header.php');?>




            <section>   


                <div class="tabcontent">

                    <h2 class="highlights">Hey, What interests you?</h2>
                    <p class="tagline">Pick your favorite topics to follow.</p>

                    <ul id="category-container">
                       <?php foreach ($this->categories as $key => $value) { ?>
                       <li><a href='/oreadblog/category/?id=<?=$value->term_id?>'><?=$value->name?></a></li>                                 
                       <?php   }
                       ?>
                   </ul>
                   </div> 
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
