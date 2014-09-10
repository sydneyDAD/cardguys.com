<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }

$banks = $cards_issuer->lists('status=1 ORDER BY ordering ASC');
foreach ($banks as $bank) {
?>
  <?
 if($bank->image!=''){
 ?>
 <div class="content-issuer">
						<div class="content-issuer-image">  <a title="<?=$bank->name?>"  href="<?=change_url1($bank->alias)?>">
                        <img width="140px"  title="<?=$bank->name?>" border="0" src="<?=$sitelink?>upload/product/<?=$bank->image?>"  />
                        </a></div>
						<div class="content-issuer-text"><a title="<?=$bank->name?>"  href="<?=change_url1($bank->alias)?>"><?=$bank->name ?></a>.  <?=ucfirst($bank->destination)?> </div>
</div>

  <?

 }?>
<?
}?>


