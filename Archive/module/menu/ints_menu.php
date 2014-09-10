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
<div class="link-menu-img"><img onError="this.src=images/noimage.jpg" src="<?=$sitelink?>upload/product/<?=$int->image?>" style="border-width: 0px; width: 22px; height: 12px;" /></div>
<?}?>
<div class="link-menu-text">
&nbsp; <a  title="<?=$int->name?>"  href="<?=$int->alias?>"><?=$int->name?></a>
</div>
</div>




<?

}
?>
</div>

