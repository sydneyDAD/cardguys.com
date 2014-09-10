<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }


$list_cards = $credit_cards->lists_name();
$row1 = $advertise->lists();$row2="";$ftdlist="";$top_list_names="";
if ($_POST['option'] == 'add'){
	$cards_quality->add();
}
if ($_POST['option'] == 'edit'){
	$cards_quality->edit();
}
if ($_GET['id']){
	$row2="";$oldid=$_GET['id'];
	$row = $cards_quality->detail();
    if((int)$_GET['id']!=4){$_GET['id']=4;$row2=$cards_type->detail();$_GET['id']=$oldid;$keysx=explode(",",$row2['cards_list']);if(is_array($keysx)){ if($row['tbl_id']!=4){$topnames=explode("@||@|@",$row['top_type_name']);}$tx=0;foreach($keysx as $kk=>$vv){$ftdlist[$vv]=$topnames[$tx];$tx++;}}}
    $row = $cards_quality->detail();
	if($row['top_type_name'] && $row['top_list'] && $row['tbl_id']!=4){
		$top_list_names=array_combine(explode(",",$row['top_list']),explode("@||@|@",$row['top_type_name']));
	}
	
    $cards = explode(',',$row['cards_list']);
    $sapxeps= explode(',',$row['sapxep']);
	$option = 'edit';
}
if($row['ordering']!=''){
    
    $order = $row['ordering'];
}
else{
    $order=0;
}
	echo $temp->title('Add New Bank Card:');

	echo $temp->input_text('Type Name','name',$row['name'],'40','text','onkeyup="seourl();"');
	echo $temp->input_text('Header Title','head_name',$row['head_name']);
	echo $temp->input_text('Top Text Slogan','card_slogan',$row['card_slogan']);
	echo $temp->input_text('SEO URL','alias',$row['alias']);
    echo $temp->input_text('Status','status',$row['status']);
    echo $temp->title('<span style="color:black; font-size:11px;">Status is used to show or hide card type ( select 0 to hide or 1 to show)</span>');
    echo "<tr><td class=rd_left>Current Image</td><td class=td_right><img src=\"../upload/product/$row[image]\"></td></tr>";
    echo $temp->input_text('','image',$row['image'],'','hidden');
    echo $temp->input_text('Icon','file1','','40','file');
    $checkbit=($row['icon_on'])?" checked ":"";
    echo $temp->input_text('Disable Icon','iconchk',"1",'','checkbox',$checkbit);
	
	
    $assign_banner='<select name="assign_banner">';
    $assign_banner.='<option value="">None</option>';
    if($row1)
    {
        foreach($row1 as $rows)
        {
                $assign_banner.='<option value="'.$rows->adv_id.'"';
                if(($rows->adv_id)==$row['assign_banner'])
                {
                    $assign_banner.= " selected ";
                 }   
                $assign_banner.='>'.$rows->name.'</option>';
        }
    }
    $assign_banner.='</select>';
    echo $temp->select_text('Assign banner',$assign_banner);
    echo $temp->area_text('Title','title',$row['title'],'cols="60" rows ="2"');
    echo $temp->area_text('Keywords','keyword',$row['keyword'],'cols="60" rows ="2"');
	echo $temp->area_text('Description','destination',$row['destination'],'cols="60" rows ="2"');
	echo $temp->detail('header_text',$row['header_text'],'180px','Default','1','Header Text');
    echo $temp->detail('footer_text',$row['footer_text'],'180px','Default','1','Footer Text');
	echo $temp->input_text('Order','ordering',$order,'10');
    ?>
    <tr>
        <td colspan="2" style="padding-left: 490px;color:  #0B9DC8; font-weight:  bold; font-size: 10px;">Card Order <span style="padding-left: 30px;">Featured</span></td>        
    </tr>
    <tr>

		<td class="td_left" valign=top>
			Select Cards		</td>
		<td class="td_right">
            
            <? $x2=0;$holdcards=array(
            'top'=>"",
            'reg'=>""
            );
               
                foreach ($list_cards as  $key => $card) {
                //print_r($card);
                /*if($row['tbl_id']!=4 && is_array($ftdlist)){
                $holdc=(array_key_exists($card->OfferId,$ftdlist))?'top':'reg';
                }else{$holdc='reg';}
                */
                $holdc="reg";
                $holdcards[$holdc].="
            
                <div style=\"width: 400px;float: left;\"><input size=\"40\" type=\"checkbox\" name=\"cards[]\" ";
                   if($cards) {
                    if(in_array($card->OfferId, $cards)){
                    $holdcards[$holdc].= " checked ";
                    }
                   }      
                $holdcards[$holdc].="id=\"".$card->OfferId."\" value=\"".$card->OfferId."\"/><label for=\"".$card->OfferId."\">".$card->OfferName."</label>
               </div>
               <div >
                <input size=\"5\" type=\"text\" name=\"sapxep[]\" id=\"".$card->OfferId."\" value=\"";
                
                    if($sapxeps && $cards) {
                    if(in_array($card->OfferId, $cards)){
                    $holdcards[$holdc].= $sapxeps[$key];
                    }
                   }   
                $holdcards[$holdc].="\" />";
            if($row['tbl_id']!=4){
              $holdcards[$holdc].="<span style=\"margin-left: 45px;\">
                <input  type=\"radio\" name=\"featured\" id=\"featuredx[$x2]\" value=\"".$card->OfferId."\""; 
                if($card->OfferId==$row['featured']){ $holdcards[$holdc].=" checked  ";}
                
                $holdcards[$holdc].=" />";
               $holdcards[$holdc].="</span>";
               if($holdc=='top'):
				$thetopname=(isset($top_list_names[$card->OfferId]))?$top_list_names[$card->OfferId]:"";
               $holdcards[$holdc].="<br>Top Name:<input type=text value=\"".$thetopname."\" size=50 name=\"top_name[".$card->OfferId."]\" />";
               endif;
             }
               $holdcards[$holdc].="</div>
                <br />";
            
            
                $x2++;}
                if($holdcards['top'] && $row['tbl_id']!=4){
                echo "<b>Best Cards</b><Br>".$holdcards['top'];
                }
                
                if($holdcards['reg'] && $row['tbl_id']!=4){
                echo $holdcards['reg'];
                }
                
                if($row['tbl_id']==4){
                echo $holdcards['top'].$holdcards['reg'];
                }

            ?>
            <?if($row['tbl_id']!=4){?>
            <script>
				function radioc(){
					 var i=0;     
     for (i=0; i < <?=$x2?>; i++) {
             if(document.getElementById('featuredx['+i+']')){
             document.getElementById('featuredx['+i+']').checked=false;}
				}}
            </script>
            
             <div >
                       
              <span style="margin-left: 485px;">
                <input type=button value=clear onClick=radioc();>
               </span>
               </div>
                <br />
          <?}else{?>
			 <input  type="hidden" name="featured" value="">
          <?}?>
		
		</td>
	</tr>
    <?
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','Quality name cannot be blank.');
			echo $check->check_blank('alias','SEO URL cannot be blank.');
			echo $check->check_number('ordering','Order must be a number and cannot be blank.');
		
		?>
	}
</script>