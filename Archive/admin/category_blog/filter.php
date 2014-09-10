<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); } ?>
<form method="get" action="">
	<input type="hidden" name="module" value="<?=$faq->module?>" />
	<input type="hidden" name="view" value="list" />
	<select name="status">
		<option value="">Tình trạng</option>
		<option value="1" <? if (intval($_GET['status'])== 1) echo 'selected'; ?>>Đã trả lời</option>
		<option value="0" <? if ($_GET['status']== '0') echo 'selected'; ?>>Chưa trả lời</option>
	</select>
	<input type="submit" value="Lọc"/>
</form>