<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$types = $cards_type->lists('status = 1');
$ints = $cards_int->lists();
$banks = $cards_bank->lists('1');
$row = $menu->lists('child = 0 && (position = \'bottom\')');
?>
            <div class="categoryCardFooter">

				<div class="cardmenuFooter">
					<div class="cardtypefooter">
						Credit Cards By Type
					</div>
                <?
                foreach ($types as $type) {

                ?>
                    <div class="cardtypefooter-content">
					<a title="<?=$type->name?>" href="<?=$type->alias?>"><?=$type->name?></a> <br />
					</div>

                <?

                }
                ?>
               
				</div>
			</div>
			
            <div class="categoryCardFooter">
				<div class="cardmenuFooter1">
					<div class="cardtypefooter2">
						Credit Cards By Issuer 
					</div>
                <?
                foreach ($banks as $bank) {
                ?>
                <div class="cardtypefooter-content">
                <a  title="<?=$bank->name?>"  href="<?=$bank->alias?>"><?=$bank->name?> </a><br />
                </div>
                <?
                }?>
				</div>
			</div>
			
            <div class="categoryCardFooter">
				<div class="cardmenuFooter3">
					<div >
						<a href="visa-credit-cards"  TITLE="VISA" ALT="VISA CARD ICON"><img  src="<?= $sitelink ?>images/5.jpg" /></a>
					</div>
                    <div>
						<a href="-mastercard-applications"  TITLE="MasterCard" ALT="MASTERCARD CARD ICON"><img  src="<?= $sitelink ?>images/6.jpg" /></a>
					</div>
                    <div >
						<a href="discover-cards"  TITLE="DISCOVER" ALT="DISCOVER CARD ICON"><img  src="<?= $sitelink ?>images/7.jpg"  /> </a>
					</div>
                    <div >
						<a href="-american-express"  TITLE="American Express" ALT="American Express CARD ICON"><img  src="<?= $sitelink ?>images/8.jpg"  /> </a>
					</div>
				</div>
			</div>
			<div class="categoryCardFooter4">

				<div class="cardmenuFooter4">

			<a href="<?=$sitelink?>">Home</a>
            <a href="javascript:void(addbookmark());">Bookmark</a>

<?
if ($row){
	foreach ($row as $row){
	   $link = explode('.',$row->link);
       ?>
    <a title="<?=$row->name?>" class="FooterLinks" <?=$row->taget?> href="<?=$link[0]?>"><?=$row->name?></a>

	<?}
}
?>

<a href="sitemap">Sitemap</a>


				</div>

			</div>

