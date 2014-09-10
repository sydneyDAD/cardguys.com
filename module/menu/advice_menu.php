<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$advice = $advice_menu->lists('status = 1','','ordering ASC');
?>
<div class="content-menu <?=$extraie4?>">
<?
foreach ($advice as $type) {
$menuh=($type->alias == $oldmod)?"link-menu2":"link-menu";

?>

<div class="<?=$menuh?>">
    <?if($menuh=="link-menu"){?>
    <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
    <?}?>
    <div class="link-menu-text">
        <a title="<?=$type->name?>" href="<?= $sitelink ?>/<?=$type->alias?>"><?=$type->name?> </a>
    </div>
</div>


<?
$hold_typesx.="<option value=\"".$type->tbl_id."\">".$type->name;
}
?>
</div>

