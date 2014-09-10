<?php
get_header();
include_once ('../config.php');
include_once('../global_site.php');
$sitelink = "http://cardguys.com/";
global $row_config, $card_type;

   

?>



        <div class="middle-container else">
        </div>
	<div class="content">
	
		<div class="menuleft">


			<div class="creditcardbytype">
				
				<div class="textTitlemenu <?=$extraie5?>"><span class=text_span>Credit Cards By Type</span></div>
                 <?

                   
                   include ('../module/menu/types_menu.php');

                ?>
		</div>
		
		<div class="creditcardbytype issuer">

                                <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class=text_span>
                                        <?
                                        if ($module == 'blog') {
                                            echo "Advice By Date";
                                        } else {
                                            echo "Credit Cards By Issuer";
                                        }
                                        ?></span>
                                </div>
                                <?
                             
					include ('../module/menu/banks_menu.php');
                            
                              
                                ?>



                            </div>
	                     <div class="creditcardbytype issuer">

                                <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class=text_span>
                                        <?

                                        echo "Cards by Credit Quality";
                                        
                                        ?></span>
                                </div>
                                <?
                        
                                    include ('../module/menu/quality.php');
                                
                                ?>



                            </div>
			    <div class="creditcardbytype issuer">

                                <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class=text_span>
                                        <?
                                        if ($module == 'blog') {
                                            echo "Advice By Date";
                                        } else {
                                            echo "Credit Cards By Issuer";
                                        }
                                        ?></span>
                                </div>
                                <?
                             
					include ('../module/menu/banks_menu.php');
                            
                              
                                ?>



                            </div>
			     <div class="creditcardbytype issuer last ">

                            <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class="text_span" >Other Resources</span></div>
                            <div class="content-menu <?= $extraie4 ?>">
                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="glossary">Glossary Of Terms  </a>
                                    </div>
                                </div>
                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="faq">FAQ - Get Answers!  </a>
                                    </div>
                                </div>
                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="advice-center">Advice Center  </a>
                                    </div>
                                </div>

                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="blog">Credit Card Blog </a>
                                    </div>
                                </div>

                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="free-credit-reports">Free Credit Reports </a>
                                    </div>
                                </div>

                            </div>


                        </div>
	

		
			

</div>

<div class="imagebottom">
           

			</div>

		

		

			<div class="noidung-card" style="margin-top:-19px !important;">
				
			
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-body else">
                                    <img src="<?php echo $sitelink; ?>/images/ajax-loader.gif" >
                                        <div>Loading Credit Card</div>
                                </div>
                            </div>
                            
                            <form id="cardfinder" method=get action="<?= $sitelink ?>/search" />
                            <div class="card_finder else">

                                <div class="steps_head else">Credit Card Finder</div>
                                <span class="error-offer hide else">Best card offer is required</span>
                                <span class="error-credit hide else">This credit rating is required</span>

                                <div class="styled-select else consumer">
                                    <img src="<?php echo $sitelink; ?>/images/down-arrow.png"/>
                                    <select name=credit_as>

                                        <option value=1">Consumer use </option>
                                        <option value=2>Student use  </option>
                                        <option value=3>Business use </option>

                                    </select>
                                </div>


                                
                                <div class="styled-select else credit">
                                    <img src="<?php echo $sitelink; ?>/images/down-arrow.png"/>
                                    <select name=credit_type id="credit_type">
                                        <option value=0>What is your credit like?</option>
                                        <option value=1>Poor</option>
                                        <option value=2>Fair </option>
                                        <option value=3>Good</option>
                                        <option value=4>Excellent </option>
                                        <option value=5>Not sure</option>

                                    </select>
                                </div>

                                
                                <div class="styled-select type-card else offer">
                                    <img src="<?php echo $sitelink; ?>/images/down-arrow.png"/>
                                    <select name=credit_cat id="credit_cat">

                                        <option value=0>Best Credit Card Offers</option>
                                        <?php
                                        include ('module/card-details/type_cards.php');
                                        echo $hold_typesx;
                                        ?>
                                    </select>
                                </div>

                                <div class="steps_search else">
                                    <button class="search_button else">Search</button>
                                </div>

                            </div>
                            </form>

			
			<?php $the_query = new WP_Query('showposts=2'); ?>
		
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
		
			    <?php //$date = the_time('l, F jS, Y'); ?>
			    <?php $author = get_the_author(); ?>
			    <?php
			    $counter++;
			    $categories = get_the_category();
			    $separator = ' ,';
			    $output = '';
			    if ($categories) {
				foreach ($categories as $category) {
				    $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
				}
				//echo trim($output, $separator);
			    }
			    ?>
		
		
		
			    <div class="wordpress-post post<?php echo $counter; ?>">
		
		
				<div class="post-body">

				    <div class="blog">
		
					<div class="post-content-head">
					    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					    <div class="date">
						<?php $date = the_time(' F jS, Y'); ?>
					    </div>
					    	
						<div class="post-content-body">
						<?php the_excerpt(); ?> 
						
	
					</div>
					
					
					</div>
					<div class="left post-container">
					<?php
					if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
					    the_post_thumbnail(array(750, 450));  // Other resolutions
					}
					?>
					<br/>
					<br/>
					<a class="readmore "target="_blank" href="<?php the_permalink() ?>">
					<button class="applybtn"><span class="rdmoretxt">Read More</span> 
					    <img class="img-arrow readarrow" src="<?php echo $sitelink ?>/images/arrowbtn.png"></button>
					</a>
				    </div>

				    </div>
		
				    <br class="clear"/>
				</div>
			    </div>
		
			<?php endwhile; ?>

		
			</div>
			</div>
		

        
        
        
  <?php get_footer(); ?>