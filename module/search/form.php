<? if ( !defined('INCLUDED') ) { die("Access Denied"); } ?>					
<form method="get" name="search" style="padding-left: 10px; margin-top: 5px">
		<input type="hidden" name="module" value="search" />
		<input type="hidden" name="view" value="list" />
		<input size="25" type="text" name="keyword" />
			<select name="type">
					<option value="all">Tất cả</option>
					<option value="pro_name">Theo tên / mã sản phẩm</option>
					<option value="pro_description">Theo mô tả sản phẩm</option>
					<option value="pro_detail">Theo chi tiết sản phẩm</option>
					<option value="pro_price_up">Giá lớn hơn</option>
					<option value="pro_price_down">Giá nhỏ hơn</option>
			</select>
					<input type="submit" value="Tìm kiếm" />
</form>
			