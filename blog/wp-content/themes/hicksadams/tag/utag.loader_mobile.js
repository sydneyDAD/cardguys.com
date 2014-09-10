//ut.wss.2.2.130503.70
//v.1
//tealium universal tag - loader, Copyright 2010 Tealium.com Inc. All Rights Reserved.
if(typeof utag=="undefined"){
var utag={loader:{q:[],l:[],f:{},p:0,o:0,ol:0,
lh:function(a,b){a=""+location.hostname;b=a.split(".");return b.splice(b.length-2,2).join(".");},
A:function(a,b,c,d){if((typeof utag.cfg.noload!="undefined"&&utag.cfg.noload)||!a.load)return;if(a.send){
utag.sender[a.id]=a;utag.sender[a.id].extend=[]};if(a.sync)this.l.push(a);else this.f[a.id]=-1;b=document;
if(utag.beforeload[a.id])try{utag.beforeload[a.id]()}catch(e){};if(utag.cfg.v)a.src+=(a.src.indexOf("?")>0?"&":"?")+"utv="+utag.cfg.v;
if(a.load==2){b.write("<scr"+"ipt src='"+a.src+"'></scr"+"ipt>");}else{if(b.createElement){c=a.id;if(!b.getElementById(c)){
d=b.createElement('script');d.language='javascript';d.type='text/javascript';d.src=a.src;d.id=c;
if(document.attachEvent)d.onreadystatechange=function(){if(this.readyState=="loaded"||this.readyState=="complete")utag.loader.LOAD(this.id)};
else d.onload=function(){utag.loader.LOAD(this.id)};b.getElementsByTagName("head")[0].appendChild(d)}}}},
LOAD:function(a,b,c,d){if(this.f[a]==-1){this.f[a]=0;if(utag.load[a]){try{utag.load[a]()}catch(e){}}}
else{this.f[a]=0;c=this.l.length;for(b=this.p;b<c;b++){d=this.l[b];if(this.f[d.id]==0){this.f[d.id]=++this.p;if(utag.load[d.id]){
try{utag.load[d.id]()}catch(e){}}}else return}if(this.p==c&&this.o==0)this.o=1}},
EV:function(a,b,c,d){if(a.addEventListener){a.addEventListener(b,c,false)}else if(a.attachEvent){a.attachEvent(((d==1)?"":"on")+b,c)}}},

handler:{trigger:function(a,b){utag.loader.q.push({a:a,b:b})},test:function(){return 1}},
sender:{},dbi:[],DB:function(a){this.dbi.push((new Image()).src="//cdn.tealium.com/track.gif?utv=ut3&msg="+a)},
view:function(a){this.handler.trigger('view',a)},
link:function(a){this.handler.trigger('link',a)}
};

utag.cfg={
    v:"ut.wss.2.2.130503.70",
    sendpv:0,//enabled requires adding pagetag object to handler.onload utag.load call
    onloadwait:0,
    noload:0,
    forcetimeout:4000,
    domain:document.domain,
    ni_server:"//pt200233.unica.com/ntpagetag.gif",
    ni_serversecure:"//pt200233.unica.com/ntpagetag.gif",
    ni_site:"websites",
	yp_site:"http://ypghits.yellowpages.ca/clear.gif",
	//dealer_site:"http://hitsypg.dealer.com/clear.gif" //remove this line after migration
}

utag.beforeload={}

utag.load={
    handler:function(){utag.handler.INIT();if(utag.cfg.sendpv)utag.view(utag_data)}
}

utag.loader.cfg={
    "ni":         {load:1,send:1,sync:1,src:"../../tag/utag.ntpagetag.js"},
    "dealer":     {load:1,send:1,sync:1,src:"../../tag/utag.dealer.js"},
    "handler":    {load:1,send:0,sync:1,src:"../../tag/utag.handler.js"}
};

//config override - dev regex filter
utag.dev=new RegExp(/wss\.|wss-ec2\./);  //if we have wss. or wss-ec2, we consider it as a test server in the host name
if(utag.dev.test(""+location.hostname) || (typeof UTAG_ISTEST != 'undefined' && UTAG_ISTEST == true) ){
    utag.cfg.ni_site = "websites-test";
	utag.cfg.yp_site = "http://ypghits.yellowpages.ca/clear.gif"; //use this url temporarily for testing data
	//utag.cfg.dealer_site = "http://hitsypgtest.dealer.com/clear.gif";
    utag.loader.cfg.ni.src = "../../tag/utag.ntpagetag.js";
    utag.loader.cfg.handler.src = "../../tag/utag.handler.js";
}

utag.loader.FORCE=function(a,b,c){a=utag.loader.l;b=utag.loader.f;for(c=0;c<a.length;c++){if(typeof b[a[c].id]=="undefined"){delete utag.sender[a[c].id];utag.loader.LOAD(a[c].id)}}}
utag.loader.INIT=function(a){if(utag.loader.ol==1)return -1;utag.loader.ol=1;for(a in utag.loader.cfg){if(typeof utag.loader.cfg[a]!="function"){utag.loader.cfg[a].id=a;
utag.loader.A(utag.loader.cfg[a])}}if(utag.cfg["forcetimeout"]!=0)setTimeout(utag.loader.FORCE,utag.cfg["forcetimeout"]);return 1}

if(navigator.userAgent.indexOf("MSIE")>-1)utag.cfg["onloadwait"]=1;
if(!utag.cfg["onloadwait"])utag.loader.INIT();else utag.loader.EV(window,"load",function(a){utag.loader.INIT()}); 
}
