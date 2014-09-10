function getData(dataSource, divID){
	 var XMLHttpRequestObject = false;
	 var myobj = document.getElementById(divID);
	 if (!myobj){
	 return;
	}
	 if(dataSource == ""){
	 return false;
	 }
	 myobj.innerHTML = '<img src="../images/refresh_d.gif"> Checking...';
	 if (window.XMLHttpRequest) {
	 XMLHttpRequestObject = new XMLHttpRequest();
	 }
	 else if (window.ActiveXObject) {
	 XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
	 }
	 if(XMLHttpRequestObject) {
	 XMLHttpRequestObject.open("GET", dataSource);
	 XMLHttpRequestObject.onreadystatechange = function()
	 {
	 if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
	 myobj.innerHTML = XMLHttpRequestObject.responseText;
	 }
	 }
	 XMLHttpRequestObject.send(null);
	 }
}
function confirmdel(){
	if(confirm('Are you sure delete?'))
		{
		return true;
		}
	else
		{
		return false;
		}
}/*
function is_checked(isitchecked){
	if (isitchecked == true){
		document.admin_form.boxchecked.value++;
	}
	else {
		document.admin_form.boxchecked.value--;
	}
}
*/
// Su kien check all 
function checkall( n, fldName ) {
  if (!fldName) {
     fldName = 'cb';
  }
	var f = document.admin_form;
	var c = f.toggle.checked;
	var n2 = 0;
	for (i=0; i < n; i++) {
		cb = eval( 'f.' + fldName + '' + i );
		if (cb) {
			cb.checked = c;
			n2++;
		}
	}
	/*
	if (c) {
		document.admin_form.boxchecked.value = n2;
	} else {
		document.admin_form.boxchecked.value = 0;
	}*/
}
// doi the hidden de submit
function change_hidden(input){
	document.admin_form.option.value = input;
}
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
}
function dochange(module,val,cat) {
	var src = 'cities';
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //retuen value
               } 
          }
     };
     req.open("GET", "../includes/getcategory.php?module="+module+"&cha="+val+"&cat="+cat); //make connection
//     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
     req.send(null); //send value
}
function seourl(){
	var str = document.admin_form.name.value;
	str= str.toLowerCase();
 str= str.toLowerCase();  
   str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
   str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
   str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
   str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
   str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
   str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
   str= str.replace(/đ/g,"d");  
   str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-"); 
 /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */ 
   str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
   str= str.replace(/^\-+|\-+$/g,"");   //cắt bỏ ký tự - ở đầu và cuối chuỗi   

	document.admin_form.alias.value = str;
}