<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row_info = $db->detail($order->table,'',$order->key.' = '.intval($_GET['id']));
$row = $order->detail();
?>
<style>
	td.right_order{
		border-bottom: 1px dotted;
	}
	.left_order{
		width: 20%; height: 30px;
	}
	.title_report{
		text-align: center; font-weight: bold; font-size: 18px; margin-top: 15px;
	}
	tr.title{
		font-weight: bold;
	}
	.order_detail {
		margin: 15px 0; font-weight: bold; color: red; font-size: 13px;
	}
</style>
<?=$template->title_content(CART_SUCCESS);?>
<hr class = "hr_module" align = "left">
<table width="100%">
	<tr>
		<td>
			<?=CART_CODE?>: <b style="font-size: 13px; color: red;"><?=$row_info['order_id']?></b>		
		</td>
		<td align="right">
			<?=$row_config['footer'];?>
		</td>
	</tr>
</table>
<div class="title_report"><?=CART_INFORMATION?></div>
<table width="100%">
	<tr>
		<td class="left_order">
			<?=CART_CUSTOMER?>:
		</td>
		<td class="right_order">
			<?=$row_info['customer']?>
		</td>
	</tr>
	<tr>
		<td class="left_order">
			<?=CART_ADDRESS?>:
		</td>
		<td class="right_order">
			<?=$row_info['address']?>
		</td>
	</tr>
	<tr>
		<td class="left_order">
			<?=CART_PHONE_CONFIRM?>:
		</td>
		<td class="right_order">
			<?=$row_info['mobile']?>
		</td>
	</tr>
	<tr>
		<td class="left_order">
			<?=CART_PAYMENT?>:
		</td>
		<td class="right_order">
			<?=$order->payment($row_info['payment'])?>
		</td>
	</tr>
	<tr>
		<td class="left_order">
			<?=CART_DATE_ORDER?>:
		</td>
		<td class="right_order">
			<?=date_time_fomat($row_info['date_up'])?>
		</td>
	</tr>
</table>
<div class="order_detail">Chi tiết</div>
<table width="100%">
	<tr class="title">
		<td width="2%" align="center" class="atitle">#</td>
		<td width="30%" ><?=PRODUCT_NAME?></td>
		<td width="10%"><?=PRODUCT_PRICE?></td>
		<td width="10%" align="center" ><?=CART_QUANTITY?></td>
		<td width="10%" align="right"><?=TOTAL?></td>
	</tr>
	<tr>
		<td colspan="11"><div class="dot"></div></td>
	</tr>
	<? 
	$total = 0; $i = 1;
	foreach ($row as $row){?>
	<tr>
		<td align="center" height="25px"><b><?=$i?></b></td>
		<td>
			<b><a href="index.php?module=product&view=form&id=<?=$row->pro_id?>"><?=$row->name?></a></b>
		</td>
		<td>
			<b><?=price($row->pro_price)?></b>
		</td>
		<td align="center">
			<?=$row->quantity?>
		</td>
		<td align="right">
			<? $total_1 = $row->pro_price * $row->quantity; echo price($total_1).' '.$row_config['currency'.$config->get_lang()]?>
		</td>					
	</tr>
	<? 
	$total = $total + $total_1;
	$i++; }?>
	<tr>
		<td colspan="11" align="right">
			<div class="dot"></div>
			<b><?=TOTAL?>: <?=price($total)?> <?=$row_config['currency'.$config->get_lang()]?></b>
		</td>
	</tr>
	<tr>
		<td colspan="11" align="center">
			<a href="print.php?id=<?=$row_info['order_id']?>"><input type="submit" size="30px" name="submit" value="<?=CART_PRINT?>"></a>
			
		</td>
	</tr>
</table>
<? //include_once('module/order/list.php');