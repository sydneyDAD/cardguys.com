   <div id="sidebar-wrapper">
            
                <div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>                 
              
                
 
 <div class="b_archives">
 <h3 >BLOG ARCHIVE</h3>
<?php wp_get_archives('type=monthly&&format=custom&before=<div class=b_item>&after=</div>'); ?>
</div>
<?php 

//wpp_get_mostpopular("header='<div class=\"popular_p\"><h3>POPULAR POSTS</h3>'&range=weekly&order_by=comments&limit=5"); ?>
 
			               	<?php endif; ?>
                
                </div>
            
            </div>
        
        