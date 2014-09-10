/**
* YPG autolink tracking
**/
var autotag = true;
window.onload = LOAD;
function LOAD(){
	if(autotag){
		if(isIE()){
			//auto tag all link for IE
			for(var i = 0; i < document.links.length; i++) {
				var link=document.links[i];
				link.attachEvent("onclick",
					function(value){
						return function(){
							var anchortext = document.links[value].firstChild.data;
							if(!anchortext){
								imgs=document.links[value].getElementsByTagName("img");
								var imgSrc=imgs[0].src;
								if(imgSrc)
									anchortext= "-img-"+returnDocument(imgSrc);
								else anchortext="-none-";
							}
							sendTag(stripSpace(anchortext),"alt")();
							}
						}(i)
					);
			}
		}
		else{ // others browser
			for(var i = 0; i < document.links.length; i++) {
				var link=document.links[i];
				link.addEventListener("click",
					function(value){
						return function(){
							var anchortext = stripSpace(document.links[value].text);
							if(!anchortext){
								var imgSrc=document.links[value].getElementsByTagName("img")[0].src;
								if(imgSrc)
									anchortext= "-img-"+returnDocument(imgSrc);
								else anchortext="-none-";
							}
							sendTag(anchortext,"alt")();
						}
					}(i),false);
			}
		}
	}
}
function sendTag(lid,lpos){return function(){utag.link({link_name:lid, link_attr1:lpos})};} //closure du sendtag
function isIE(){return /msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent);}
function stripSpace(text){return text.replace(/\s{2,}/g,' ');}
function returnDocument(url){
   if (url){
      var m = url.toString().match(/.*\/(.+?)\./);
      if (m && m.length > 1){
         return m[1];
      }
   }
   return "";
}
