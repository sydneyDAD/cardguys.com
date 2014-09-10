<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'delete'){
	$news->delete();
}

$rows = $xmlfeed->lists();


?>
<script type="text/javascript">

    function clearxml(){
        if(confirm('Are you sure clear XML Cache?')){


             $('#xml_content').html('<img src="../images/loading.gif" /><br/><b>Please Wait...</b>');
            $.post('<?=$sitelink?>admin/index.php',{option:'clearxml'},function (data){
            data = data.replace(/\s{2,}/gi,'');
            if(data=='success'){

                 $('#xml_content').html('<b>XML Feed had been clear.</b>');
            }
            else {

                alert(data);
            }

            });

        }


    }
    function loadxml(){

         $('#xml_content').html('<img src="../images/loading.gif" /><br/><b>Please Wait...</b>');
        $.post('<?=$sitelink?>admin/index.php',{option:'loadxml'},function (data){
            data = data.replace(/\s{2,}/gi,'');
            if(data=='success'){

                 $('#xml_content').html('<b>XML Feed had been loaded. </b>');
                 window.location.href="<?=$sitelink?>admin/index.php?module=cards&view=xmlfeed";
            }
            else {

                $('#xml_content').html(data);
            }

        });

    }
    function remove_card(id){

         if(confirm('Are you sure remove card?')){

             $.post('<?=$sitelink?>admin/index.php',{option:'removecard',card_id:id},function (data){
            data = data.replace(/\s{2,}/gi,'');

            if(data=='success'){
                $('#loading').html('<b>This Card had been removed.</b>');
                $('#div_card_id_'+id).hide('slow');
            }
            else {

                alert(data);
            }

        });

         }

    }

    function save_card(id){
        $('#btn_save_'+id).attr('value','Saving..');
        $('#btn_save_'+id).attr('disabled','disabled');
        $('#loading').html('<img src="../images/loading.gif" /><br/><b>Please Wait...</b><br />');
        $.post('<?=$sitelink?>admin/index.php',{option:'savecard',card_id:id},function (data){
            data = data.replace(/\s{2,}/gi,'');
            if(data=='success'){
                $('#loading').html('<b>This Card has been saved.</b>');
                $('#div_card_id_'+id).hide('slow');
            }
            else {

                alert(data);
            }

        });

    }




</script>
<div>
    <div style="width: 500px; margin: auto; text-align: center;">
        <input type="button" id="clearxml" onclick="clearxml()" value="Clear XML Cache" /> &nbsp; &nbsp;&nbsp;<input onclick="loadxml()" id="loadxml" type="button" value="Load XML Data" />
    </div>

    <div id="xml_content" style="text-align: center; margin-top: 20px;">

    <div id="loading" style="color: green; font-weight: bold; line-height: 30px;"></div>


<?
if(!$rows){

    echo "<center><b>No item.</b></center>";
}
else{
foreach($rows as $row){


?>
<div id="div_card_id_<?=$row->OfferId?>">

<table  style="width: 700px;margin: auto;">
    <tr>
        <td align="center" >
            <input type="button" value="Save" id="btn_save_<?=$row->OfferId?>" onclick="save_card('<?=$row->OfferId?>')"/><br />
            <br />
            <input type="button" value="Remove" id="btn_remove_<?=$row->OfferId?>" onclick="remove_card('<?=$row->OfferId?>')" />
        </td>


        <td>


<table style="background-color:#000066;width:650px; margin: auto;">

<tr>
    <td><a  title=""  style="color: white; font-weight: bold;" ><?=$row->OfferName?></a></td>
</tr>
<tr>
    <td style="background-color:#ffffff;margin:3px 3px 3px 3px;padding:10px 0px 0px 0px;">
        <div style="display:inline-table;overflow:auto;padding:0px 0px 5px 0px;">
            <table>
            <tr>
                <td width="125" align="center" valign="center">
                    <div style="padding:10px 0px 10px 30px;">

                        <img src="<?=$row->BigCreative?>" style="border-width:0px;" />
                    </div>

                </td>
                <td width="520" valign="top">
                    <ul style="list-style-image:url(../images/featurebullet.gif);font-size:12px;">
                        <?=$row->TextDetails?>

                    </ul>
                </td>
            </tr>
            </table>
        </div>
        <div >

        <table style="font-size:12px;text-align:center;">
        <tr style="background-color:#dddede;padding:2px 0px 0px 2px;">
            <td style="width:90px;">Intro APR</td>

            <td style="width:153px;">Intro APR Period</td>
            <td style="width:153px;">Regular APR</td>
            <td style="width:105px;">Balance Transfer</td>
            <td style="width:95px;">Annual Fee</td>
            <td style="width:85px;">Credit Required</td>
        </tr>

        <tr style="background-color:#b9d4fa;padding:4px 0px 0px 4px;">
            <td><?=$row->PurchaseIntroRate?></td>
            <td><?=$row->PurchaseIntroPeriod?></td>
            <td><?=$row->PurchaseGoToRate?></td>
            <td><?=$row->TransferFee?></td>
            <td><?=$row->AnnualFee?></td>

            <td><?=$row->CreditType?></td>
        </tr>
        </table>

		</div>
</td>
</tr>
</table>


        </td>
    </tr>

</table>
</div>

<?

}
}
?>
    </div>
</div>