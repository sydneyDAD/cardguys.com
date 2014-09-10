<?
if(isset($_POST['submit']))
{
    $comment_blog->add_user();   
}
?>
<form method="post" action="" name="comment" onsubmit="return checkcomment();">
	<span id="view_comment_title" >Leave Your Comments</span>
		<table id="contact" style="margin-top: 30px;">
			<tr>			
				<td class="right" width="60%"><input name="name" size="20" title="<?=NAME?>"></td>
                <td class="left"><?=NAME?>:</td>
			</tr>
            <tr>			
				<td class="right"><input name="email" size="20" title="<?=EMAIL?>"></td>
                <td class="left"><?=EMAIL?> <span style="font-size: 10px; font-style: italic;">(email will not be published)</span></td>
			</tr>            
            <tr>			
				<td class="right"><input name="url" size="20" title="URL"></td>
                <td class="left">URL</td>
			</tr>
			<tr>				
				<td class="right">
					<textarea name="comments" rows="4" cols="20" title="<?=COMMENT_WRITE?>"></textarea>
				</td>               
			</tr>
			<input type="hidden" name="blog_id" value="<?=$blog_id?>">
            <input type="hidden" name="status" value="0">
			<tr>
				<td class="right">
					<input type="submit" title="<?=POST_COMMENT?>" name="submit" value="<?=POST_COMMENT?>" class="post_comment"/>					
				</td>
			</tr>
		</table>
	</form>
<script>
function checkcomment(){
	if (document.comment.name.value == ""){
	alert ("Enter your name, please");
	document.comment.name.focus();
	return false;
	}
	if (document.comment.email.value == ""){
	alert ("Enter your email, please");
	document.comment.email.focus();
	return false;
	}
	if (document.comment.url.value == ""){
	alert ("Enter url, please");
	document.comment.url.focus();
	return false;
	}
	if (document.comment.comments.value == ""){
	alert ("Enter comment, please");
	document.comment.comments.focus();
	return false;
	}
	return true;
}
</script>