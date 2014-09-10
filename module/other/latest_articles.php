 <? if (!defined('INCLUDED')) {
    die("Access Denied");
}
?>



<div id=def_credit class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top front-top-title"> Latest Articles </span></div>
<div class="content-card-text-infomation <?= $extraie10 ?>">
    <div class="content-apply-text">

        <?php
        wp_reset_query();

        //query_posts( array( 'showposts'=>1,'paged' => $paged ) );
        //kriesi_pagination('',2);
        wp_reset_query();
        query_posts('showposts=3');
        while (have_posts()) : the_post();
            ?>

            <div class="post-wrapper_main" style="float:left;">

                <div style="float:left;margin-top:7px;width:155px;margin-left:5px;">
    <?
    the_post_thumbnail();
    set_post_thumbnail_size( 130, 110 );
    ?> 
                </div>						

                <div style="float:left;width: 500px; clear: right; margin-top: 2px; margin-bottom: 15px;  margin-left: 5px;position: relative;top:7px;">
                    <span class="titles"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>			


                    <div class="post">
    <?php
    //the_content(__('Read Full Article &raquo;')); 
    //the_content('Read Full Article &raquo;',true); 
    the_excerpt(__('(more...)'));
    //the_content(__('(more�)'));
    //the_content(__('Continue reading', 'example'));
    ?>
                    </div>





                </div>

            </div>


<? endwhile; ?>

    </div>
</div>


