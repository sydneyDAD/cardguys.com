<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$ints = $cards_int->lists('status = 1','','ordering ASC');
?>
<div class="content-menu <?=$extraie4?>">
<?
foreach ($ints as $int) {
$menuh=($int->alias == $oldmod)?"link-menu2":"link-menu";
?>

<div class="<?=$menuh?>">
    <?if($menuh=="link-menu"){?>
<?}?>
<div class="link-menu-text">
&nbsp; <a  title="<?=$int->name?>"  href="<?= $sitelink ?>/<?=$int->alias?>"><?=$int->name?></a>
</div>
</div>




<?

}
?>
</div>

