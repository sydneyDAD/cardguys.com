<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row = $product->lists($product->key.',image,name,description,price,status,alias','special = 1','ordering',8);
$i = 1;
?>

<table id="special_product" width="100%" cellpadding="8px">
		
		<?
		if ($row){ 
		   $i =1;
        
			foreach ($row as $row){
			
             if (($i==1) ||($i==5)) echo "<tr>";
             if($i>4)    $border_top = ' border-top: 1px solid #DDDDDD; ';
			 if ($i%4!=0) $border_right ='border-right: 1px solid #DDDDDD;';
             ?>
            
				<td width="25%" <?  echo 'style="'.$border_right.$border_top.'"' ?>>
						<a  href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$template->show_image($row->image,$product->path.'resize/','alt="'.$row->name.'" width="120px" align="right" style="margin: 0 5 3 5;"')?></a>
						<div class="product_name">
							<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$row->name;?></a>
						</div>
						<div class="product_description">
							<?=$row->description?>
						</div>
						<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$template->show_detail($row->pro_id)?></a>
				
                </td>
			<?
            if (($i==4)||($i==8)) echo "</tr>";
            
			$i++;
           
			}
		}
		?>	
		
</table>