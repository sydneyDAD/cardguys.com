<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row = $product->detail();
if ($_SESSION['lang'] != $row['lang']){
	$_SESSION['lang'] = $row['lang'];
	header_redirect(full_url());
}
$pro_image = $product->list_product_image();
//$product->count();
if ($_POST['addcart']){
	$order->add_cart(intval($_POST['addcart']));
}
?><!--
	<table id="description" width="100%">
		<tr>
			<td class="image">
				<?=$template->show_image($row['image'],$product->path.'resize/','alt = "'.$row['name'].'" onclick = "full_image()" id="main_image" width="200px" class="images_detail"');?>
				<div class="clr" style="margin: 5px 0;">
				<?php 
				if ($pro_image){
				$i = 1;
				foreach ($pro_image as $pro_image){?>
					<img id="sub_image<?=$i?>" onclick="change_image(<?=$i?>)" width="17%" height="60px" src="<?=$product->path_other?>resize/<?=$pro_image->image?>" onerror="this.src='images/noimage.jpg'"/>
				<?$i ++;
				}
				}?>
				</div>
			</td>
			<td id="description">
					<div class="row"><?=PRODUCT_NAME?>: <span class="name"><?=$row['name']?></span></div>
					<div class="row"><?=PRODUCT_PRICE?>: <span class="price"><?=price($row['price'])?> <?=$row_config['currency1']?></span></div>
					<div class="row"><?=PRODUCT_STATUS?>: <span class="status"><?=$product->checkstatus($row['status'])?></span></div>
					<div style="margin-bottom: 10px;"><?=$row['description'];?></div>
					<div>
						<a href="javascript: history.go(-1)"><div class="detail_icon"><?=BACK?></div></a>
						<?=$template->show_cart($row[$product->key]);?> 
					</div>
			</td>
		</tr>
	</table>
	-->
	<div class="tab_detail">
		<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row['pro_id'].'&alias='.$row['alias'])?>"><div id="tab_1" onmousemove="change_tab(1)" id="tab_1" class="nomal"><?=PRODUCT_DETAIL?></div></a>
		<!--<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row['pro_id'].'&alias='.$row['alias'])?>&tab=2"><div onmousemove="change_tab(2)" id="tab_2" class="nomal"><?=COMMENT?></div></a>-->
		<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row['pro_id'].'&alias='.$row['alias'])?>&tab=3"><div onmousemove="change_tab(3)" id="tab_3" class="nomal"><?=PRODUCT_OTHER?></div></a>
	</div>	
	<div id="tab_detail">
		<?
		if ($_GET['tab'])
		$tab = intval($_GET['tab']);
		else
		$tab = 1;
		if ($tab == 2){
			include_once ('module/comment/product.php');
		}
		elseif ($tab == 3){
			include_once ('module/product/other.php');
		}
		else{
		  ?>
          <div style="line-height: 25px;">
          <?
			echo $row['detail'];
            
           ?>
           </div>
           <div style="text-align: center; line-height: 35px;;"><br />
           <span style="color: rgb(255, 0, 0);"><span style="font-size: x-large;">Đặc biệt:</span></span><span style="font-size: x-large;"> <span style="color: rgb(0, 0, 255);">Trung tâm nhận chữa các máy có "Pan bệnh" khó<br>

mà nơi khác không xử lý được với giá cả hợp lý</span></span><br>


           <br /><hr />
           
                      <span style="color: red; font-size: 14px; font-weight: bold;">Nguyên tắc làm việc<br /></span>
<span style="color: blue; font-size: 14px;">
1. Tìm rõ nguyên nhân - Xử lý triệt để<br />

2. Làm việc nhanh chóng và chắc chắn.<br />

3. Hình thức chuyên nghiệp- Ngăn nắp, sạch sẽ.<br />

4. Lễ phép với khách hàng - Đối xử với máy móc thiết bị cẩn thận.<br />

5. Đảm bảo an toàn lao động.<br />

6. Kết thúc công việc đúng hẹn.<br />

7. Trả lại khách hàng phụ tùng cũ - Viết giấy bảo hành phần việc đã làm.<br /></span>

<span style="font-size: 25px; color: red;">CHỮ TÍN DÀNH CHỌN NIỀM TIN</span><br /><br />
<span style="font-size: 20px; color: red;">TRUNG TÂM ĐIỆN LẠNH BÁCH KHOA - CỬA HÀNG ĐIỆN LẠNH VĨNH LUẬT</span><br />
<span style="font-size: 20px; color: blue;">Rất hân hạnh được phục vụ quý khách.</span><br />
<span style="font-size: 20px; color: blue;">Xin vui lòng liên hệ:</span>
<br />
<span style="font-size: 30px;">HOTLINE: 
 <span style="color: rgb(0, 128, 128);">0989</span> <span style="color: rgb(255, 0, 0);">374</span> <span style="color: rgb(0, 0, 255);">905</span> </span><br /><br />

           </div>

           
           <?
		}
		?>
	</div>
 
<script>
	var main = document.getElementById( "main_image" );
	function change_image(i){
	var trunggian;
	sub = document.getElementById( 'sub_image'+i );
//	sub = sub.src.replace("resize/",""); 
	trunggian = main.src;
	main.src = sub.src;
	sub.src = trunggian;
	}
	function full_image(){
	link = main.src.replace("resize/",""); 
	window.open( link );
	}
	function change_tab(id){
		for (i = 1; i <= 3; i++)
		document.getElementById( 'tab_'+i ).className = 'nomal';
		document.getElementById( 'tab_'+id ).className = 'select';
	}
	document.getElementById( 'tab_<?=$tab?>' ).className = 'select';
</script>