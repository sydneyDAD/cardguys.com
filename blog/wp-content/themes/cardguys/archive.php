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
        
<!-- start content -->
<div class=b_title><?php the_time('F') ?>, <?php the_time('Y') ?> BLOG ARCHIVES</div>
<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

		
				<div class="post-wrapper">

<div class="date">
						<span class="month"><?php the_time('M') ?></span>
						<span class="day"><?php the_time('j') ?></span>
					
			<span class=day><h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3></span>
</div>

			<div class="post">

			

			</div>
			<div style="clear: both;"></div>
			Posted by: <?php the_author_posts_link(); ?> | 
					 <?php the_category(', ') ?> | 
					 <?php the_time('m/jS, Y') ?><strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?> 
					<?php comments_popup_link('No Comments &raquo;', '1 Comment &raquo;', '% Comments &raquo;'); ?></div>
			
			


			<?php endwhile; ?>

			   <p class="pagination"><?php next_posts_link('&laquo; Previous Entries') ?> <?php previous_posts_link('Next Entries &raquo;') ?></p>

			<?php else : ?>

			<h2 align="center">Not Found</h2>

			<p align="center">Sorry, but you are looking for something that isn't here.</p>

			<?php endif; ?>
			

<!--end content -->
				
			</div>



<?php get_footer(); ?>