<?
if (!defined('INCLUDED')) {
    die("Access Denied");
}
$banks = $cards_issuer->lists('status=1 ORDER BY ordering ASC');
$the_bank_cnt = count($banks);
foreach ($banks as $bank) {
    $cnt__++;
    $extra_id = ($the_bank_cnt == $cnt__) ? "exempt_tops" : "";
//$extra_id=($the_bank_cnt==$cnt__)?" id=exempt_tops":"";
    ?>
    <?
    
    if ($bank->image != '') {
        $bank->name = str_replace('Â', "", $bank->name);
        ?>
        
        <div class="content-issuer <?= $extra_id ?>">
            <div class="content-issuer-image">
                     <a title="<?= $bank->name ?>"  href="<?=  $sitelink."/".change_url1($bank->alias) ?>">
                    <img   title="<?= $bank->name ?>" border="0" src="<?= $sitelink ?>/upload/product/<?= $bank->image ?>"  />
                </a></div>
            <div class="content-issuer-text">
                <a title="<?= $bank->name ?>"  href="<?= $sitelink."/".change_url1($bank->alias) ?>">
                    <?= $bank->name ?>
                </a>.
                <?= stripslashes(ucfirst($bank->destination)) ?> </div>
        </div>

        <? }
    ?>
    <? }
?>

