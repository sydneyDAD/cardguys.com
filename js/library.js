showtime = 0;
function changtab(id,count,clear){
	for(i=1;i<=count;i++){
		document.getElementById('tab_'+i).className='menu_nomal';
	}
	document.getElementById('tab_'+id).className='menu_select';
	valueHtml = document.getElementById('content_'+id).innerHTML;
	//alert(removeHTMLTags(valueHtml));
	document.getElementById('tab_content').innerHTML = valueHtml;
	if(clear==1) clearInterval(showtime);
}
function tabdetail(id,count){
	for(i=1;i<=count;i++){
		document.getElementById('detail_'+i).className='tab_nomal';
		document.getElementById('description_'+i).style.display='none';
	}
	document.getElementById('detail_'+id).className='tab_select';
	document.getElementById('description_'+id).style.display='block';
}
function mouseout(id,count){
	showtime = setInterval(function() {changtab(id,count,1)},4000);
}