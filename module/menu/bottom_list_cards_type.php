<?
if (!defined('INCLUDED')) {
    die("Access Denied");
}$_SESSION['lang'] = 1;
$types = $cards_type->lists('status = 1');
$ints = $cards_int->lists();
$banks = $cards_bank->lists('1');
$row = $menu->lists('child = 0 && (position = \'bottom\')');

$siteurl = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
preg_match("/[^\/]+$/", substr($siteurl, 0, -1), $matches);

$last_word = $matches[0];

if (strpos($siteurl,'blog') == 0) {
    require( 'blog/wp-load.php' ); 
}
//if($last_word!="blog"){
//   require( 'blog/wp-load.php' ); 
//}


?>




<div class="categoryCardFooter4">

    <div class="cardmenuFooter4">
        <div class="cardtypefooter">
            MAIN LINKS
        </div>
        <a href="<?= $sitelink?>/faq">FAQ</a>
        <a href="<?= $sitelink?>/glossary">Glossary</a>
        <a href="<?= $sitelink?>/advice-center">Advice Center</a>
        <a href="<?= $sitelink?>/calculator">Calculators</a>
        <a href="<?= $sitelink?>/best-credit-card-offers">Best Deals</a>
        <a href="<?= $sitelink?>/blog">Blog</a>
        <a href="<?= $sitelink?>/contact">Contact</a>

    </div>

</div>


<div class="categoryCardFooter">

    <div class="cardmenuFooter">
        <div class="cardtypefooter">
            Credit Type
        </div>
        <?
        $counter = 0;
        foreach ($types as $type) {
            $counter++;
            if ($counter < 8) {
                ?>
                <div class="cardtypefooter-content">
                    <a title="<?= $type->name ?>" href="<?=$sitelink."/".$type->alias ?>"><?= $type->name ?></a>
                </div>

                <?
            }
        }
        ?>

    </div>
</div>

<div class="categoryCardFooter Recent">
    <div class="cardmenuFooter1">
        <div class="cardtypefooter">
            Recent Post
        </div>
        <?php
        wp_reset_query();
        wp_reset_query();
        query_posts('showposts=2');
        $counter=0;
        while (have_posts()) : the_post();
        $counter++;
            ?>
            <div class="post-container post<?php echo $counter; ?>">
                <div style = "float:left;margin-top:-5px;width:125px;margin-left:5px;">
                    <a href="<?= the_permalink(); ?>">
                    <?
                    the_post_thumbnail();
                    ?> </a>
                </div>						


                <div class="post-title" style="float:left;margin-top:-2px;width:125px;margin-left:5px;">
                    <div class='date'>
                        <?php echo the_date(); ?>
                    </div>    
                    <div class='title'>
                         <a href="<?= the_permalink(); ?>"><?php echo the_title(); ?></a>
                   </div>
    
                </div>
                <br class="clear"/>
            </div>
        <? endwhile; ?>
    </div>
</div>
<div class="categoryCardFooter">
    <div class="cardmenuFooter1">
        <div class="cardtypefooter">
            Get Our NewsLetter
        </div>
        <div class="newsletter-content">
            Nulla tincidunt sollicitudin tristique. Sed sed metus malesuada, semper dolor sit amet, eleifend libero. 
        </div>
     
        <?php echo do_shortcode('[mc4wp_form]'); ?>

    </div>
</div>
<div style="clear: both;"></div>
<div class="go-top">
    <img src="<?php echo $sitelink ?>/images/arrowup.png" />
</div>

