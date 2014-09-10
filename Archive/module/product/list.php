<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$limit = '9'; $i = 1;
$select = 'name,pro_id,price,description,cha_id,cat_id,status,image,alias,link_demo,special';
$where = $product->key.'> 0';
if ($_GET['status']!='')
	$where .= ' && status = '.intval($_GET['status']);
if ($_GET['cu'] > 0)
	$where .= ' && p.cha_id = '.intval($_GET['cha']);
if ($_GET['cat'] > 0)
	$where .= ' && p.cat_id = '.intval($_GET['cat']);
if ($_GET['name'])
	$where .= '&& p.name LIKE \'%'.clear($_GET['name']).'%\'';
if ($_GET['id'])
	$where = $product->key.'='.intval($_GET['id']);
$paging = $page->paging($product->table.' as p',$limit,$where,1);
$row = $product->lists($select,$where,'',$page->limit(),'1');


?>


  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
    <td width="1"><img src="images/h_trai.gif"></td>
    <td class="tieude">
        New website template 
    </td>
    <td width="1"><img src="images/h_phai.gif"></td>
    </tr>
    </tbody>
    </table>

    <table class="bangsanpham" border="0" cellpadding="5" cellspacing="4" width="675">
    <tbody>
    <tr>
    
    <? if ($row){
			foreach ($row as $row){
			 
			              
			 if($row->special=='1'){
			     
                 $sp ="<img src='images/icon_hot.gif'>";
			 }
             else {
                $sp='';
             }
             if($row->price=='0'){
                $price="Liên hệ";
             }
             else{
                $price = price($row->price).' đ';
             }
            
             
		?>
  	
       <td style="background: none repeat scroll 0% 0% ;  " align="center" valign="top" width="33%">
    <table border="0" cellpadding="0" cellspacing="0">
    <tbody><tr>
    <td style="height: 120px; border: 1px solid rgb(222, 222, 222); background: none repeat scroll 0% 0% ; padding: 20px; " onmouseover="this.style.background ='#F0F0F0'" onmouseout="this.style.background ='white'"  align="center" valign="middle">
    
    <div class="ma">website : <a target="_blank" class="xanhlacay" href="<?=$row->link_demo?>"> # <?=MAWEB.$row->pro_id?></a><?=$sp?>
    </div>
    <a target="_blank" href="<?=$row->link_demo?>"><?=$template->show_image($row->image,$product->path.'resize/','alt="Website " title=" website" width="120px" align="center" ')?></a>  
    <br /><br />
    <div><span style="font-weight: bold;">Price: </span><span style="font-weight: bold; color: red;"><?=$price?></span></div>
        <div class="dathang"><a target="_blank" class="xanhlacay" href="<?=$row->link_demo?>">Xem Demo</a> | <a class="xanhlacay" href="<?=change_url('index.php?module=request&id='.$row->pro_id.'&alias='.seourl($row->name).'"')?>">Order</a></div>
  </td>
    </tr>
    </tbody>
    </table>
    	  
    </td>
    
   	<? if ($i % 3 == 0) {echo '</tr><tr>';}
				$i++;
    }
    }
    else {
        
        echo " <br><br><center><b>No categories available.</b></center>";
    }
    
    ?>
    
    
</tr>
</tbody>


</table>

	<?=$paging?>





<!--
	<table id="product" cellpadding="10px" cellspacing="0">
		<tr>
		<? if ($row){
			foreach ($row as $row){
		?>
			<td style="width: 33%; <?=$border?>">
				<a  href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$template->show_image($row->image,$product->path.'resize/','alt="'.$row->name.'" width="120px" align="right" style="margin: 0 5 3 5;"')?></a>
				<div class="product_name"><a href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$row->name;?></a></div>
				<div class="product_description">
					<?=$row->description?>
				</div>
				<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$template->show_detail($row->pro_id)?></a>
			</td>
			<? if ($i % 3 == 0) echo '</tr><tr>';
				$i++;}
			}
		?>
		</tr>
		<tr>
			<td colspan="3" align="right"><?=$paging?></td>
		</tr>
	</table>
    -->