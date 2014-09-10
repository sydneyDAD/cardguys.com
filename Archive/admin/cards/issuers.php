<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }

$list_cards = $credit_cards->lists_name();
$list_bankx=(array)$cards_bank->lists();

if ($_POST['option'] == 'add'){
	$cards_issuer->add();
}
if ($_POST['option'] == 'edit'){
	$cards_issuer->edit();
}
if ($_GET['id']){
	$row = $cards_issuer->detail();
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

$assign_bank='<select name="assign_bank">';
    $assign_bank.='<option value="">None</option>';
    if(is_Array($list_bankx) || is_object($list_bankx))
    {
        foreach($list_bankx as $rows)
        {
                $assign_bank.='<option value="'.$rows->tbl_id.'"';
                if(($rows->tbl_id)==$row['tbl_id'])
                {
                    $assign_bank.= " selected ";
                 }   
                $assign_bank.='>'.$rows->name.'</option>';
        }
    }
    $assign_bank.='</select> <b>This filed is mandatory</b>';
    

	echo $temp->title('Add New Card Issuer:');
	echo $temp->select_text('Assign Issuer',$assign_bank);
	echo $temp->input_text('Type Name','name',$row['name'],'40','text','onkeyup="seourl();"');	

    echo $temp->input_text('Status','status',$row['status']);
    echo $temp->title('<span style="color:black; font-size:11px;">Status is used to show on home page or hide card type ( select 0 to hide or 1 to show)</span>');
    echo $temp->input_text('Icon','file1','','40','file');
	echo $temp->input_text('','image',$row['image'],'','hidden');

    echo $temp->detail('destination',$row['destination'],'150px','basic','1','Description');
	echo $temp->input_text('Order','ordering',$order,'10');
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','Bank name cannot be blank.');
			echo $check->check_blank('alias','SEO URL cannot be blank.');
			echo $check->check_number('ordering','Order must be a number and cannot be blank.');
		
		?>
	}
</script>