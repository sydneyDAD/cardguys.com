//v.1
//tealium universal tag - handler ut2.2.20101019, Copyright 2010 Tealium.com Inc. All Rights Reserved.

utag.handler={
  ns:"utag_main",
  domain:utag.cfg["domain"],
  base:"page,section,what_where",

  df:{},
  o:{},
  extend:[],
  send:{},
  iflag:0,
  INIT:function(a,b,c){utag.handler.iflag=1;a=utag.loader.q.length;if(a>0){for(b=0;b<a;b++){c=utag.loader.q[b];utag.handler.trigger(c.a,c.b)}}},
  C:function(a,b,c,d){b={};for(c in a){if(typeof a[c]!="function")b[c]=a[c]}return b},

  test:function(){return 1},
  trigger: function(a,b,c,d){
    if(!this.iflag)utag.loader.q.push({a:a,b:b});
    
    //base defaults
    for(c in this.df){if(typeof this.df[c]!="function"&&typeof b[c]=="undefined")b[c]=this.df[c]}
    
    //invoke handler extend functions
    for(c=0;c<this.extend.length;c++){try{this.extend[c](a,b)}catch(e){}};

    //invoke send functions
    for(c in utag.sender){if(typeof utag.sender[c]!="undefined"){try{utag.sender[c].send(a,this.C(b))}catch(e){}}}

    //set base defaults
    c=this.base.split(",");for(d=0;d<c.length;d++){if(typeof b[c[d]]!="undefined")this.df[c[d]]=b[c[d]]}
    this.o=b;
  },

  //a token, b leading token, c default value for empty values
  CONCAT:function(a,b,c,d,e,f){f=[];if(typeof d=="object"){for(e=0;e<d.length;e++){if(typeof d[e]=="undefined"||d[e]==null||d[e]==""){if(c!="")f.push(c)}
  else f.push(d[e])}return ((b)?a:"")+f.join(a)}return ""},
  RCV:function(a,b,c,d){b=document.cookie;c=b.indexOf(a+"=");d="";if(c>-1){d=b.indexOf(";",c+1);d=(d>0)?d:b.length;d=(d>c)?b.substring(c+a.length+1,d):""}return d},
  GET:function(a,b,c,d,e){b={cp:{},o:{},meta:{},qp:{}};for(c in this.o){if(typeof this.o[c]!="function"){if(c.indexOf("cp.")==0)b.cp[c.substring(3)]=this.o[c];
  else if(c.indexOf("qp.")==0)b.qp[c.substring(3)]=this.o[c];else if(c.indexOf("meta.")==0)b.meta[c.substring(5)]=this.o[c];else b.o[c]=this.o[c]}}if(a==null)return b;
  d={cp:{},o:{},meta:{},qp:{}};for(c=0;c<a.length;c++){e=a[c].split(".");if(e.length==1)d.o[e[0]]=b.o[e[0]];else d[e[0]][e[1]]=b[e[0]][e[1]]}return d},
  TQ:function(a,b,c){b=[];for(c in a){if(typeof a[c]!="function")b.push(c+"="+escape(a[c]))}return b.join("&")},
  
  GV:function(a,b,c){b={};for(c in a){if(typeof a[c]!="function")b[c]=a[c];}return b},

  RC: function(a, x, b, c, d, e, f, g, h, i, j, k, l, m, n, o, v) {
    o = {};
    b = ("" + document.cookie != "") ? (document.cookie).split("; ") : [];
    for (c = 0; c < b.length; c++) {
      d = b[c].split("=");
      e = unescape(d[1]);
      if (d[0].indexOf("ulog") == 0 || d[0].indexOf("utag_") == 0) {
        e = e.split("$");
        g = [];
        j = {};
        for (f = 0; f < e.length; f++) {
          g = e[f].split(":");
          if (g.length > 2) {
            g[1] = g.slice(1).join(":");
          }
          v = "";
          if (("" + g[1]).indexOf("~") == 0) {
            h = g[1].substring(1).split("|");
            for (i = 0; i < h.length; i++) h[i] = unescape(h[i]);
            v = h
          } else v = unescape(g[1]);
          j[g[0]] = v
        }
        o[d[0]] = {};
        e = (new Date()).getTime();
        for (f in utag.handler.GV(j)) {
          if (j[f] instanceof Array) {
            n = [];
            for (m = 0; m < j[f].length; m++) {
              if (j[f][m].match(/^(.*);exp-(.*)$/)) {
                k = parseInt(RegExp.$2);
                if (k == "session") {
                  k = (typeof j._st != "undefined") ? j._st: e - 1;
                }
                if (k > e) n[m] = (x == 0) ? j[f][m] : RegExp.$1;
              }
            }
            j[f] = n.join("|");
          } else {
            j[f] = "" + j[f];
            if (j[f].match(/^(.*);exp-(.*)$/)) {
              k = parseInt(RegExp.$2);
              if (k == "session") {
                k = (typeof j._st != "undefined") ? j._st: e - 1;
              }
              j[f] = (k < e) ? null: (x == 0 ? j[f] : RegExp.$1);
            }
          }
          if (j[f]) o[d[0]][f] = j[f];
        }
      } else if (!utag.cl || utag.cl[d[0]] || utag.cl['_all_']) {
        o[d[0]] = e
      }
    }
    return (a) ? (o[a] ? o[a] : {}) : o;
  },
  SC: function(a, b, c, d, e, f, g, h, i, j, k, x, v) {
    if (!a) return 0;
    v = "";
    x = "Thu, 31 Dec 2099 00:00:00 GMT";
    if (c && c == "da") {
      x = "Thu, 31 Dec 2009 00:00:00 GMT";
    } else if (a.indexOf("utag_") != 0 && a.indexOf("ulog") != 0) {
      if (typeof b != "object") {
        v = b
      }
    } else {
      d = utag.handler.RC(a, 0);
      for (e in utag.handler.GV(b)) {
        f = "" + b[e];
        if (f.match(/^(.*);exp-(\d+)(\w)$/)) {
          g = (new Date()).getTime() + parseInt(RegExp.$2) * ((RegExp.$3 == "h") ? 3600000 : 86400000);
          f = RegExp.$1 + ";exp-" + g;
        }
        if (c == "i") {
          if (d[e] == null) d[e] = f;
        } else if (c == "d") delete d[e];
        else if (c == "a") d[e] = (d[e] != null) ? (f - 0) + (d[e] - 0) : f;
        else if (c == "ap" || c == "au") {
          if (d[e] == null) d[e] = f;
          else {
            if (d[e].indexOf("|") > 0) {
              d[e] = d[e].split("|")
            }
            g = (d[e] instanceof Array) ? d[e] : [d[e]];
            g.push(f);
            if (c == "au") {
              h = {};
              k = {};
              for (i = 0; i < g.length; i++) {
                if (g[i].match(/^(.*);exp-(.*)$/)) {
                  j = RegExp.$1;
                }
                if (typeof k[j] == "undefined") {
                  k[j] = 1;
                  h[g[i]] = 1;
                }
              }
              g = [];
              for (i in utag.handler.GV(h)) {
                g.push(i);
              }
            }
            d[e] = g
          }
        } else d[e] = f;
      }
      h = new Array();
      for (g in utag.handler.GV(d)) {
        if (d[g] instanceof Array) {
          for (c = 0; c < d[g].length; c++) {
            d[g][c] = escape(d[g][c])
          }
          h.push(g + ":~" + d[g].join("|"))
        } else h.push(g + ":" + escape(d[g]))
      };
      if (h.length == 0) {
        h.push("");
        x = ""
      }
      v = (h.join("$"));
    }
    document.cookie = a + "=" + v + ";path=/;domain=" + utag.cfg.domain + ";expires=" + x;
    return 1
  },
  AO:function(a,b,c){for(c in this.GV(b)){a[c]=b[c]}}
};

//meta, query and cookie extend
utag.handler.extend.push(function(a,b,c,d,e){var ev={view:1};if(typeof ev[a]!="undefined"){c=document.getElementsByTagName("meta");for(d=0;d<c.length;d++){
if(c[d].name&&c[d].name!="")b["meta."+c[d].name.toLowerCase()]=c[d].content.toLowerCase()}c=utag.handler.RC();for(d in c){if(typeof c[d]!="undefined")b["cp."+d]=c[d]}
c=location.search.toLowerCase();if(c.length>1){d=c.substring(1).split('&');for(c=0;c<d.length;c++){e=d[c].split("=");b["qp."+e[0]]=unescape(e[1])}}}});

//ut version
utag.handler.extend.push(function(a,b){b.utv=utag.cfg.v}); 

//debug
utag.handler.extend.push(function(a,b,c,d){c=utag.handler.RCV("utdebug");d="";if(c!=""){for(c in b){if(typeof b[c]!="undefined")d+="&"+c+"="+escape(b[c])}utag.DB("utdebug&utevent="+a+d)}});

//lowercase
utag.handler.extend.push(function(a,b,c){for(c in b){if(typeof b[c]!="undefined"&&typeof b[c]!="function"&&b[c].toLowerCase)b[c]=b[c].toLowerCase()}});

//strip-replace chars
utag.handler.extend.push(
  function(a,b,c,d,e,f,g){
    c=["&","'","#","$","%","^","*",":","!","<",">","~",";"];//strip
    d={" ":"+","\\":"-"};//replace
    for(e in b){if(typeof b[e]!="function"){for(f=0;f<c.length;f++){b[e]=(b[e].split(c[f])).join("")}for(f in d){if(typeof d[f]!="function"){b[e]=(b[e].split(f)).join(d[f])}}}}}
);

//custom
utag.handler.extend.push(
  function(a,b){
    if(typeof b.search_term!="undefined"&&typeof b.search_location!="undefined")
      b["what_where"]=utag.handler.CONCAT("_","","",[b.search_term,b.search_location]);
    if(a=="view")utag.last = b;
  },

  //form abandonment extension - form name:fieldname in cp.formabandon  
  function(a,b,c,d){
    if(a=="form")utag.handler.SC(utag.handler.ns,{formabandon:""},"d");
    else utag.handler.form();
  }
);

utag.handler.form=function(){
  if(typeof utag.handler.formf=="undefined"&&document.forms.length){    
  utag.handler.formf=1;utag.handler.SC(utag.handler.ns,{formabandon:""},"d");for(c=0;c<document.forms.length;c++){for(d=0;d<document.forms[c].elements.length;d++){
  utag.loader.EV(document.forms[c].elements[d],"change",function(a){a=document.all?window.event.srcElement:this;if(a.name)utag.handler.SC(utag.handler.ns,{formabandon:(a.form.name)?a.form.name+" - "+a.name:a.name})})}}
  }
}

utag.loader.EV(window,"load",utag.handler.form);
try{utag.loader.LOAD("handler")}catch(e){}
