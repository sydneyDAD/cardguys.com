<? 
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'sendorder'){
	$order->save();
}
include_once ('module/order/list.php');
?>
<div class="clr"></div>
<div class="hr_module"><hr></div>
	<div id="description_1">
		<form method="post" name="payment" onsubmit="return checkpayment();">
		<!--<div class="title_module">Thông tin thanh toán</div>-->
		<p/>
		<b>Quí khách vui lòng để lại thông tin.</b>
		<p/>
		<table>
			<tr>
				<td width="20%" class = "contact_left"><?=CART_CUSTOMER?>:</td>
				<td width="50%"><input name="name" size="40"></td>
			</tr>
			<tr>
				<td class = "contact_left"><?=CART_ADDRESS?>:</td>
				<td><input name="address" size="25"></td>
			</tr>
			<tr>
				<td class = "contact_left"><?=CART_PAYMENT?>:</td>
				<td>
					<select name="payment">
						<option value="1"><?=CART_PAYMENT_LIVE?></option>
						<option value="2"><?=CART_PAYMENT_BANK?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class = "contact_left"><?=CART_PHONE_CONFIRM?>:</td>
				<td><input name="mobile" size="25"></td>
			</tr>
			<tr>
				<td class = "contact_left"><?=CART_NOTE?>:</td>
				<td><textarea name="note" rows="4px" cols="40"></textarea></td>
			</tr>
			<tr>
				<td class = "contact_left"><?=CODE_CONFIRM?>:</td>
				<td><? $security->pincode(); ?></td>
			</tr>
			<tr>
				<td class = "contact_left"></td>
				<td>
					<input type="submit" name="submit" value="<?=CART_SEND_INFOR?>">
					<input type="hidden" name="option" value="sendorder">
					<input type="hidden" name="total" value="<?=$total?>">
					<input type="hidden" name="price" value="<?=$price?>">
				</td>
				
			</tr>
		</table>
		</form>
	</div>
<script language="javascript">
function checkpayment(){
	rephone=/^[0-9]+$/;
	reEmail=/^\w+@(\w+\.)+\w+$/;
	if (document.payment.name.value == ""){
	alert ("<?=CHECK_NAME?>");
	document.payment.name.focus();
	return false;
	}
	if (document.payment.address.value == ""){
	alert ("<?=CHECK_ADDRESS?>");
	document.payment.address.focus();
	return false;
	}
	if (document.payment.mobile.value.length < 6 || document.payment.mobile.value.length > 15 || rephone.test(document.payment.mobile.value)==false){
	alert ("<?=CHECK_PHONE?>");
	document.payment.mobile.focus();
	return false;
	}
	if (document.payment.confirm.value != <?=$_SESSION['code_confirm']?>){
	alert ("<?=CHECK_SECURITY_CODE?>");
	document.payment.confirm.focus();
	return false;
	}
	return true;
}
</script>