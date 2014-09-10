<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$qualitys = $cards_quality->lists('status= 1','','ordering ASC');
?>
<div class="content-menu <?=$extraie4?>">
<?
if($qualitys)
{
foreach ($qualitys as $quality) {
$menuh=($quality->alias == $oldmod)?"link-menu2":"link-menu";
?>
	<div class="<?=$menuh?>">
    <?if($menuh=="link-menu"){?>
    <?}?>
						<div class="link-menu-text">
							<a title="<?=$quality->name?>" href="<?= $sitelink ?>/<?=$quality->alias?>"><?=$quality->name?> </a>
						</div>
					</div>
<?
}
}
?>
</div>