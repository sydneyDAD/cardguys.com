<?php
include ('../config.php');
$ok_to_run=true;
include ('../global_site.php');
?>

<!-- footer content -->
      <!-- footer content -->
                    <div style="clear:both"></div>
                </div>
        
                <div class="footter">

                    <div class="footterContent">
                        <div class="footterTopContent">
                            <? include('../module/menu/bottom_list_cards_type.php') ?>

                        </div>
                        <div style="clear: both;"></div>














                    </div>
                    <div class="copyright-container">
                        <div class="inner-copyright-container">
                            <div class="left">
                                Copyright &copy; 2014 <b class="bold">CardGuys</b>  |  All Rights Reserved

                            </div>
                            <div class="right">

                                <div class="addthis_toolbox addthis_default_style ">

                                    <div class="keep">Keep in touch </div> 
                                    <a class="addthis_button_facebook">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_facebook.png"></img>
                                    </a>

                                    <a class="addthis_button_twitter">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_twitter.png"></img>
                                    </a>

             
                                    <!--                                    <a class="addthis_button_email"></a>-->
                                    <a class="addthis_button_google">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_googleplus.png"></img>
                                    </a>
                                    <!--                                    <a href="http://www.addthis.com/bookmark.php?v=250&amp;username=" class="addthis_button_compact"></a>
                                                                        <a class="addthis_counter addthis_bubble_style"></a>-->
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_clickback": true};</script>
                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username="></script>
                                <!-- AddThis Button END -->

                            </div>
                        </div>
                    </div>
                </div>




            </div>


            <!-- end footer content -->
<!-- end footer content -->

	</div>


	




</div>

               
           <script language="JavaScript1.2" type="text/javascript">
           function addbookmark(url, title)
            {
            if (!url) url = location.href;
            if (!title) title = document.title;
            //Gecko
            if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function")) window.sidebar.addPanel ("Home Page", "http://www.cardguys.com/", "");
            //IE4+
            else if (typeof window.external == "object") window.external.AddFavorite("http://www.cardguys.com/", "Home Page");
            //Opera7+
            else if (window.opera && document.createElement)
            {
            var a = document.createElement('A');
            if (!a) return false; //IF Opera 6
            a.setAttribute('rel','sidebar');
            a.setAttribute('href',url);
            a.setAttribute('title',title);
            a.click();
            }
            else return false;
            return true;
            }
        </script>
 <?php
		echo $_SESSION['trackerx'];
    ?>
    </script -->
<?php wp_footer(); ?> 
</body>
</html>