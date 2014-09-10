//ut.wss.2.2.130503.70
//v.6.20110110
//tealium universal tag - utag.sender.dealer utut2.2.20101006.0000, Copyright 2010 Tealium.com Inc. All Rights Reserved.
try{
    
utag.sender["dealer"].cs=(function(u){
    u=utag.sender.dealer;
	
    //u.server = "http://hitsypg.dealer.com/clear.gif";
	
    u.server = utag.cfg["yp_site"];
	//u.server_dealer = utag.cfg["dealer_site"];	//remove this line after migration
	
	u.ck = "utag_dealer";
    
    u.session=1800000;

    u.i=new Array();
	//u.i_dealer=new Array();//remove this line after migration
    
    /*define tracked events*/
    u.ev={all:1,form:0}
  
    /*define variable map*/
    u.map={
        "cp.formabandon":"formabandon"
    }

    /*add extend functions*/
    u.extend.push(
        function(o,a,b,c,d,r,t){

            c=utag.handler.RC(u.ck);
            t=(new Date()).getTime();
            r=eval("document.r"+"eferrer");
            r=r.length==0?"u":r;

            utag.handler.AO(b,{_ev:a,_vi:c._vi,_fs:c._fs,_ss:1,_sc:c._sc,_du:document.URL,_dr:r})
 
            if(c["_vi"]==null){
                utag.handler.AO(b,{_vi:o.vi(t),_fs:t,_cs:t,_sc:1,_vd:o.gd(r),_sr:r,_sd:o.gd(r),_evc:1,_ec:1});
                utag.handler.SC(u.ck,{_vi:b._vi,_vr:b._vr},"i");
                utag.handler.SC(u.ck,{_fs:t,_cs:t,_sc:1,_evc:1,_ec:1});
            }else if(c._cs==null||(t-(c._ts-0))>u.session){
                b._cs=t;
                utag.handler.AO(b,{_cs:t,_sc:(c._sc-0)+1,_vr:c._vr,_vd:o.gd(b._vr),_sr:r,_sd:o.gd(r),_evc:1,_ec:1});               
                utag.handler.SC(u.ck,{_cs:t,_ec:1,_evc:1});
                utag.handler.SC(u.ck,{_sc:1},"a")
            }else{
                b._cs=c._cs;
                b._ir=r;
                b._id=o.gd(r);
                b._ss="0";
                d={_ec:1};
                if(a=="view"){
                    d._evc=1;
                    b._evc=(c._evc-0)+1;
                }
                b._ec=(c._ec-0)+1;
                utag.handler.SC(u.ck,d,"a");
            }
            b._nv=(b._sc==1)?1:0;
            utag.handler.SC(u.ck,{_ts:t});        
        }
        
    );

    u.extend.push(
        function(o,a,b,c,d){
            if(b.listing_link){
                var tmp = b.listing_link.replace(/_r$/,"");
                c=(tmp.split("|"))[1];
                if(c){
                    d=c.lastIndexOf("_");
                    if(d>0)
                        b.click_type = c.substring(0,d);
                }
            } 
        }
    );
    
    /*define send function*/
    u.send=function(a,b,c,d,e,f){
        if((u.ev[a]||typeof u.ev["all"]!="undefined")&&u.ev[a]!=0){
            for(c=0;c<u.extend.length;c++){
                try{
                    d=u.extend[c](u,a,b);if(d==false)return
                }catch(e){}
            };
            if(typeof u.server!="undefined"){
                c=[];
                
                var lrgVars={
                    directory:(b.directory) ? b.directory.length : 0,
                    mlr:(b.mlr) ? b.mlr.length : 0
                };
                for(d in b){
                    if(typeof b[d]!="function"&&(d.indexOf(".")<0||typeof u.map[d]!="undefined")&&typeof lrgVars[d]=="undefined")c.push(((typeof u.map[d]!="undefined")?u.map[d]:d)+"="+escape(b[d]));
                }
                d=u.server;
				//d_dealer = u.server_dealer;//remove this line after migration
                b._ri=Math.random();
                c.push("_ri="+b._ri);
                d+=((d.indexOf("?")>0)?"&":"?")+c.join("&");
				//d_dealer+=((d_dealer.indexOf("?")>0)?"&":"?")+c.join("&");//remove this line after migration
                u.i.push(new Image());
				//u.i_dealer.push(new Image());//remove this line after migration
                
                if(!b.mlr && !b.directory){
                    u.i[u.i.length-1].src=d;  
					//u.i_dealer[u.i_dealer.length-1].src=d_dealer;//remove this line after migration					
                }else{
                    //if mlr and directory can be sent, send them
                    if((d.length+lrgVars.directory+lrgVars.mlr) < 2000){
                        u.i[u.i.length-1].src=d+(b.mlr?"&mlr="+escape(b.mlr):"")+(b.directory?"&directory="+escape(b.directory):"");
						//u.i_dealer[u.i_dealer.length-1].src=d_dealer+(b.mlr?"&mlr="+escape(b.mlr):"")+(b.directory?"&directory="+escape(b.directory):"");//remove this line after migration
                        return;
                                            
                    //if only directory can be sent
                    }else if(b.directory && (d.length+lrgVars.directory) < 2000){
                        u.i[u.i.length-1].src=d+"&_rir=1&directory="+escape(b.directory);
						//u.i_dealer[u.i_dealer.length-1].src=d_dealer+"&_rir=1&directory="+escape(b.directory);//remove this line after migration
                        delete lrgVars.directory;

                    //if only mlr can be sent
                    }else if(b.mlr && (d.length+lrgVars.mlr) < 2000){
                        u.i[u.i.length-1].src=d+"&_rir=1&mlr="+escape(b.mlr);
						//u.i_dealer[u.i_dealer.length-1].src=d_dealer+"&_rir=1&mlr="+escape(b.mlr);//remove this line after migration
                        delete lrgVars.mlr;
                    
                    //else we're going to send multiple requests so send the initial request
                    }else{
                        u.i[u.i.length-1].src=d+"&_rir=1";
						//u.i_dealer[u.i_dealer.length-1].src=d_dealer+"&_rir=1";//remove this line after migration
                    }
                    
                    b._rir=2;
                    
                    var imgs=[];
					//var imgs_dealer=[];	//remove this line after migration
                    for(var i in lrgVars){
                        if(typeof lrgVars[i]!="function"&&typeof b[i]!="undefined"){

                            var x=b[i];
                            do{
                                e=x.indexOf(",",1600);
                                if(e>0){
                                   f=x.substring(0,e);
                                   x=x.substring(e+1);
                                }else{
                                    f=x;
                                    x="";
                                }
                            
                                d=u.server;
								//d_dealer=u.server_dealer;//remove this line after migration
                                c=[]
                                c.push("_vi="+b._vi, "_cs="+b._cs, "_ri="+b._ri, "_rir="+b._rir++ ,i+"="+escape(f));
                                d+=((d.indexOf("?")>0)?"&":"?")+c.join("&");
								//d_dealer+=((d_dealer.indexOf("?")>0)?"&":"?")+c.join("&");//remove this line after migration
                                imgs.push(d);
								//imgs_dealer.push(d_dealer);//remove this line after migration
                            }while(f.length > 1600);
                        }
                    }
                    
                    imgs[imgs.length-1]+="&_ris=last";
                    for(var i=0;i<imgs.length;i++){
                        f=u.i.push(new Image());
                        u.i[f-1].src=imgs[i];
                    }
					//remove the following lines after migration
					imgs_dealer[imgs_dealer.length-1]+="&_ris=last";
					for(var i=0;i<imgs_dealer.length;i++){
						f=u.i_dealer.push(new Image());
						u.i_dealer[f-1].src=imgs_dealer[i];
					}
					//end					
                }                
            }
        };
    }        
})();

utag.sender.dealer.gd=function(a,b){if(!a||a=="u")return "u";b=a.split("/");return b.length>1?b[2]:"u"}
utag.sender.dealer.vi=function(t,a,b){
    a=this.pad(t,12);
    b=""+Math.random();
    a+=this.pad(b.substring(2,b.length),16);
    a+=this.pad((navigator.plugins.length?navigator.plugins.length:0),2);
    a+=this.pad(navigator.userAgent.length,3);
    a+=this.pad(document.URL.length,4);
    a+=this.pad(navigator.appVersion.length,3);
    a+=this.pad(screen.width+screen.height+parseInt((screen.colorDepth)?screen.colorDepth:screen.pixelDepth),5);
    return a
};

utag.sender.dealer.pad=function(a,b,c,d){a=""+((a-0).toString(16));d='';if(b>a.length){for(c=0;c<(b-a.length);c++){d+='0'}}return ""+d+a};

}catch(e){};
//end tealium universal tag

try{utag.loader.LOAD("dealer")}catch(e){}
