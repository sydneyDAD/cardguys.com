<?php

if ( !defined('INCLUDED') ) { die("Access Denied"); }
$category = $category_blog->lists();
include_once ('class/class_blog.php');
$blogs = new blog;
?>
<div class="content-menu" style="min-height: 0px;">
<?
foreach ($category as $category) {
    $count = $blogs->lists('title','category_id = '.$category->id);
    $n=count($count);
?>
<div class="link-menu">
						<div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
						<div class="link-menu-text">
							<a  href="<?=change_url('index.php?module=blog&type='.$category->id.'&alias='.$category->name)?>"><?=$category->name.' ('.$n.')';?> </a>
						</div>
</div>



<?

}
?>
</div>
