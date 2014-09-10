Template Name: Archives Template
<?php
get_header(); 

global $row_config, $card_type;
?>

		<div class="content">
	
		<div class="menuleft">


			<div class="creditcardbytype">
				
				<div class="textTitlemenu <?=$extraie5?>"><span class=text_span>Credit Cards By Type</span></div>
                 <?

                   
                   include ('../module/menu/types_menu.php');

                ?>



				
			</div>
			
			<div class="creditcardbytype">
				
				<div class="textTitlemenu <?=$extraie5?>"><span class=text_span>BLOG NAVIGATIONs</span></div>
				<div class="content-menu <?=$extraie4?>">
					<?php get_sidebar(); ?>

				</div>

				
			</div>
			
			
			<div class="creditcardbytype" style="">
				
				<div class="textTitlemenu <?=$extraie5?>"><span class=text_span>LATEST TWEETS</span></div>
				<div class="content-menu <?=$extraie4?>" style="border-bottom:2px solid #a4a4a4;">
							<?php include_once '../module/twitter/recent.php'; ?>
							
						<div class=social_img>
<? 
if(isset($row_config['twitterid']))  
echo <<<TWEET
<div style=float:left;><a href=http://twitter.com/{$row_config[twitterid]} target=_blank><img src=images/twitter-follow.jpg align=left></a> </div>
TWEET;
?>
<? 
if(isset($row_config['facebookid']))  
echo <<<FACE
<div  style=float:left;><a href=http://www.facebook.com/profile.php?id={$row_config[facebookid]} target=_blank><img src=images/facebook-follow.jpg  align=left></a></div>
FACE;
?>
<br style='clear:both'>
<div  style=float:left;><a href=https://plus.google.com/u/0/b/118079864190061806300/118079864190061806300/posts target=_blank><img src=images/Google+1.jpg height=40px  align=left></a></div>
</div>
				
				</div>
			</div></div>

<div class="imagebottom">
           

			</div>

		

		

			<div class="noidung-card">
        

				
			</div>
			<div id="container_">
			<div id="content_" role="main">
					
					
					 <h1 class="entry-title"><?php the_title(); ?></h1>  
                           <?php the_post(); the_content();  ?>  
   
                           
   
                             <?php get_search_form(); ?>  
   
                     <h2>Archives by Month:</h2>  
                     <ul>  
                  <?php wp_get_archives(); ?>  
                      </ul>  
   
                 <h2>Archives by Subject:</h2>  
                 <ul>  
                   <?php wp_list_categories(); ?>  
                     </ul>  


</div></div>


<?php get_footer(); ?>