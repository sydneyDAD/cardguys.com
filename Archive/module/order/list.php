<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_GET['option'] = 'delcart' && $_GET['cid']){
	$order->del_cart(intval($_GET['cid']));
}
$list_cart = $order->show_cart();
?>
<div>
	<form method="post" action="">
		<table width="100%" cellpadding="5" cellspacing="0">
			<tr class="table_cart">
				<td width="10%" align="center"><?=STT?></td>
				<td width="35%"><?=PRODUCT_NAME?></td>
				<td width="15%"><?=CART_QUANTITY?></td>
				<td width="15%" align="right"><?=PRODUCT_PRICE?></td>
				<td width="15%"align="right"><?=TOTAL?></td>
				<td align="center"><?=DELETE_ITEM?></td>
			</tr>
			<tr>
				<td colspan="8"><div class="dot"></div></td>
			</tr>
			<? 
			if ($list_cart){
				$i = 1; $total = 0; $price = '';
				foreach ($list_cart as $list_cart){
						if (!$_SESSION['quantity_'.$list_cart->pro_id])
						$_SESSION['quantity_'.$list_cart->pro_id] = 1;
						
						if ($_POST['update_quatity'] == 'update'){
						$_SESSION['quantity_'.$list_cart->pro_id] = intval($_POST['quantity_'.$list_cart->pro_id]);
						
						}
				?>
				
					<tr>
						<td height="20px" align="center"><b><?=$i?></b></td>
						<td><b><a href="<?=change_url('index.php?module='.$product->module.'&id='.$list_cart->pro_id.'&alias='.$list_cart->alias)?>"><?=$list_cart->name?></a></b></td>
						<td><input style="text-align: center;" title="<?=CART_QUANTITY?>" size="3" name="quantity_<?=$list_cart->pro_id?>" type="text" value="<?=$_SESSION['quantity_'.$list_cart->pro_id]?>"> </td>
						<td align="right"><?=price($list_cart->price)?></td>
						<td align="right"><b><? $total_1 = $list_cart->price*$_SESSION['quantity_'.$list_cart->pro_id]; echo price($total_1)?></b></td>
						<td align="center"><a href="<?=change_url('index.php?module='.$module.'&option=delcart&cid='.$list_cart->pro_id)?>"><img width="12px" height="12px" src="images/aff_cross.gif"></a></td>
					</tr>
				<? 
				$price = $price.$list_cart->price.',';
				$total = $total + $total_1;
				$i ++;
				}?>
				<tr>
					<td colspan="6"><div class="dot"></div></td>
				</tr>
				<tr>
					<td height="25px" align="right" colspan="5"><?=TOTAL?>: <span class="price"><?=price($total)?></span></td>
					<td align="center">
						<b><?=$row_config['currency1']?></b>
					</td>
				</tr>
			<tr>
				<td colspan="8" align="center">
					<input type="submit" value="<?=CART_UPDATE?>" />
					<input type="button" onclick="window.location.href='<?=change_url('index.php?module='.$order->module.'&view=payment')?>'" value="<?=CART_SEND_INFOR?>" />
					
					<input type="button" onclick="window.location.href='index.php?option=logout'" value="<?=CART_DELETE?>">
					<input type="hidden" name="update_quatity" value="update">
				</td>
			</tr>
			<?}
			else{
				echo '<tr><td colspan="8" align="center">'.CART_EMPTY.'</td></tr>';
			}
			?>
		</table>
	</form>
</div>