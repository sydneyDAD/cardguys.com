<?php
class admin_temp{
	function title($text,$enctype = 'enctype="multipart/form-data"',$name = 'admin_form'){?>
		<form <?=$enctype?> method="post" action="" name="<?=$name?>">
		<div class="title_module"><?=$text?></div>
		<div class="hr_module"><hr/></div>
		<table width="100%">
	<?}
	function left_title($text){?>
	<tr>
		<td class="td_left">
			<?=$text?>
		</td>
		<td class="td_right">
	<?}
	function input_text($text='',$name,$value = '',$size = '40',$type = 'text',$other = ''){
		if ($other == 1){
			$other = 'checked';
		}
		if ($text !='')
		$this->left_title($text);?>
			<input size="<?=$size?>" type="<?=$type?>" name="<?=$name?>" value="<?=$value?>" <?=$other?> />
		<? if ($text !=''){?>
		</td>
	</tr><?}
	}
	function select_text($text,$select){
		return $this->left_title($text).$select.'</td></tr>';
	}
	function area_text($text,$name,$value,$col = ''){
		return $this->left_title($text).'
		<textarea name="'.$name.'" '.$col.'>'.$value.'</textarea></td></tr>
		';
	}
	function detail($name,$value,$height = '400',$toolbar = '',$colspan=2,$text=''){
		
		$ex = '<tr>';
		if ($text != ''){
			$ex .= '<td class="td_left">'.$text.'</td>';
		}
		$ex .='<td class="td_right" width="300" colspan = '.$colspan.'>';
		echo $ex;
		$oFCKeditor = new FCKeditor($name) ;
		$oFCKeditor->ToolbarSet = $toolbar;
		$oFCKeditor->Value		= $value ;
		$oFCKeditor->Height		= $height ;
		$oFCKeditor->Create() ;
		echo '</td></tr>';
	}
	function input_pin(){
	   global $sitelink;
	   
	   if($_SESSION['permission'.$sitelink]!='administrator'){
		$this->left_title('Mã xác nhận');
			security::pincode();
        }else{
            '</td></tr>';
        }
		
	}
	function submit($onclick = 'onclick="return checkinput()"',$align='center')
    {
		return $this->input_pin().'<tr>
		<td align="'.$align.'" colspan="2" height="50px">
			<input type="submit" size="100px" '.$onclick.' name="submit" value="Submit" >
			<input type="reset" size="100px" name="reset" value="Reset" >'.$other.'
		</td>
		</tr></table>';
	}
	function title_lists_form($enctype = 'enctype="multipart/form-data"',$name = 'admin_form'){
		return '<form '.$enctype.' method="post" action="" name="'.$name.'">
		<table width="100%">
		<tr class="atitle">
			<td width="3%" align="center">#</td>
			<td width="3%" align="center">
				<input  type="checkbox" name="toggle" value="0" onclick="check();"/>
			</td>';
	}
	function submit_lists($paging = '',$i = '',$button = ''){
		$js = '';
         global $sitelink;
		if (intval($i) > 0){
			$js = '<script language="javascript">
					function check(){
						checkall('.($i - 1).');
					}
					</script>';
		}
        if($_SESSION['permission'.$sitelink]=='administrator'){
    	       
            $xoa ='<tr>
    			<td colspan="2" align="right">
    				<input type="submit" name="submit" onclick="return confirmdel();" value="Delete">'.$button.'
    			</td>
    		</tr>';
        }
		return '
		<tr>
			<td colspan="12" align="right">
				<div class="dot"></div>
				'.$paging.'
			</td>
		</tr>
		'.$xoa.'
	       </table>'
        .$js;
	   ;
	}
	function td($text,$width = '',$align = '',$colspan=''){
		if ($width != '')
		$width = ' width = "'.$width.'"';
		if ($align != '')
		$align = 'align = "'.$align.'"';
		if ($colspan != '')
		$colspan = ' colspan = "'.$colspan.'"';
		return '<td '.$width.$align.$colspan.'>'.$text.'</td>';
	}
	function stt($i){
		$style = '';
		if (intval($i) % 2 == 1){
			$style = 'style="background: #DDDDDD;"';
		}
		return '<tr '.$style.'>'.$this->td('<b>'.$i.'</b>','','center');
	}
	function dot($colspan=''){
		return '
		</tr>
		<tr>
			'.$this->td('<div class="dot"></div>','100%','',$colspan).'
		</tr>
		';
	}
}
?>