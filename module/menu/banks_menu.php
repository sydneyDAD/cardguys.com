<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
	$banks = $cards_bank->lists('status= 1','','ordering ASC');
    
?>
<div class="content-menu <?=$extraie4?>">
<?
foreach ($banks as $bank) {
$menuh=($bank->alias == $oldmod)?"link-menu2":"link-menu";
?>
	<div class="<?=$menuh?>">
    <?if($menuh=="link-menu"){?>
    <?}?>
						<div class="link-menu-text">
							<a title="<?=$bank->name?>" href="<?= $sitelink ?>/<?=$bank->alias?>"><?=$bank->name?> </a>
						</div>
					</div>
<?
}
?>
</div>