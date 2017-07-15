               
          
<!--All scripts here-->
            
            
            
                <!--login modal-->
                                <script>
                        // Get the modal
                        var modal = document.getElementById('myModal');
                        
                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");
                        
                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];
                        
                        // When the user clicks on the button, open the modal 
                        btn.onclick = function() {
                            modal.style.display = "block";
                        }
                        
                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modal.style.display = "none";
                        }
                        
                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                        
                        </script>
        
        <!--login modal-->
        
        
        <!--category tabs script-->    
             
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
        
        
        <!--category tabs script-->
        
        
        <!--scroll fixed div-->
            <script>
                var fixmeTop = $('.tab').offset().top;
                    $(window).scroll(function() {
                        var currentScroll = $(window).scrollTop();
                        if (currentScroll >= fixmeTop) {
                            $('.tab').css({
                                position: 'fixed',
                                top: '72px',
                                left: '0'
                            });
                        } else {
                            $('.tab').css({
                                position: 'static'
                            });
                        }
                    });
            </script>
        <!--scroll fixed div-->
        
        
        
        

<!--All scripts here-->
        </div>
    </body>
</html>
