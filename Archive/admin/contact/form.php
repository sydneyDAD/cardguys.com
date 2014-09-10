<? if ( !defined('INCLUDED') ) { die("Access Denied");} ?>
<? if ($_GET['id']){
		$contact->edit();
		$row = $contact->detail();
}	
 // cam truy cap cua nhan vien
 if($_SESSION['permission'.$sitelink]!='administrator'){
    
    if($row['ma_nhanvien']!=$_SESSION['user_id']){
        
        die('Access diened.');
    }	       
        
 }
	echo $temp->title('Contact Information','');
	echo $temp->input_text('Contact Name','name',$row['name'],'40','','disabled');
	echo $temp->input_text('Email','email',$row['email'],'30','','disabled');
	echo $temp->input_text('Subject','subject',$row['subject'],'20','','disabled');
	echo $temp->input_text('Date','date',$row['date'],'35','','disabled');
	echo $temp->area_text('Content','content',$row['content'],'cols="60" rows ="5" disabled');
	echo $temp->td('<input type="button" onclick="javascript:window.history.back(1)" value="Back">');
//	echo $temp->submit();
?>

