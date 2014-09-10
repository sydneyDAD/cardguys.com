<?php

class template{
	function show_image($name,$path,$size = null){		
		$type = substr ($name,-3,3);
		switch ($type){
			case 'swf':
			$path = str_replace('/resize','',$path);
			$show = '
			<embed '.$size.' menu="false" loop="true" play="true" wmode="transparent"  src="'.$path.$name.'" pluginspage="http://www.macromedia.com/go/getflashplayer" allowscriptaccess="always" type="application/x-shockwave-flash"/>
			';
			break;
			case 'jpg'||'gif'||'png'||'jpeg':
			$show = '<img onError="this.src=\'images/noimage.jpg\'" src="'.$path.$name.'" '.$size.'>';
			break;
			default:
			$show ='<img  src = "images/noimage.jpg" '.$size.'>';
			}
	return $show;
	}
	function show_detail($id){?>
			<div class="detail_icon"><?=PRODUCT_DETAIL?></div>
	<?}
	function show_status($input,$id='',$other='',$status='',$top='',$good=''){
		if ($other != ''){
			$other = '&special=1';
		}
        if ($top != ''){
			$top = '&top=1';
		}
        if ($good != ''){
			$good = '&good=1';
		}
        if ($status != ''){
			$status = '&status=1';
		}
		if ($input == 1)
		return '<a href="'.full_url().'&changestatus='.$id.'&st='.$input.$other.$top.$good.$status.'"><img width="16px" height="16px" src="images/tick.png" /></a>';
		else
		return '<a href="'.full_url().'&changestatus='.$id.'&st='.$input.$other.$top.$good.$status.'"><img width="16px" height="16px" src="images/no-tick.png" /></a>';
	}
	function show_cart($input){?>
		<form action="" method="post" name="addcart">
			<a href="javascript:document.addcart.submit()"><div class="detail_icon"><?=ORDER_ONLINE?></div></a>
			<input type="hidden" name="addcart" value="<?=$input?>">
		</form>
	<?}
	function title_module($text){
		return '<div class="title_module"><image src="images/muiten.gif" align="left">'.$text.'</div>';
	}
	function tooltip($image,$price=0,$status='',$description='',$name=''){
		$temp = '<table style="border:1px solid #DDDDDD" width="550px" id="description"><tr><td valign="top" width=160px"><img src="upload/product/resize/'.$image.'" width="150px"></td><td valign="top" style="padding: 10px;"><div class="row">'.PRODUCT_NAME.': <span class="name">'.$name.'</span></div><div class="row">'.PRODUCT_PRICE.': <span class="price">'.price($price).'VNĐ</span></div><div class="row">'.PRODUCT_STATUS.': <b>'.$status.'</b></div><div>'.$description.'</div></td></tr></table>';
		return htmlspecialchars($temp,ENT_QUOTES,'UTF-8');
	}
	function title_content($title){
	     return '<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
    <td width="1"></td>
    <td class="tieude">
        '.$title.'
    </td>
    <td width="1"></td>
    </tr>
    </tbody>
    </table>';
	
	}
}
?>