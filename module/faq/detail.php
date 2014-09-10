<?php if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row = $faq->detail();
echo $template->title_content('Hỏi đáp');
?>
	<div style="margin: 10px 0 10px 10px;"><span style="color: red; font-weight: bold; ">Câu hỏi:</span> <?=$row['question']?> (<?=$row['email']?>)</div>
	<div style="margin: 10px 0 10px 10px;"> 
		<span style="color: blue; font-weight: bold; ">Trả lời:</span> <?=$row['answer']?>
	</div>
	<div style="color: #060299; font-weight: bold; margin: 10px 0 10px 10px;"><a href="javascript:history.back()">Quay lại</a></div>
    <div style="width: 100%; text-align: center;"><a class="xanhlacay" style="font-weight: bold;" href="<?= $sitelink ?>/<?=change_url('index.php?module=faq')?>">Gửi câu hỏi khác</a></div>
