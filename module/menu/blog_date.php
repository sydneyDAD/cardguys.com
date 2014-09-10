<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$blogss = $blogs->list_date();
?>
<div class="content-menu" >
<?
foreach ($blogss as $blog) {
    $n=0;
    $row_blog_date = $blogs->lists('blog_id, publishdate',' month(b.publishdate) = '.$blog->month.' and year(b.publishdate) = '.$blog->year);
    $n=count($row_blog_date);
?>
					<div class="link-menu">
						<div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
						<div class="link-menu-text">
							<a title="<?=$bank->name?>" href="<?=change_url('index.php?module=advice-center&date='.$blog->month.'&year='.$blog->year.'&alias=advice-by-date')?>"><?=change_month($blog->month).' '.$blog->year.' ('.$n.') '?> </a>
						</div>
					</div>



<?

}
?>
</div>


