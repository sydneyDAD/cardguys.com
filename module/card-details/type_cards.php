<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$types = $cards_type->lists('status = 1','','ordering ASC');
?>
<div class="content-menu <?=$extraie4?>">
<?
foreach ($types as $type) {
$menuh=($type->alias == $oldmod)?"link-menu2":"link-menu";
?>

<div class="<?=$menuh?>">
    <?if($menuh=="link-menu"){?>
    <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
    <?}?>
    <div class="link-menu-text">
        <a title="<?=$type->name?>" href="<?=$type->alias?>"><?=$type->name?> </a>
    </div>
</div>


<?
	$hold_typesx.="<option value=\"".$type->tbl_id."\">".$type->name;
}
?>
</div>

