if (!$) {
	var $ = function(e) {
		return document.getElementById(e) ;
	}
}
function getCookie(name) {
	var search = name + "=";
	var offset = document.cookie.indexOf(search);
	if (offset != -1) {
		offset += search.length;
		var end = document.cookie.indexOf(";", offset);
		if (end == -1)
			end = document.cookie.length;
		return unescape(document.cookie.substring(offset, end));
	}
	else return "";
}

function switchTab(identify,index,count) {
	for(i=0;i<count;i++) {
		var CurTabObj = document.getElementById("Tab_"+identify+"_"+i) ;
		var CurListObj = document.getElementById("List_"+identify+"_"+i) ;
		if (i != index) {
			fRemoveClass(CurTabObj , "upH2") ;
			fRemoveClass(CurListObj , "upBox") ;
		}
	}
	try {
		for (ind=0;ind<CachePic['recommend'][index].length ;ind++ ) {
			var picobj = document.getElementById("recommend_pic_"+index+"_"+ind) ;
			//if (picobj.src == "http://images.movie.xunlei.com/img_default.gif") {
				picobj.src = CachePic['recommend'][index][ind] ;
			//}
		}
	}
	catch (e) {}
	
	fAddClass(document.getElementById("Tab_"+identify+"_"+index),"upH2") ;
	fAddClass(document.getElementById("List_"+identify+"_"+index),"upBox") ;
}

function fAddClass(XEle, XClass) {
  if(!XClass) throw new Error("XClass 不能为空!");
  if(XEle.className!="") {
    var Re = new RegExp("\\b"+XClass+"\\b\\s*", "");
    XEle.className = XEle.className.replace(Re, "");
	var OldClassName = XEle.className.replace(/^\s+|\s+$/g,"") ;
	if (OldClassName == "" ) {
		 XEle.className = XClass;
	}
	else {
		XEle.className = OldClassName + " " + XClass;
	}
  }
  else XEle.className = XClass;
}

function fRemoveClass(XEle, XClass) {
  if(!XClass) throw new Error("XClass 不能为空!");
  var OldClassName = XEle.className.replace(/^\s+|\s+$/g,"") ;
  if(OldClassName!="") {
    var Re = new RegExp("\\b"+XClass+"\\b\\s*", "");
    XEle.className = OldClassName.replace(Re, "");
  }
}

function _getCookie(name){
	return (document.cookie.match(new RegExp("(^"+name+"| "+name+")=([^;]*)"))==null)?"":decodeURIComponent(RegExp.$2);
}

String.prototype.len=function() {                 
	return this.replace(/[^\x00-\xff]/g,"rr").length;          
}
String.prototype.sub = function(n) {
	var r = /[^\x00-\xff]/g;
	if(this.replace(r, "mm").length <= n) return this;
	var m = Math.floor(n/2);
	for(var i=m; i<this.length; i++) {
		if(this.substr(0, i).replace(r, "mm").length>=n) {
			return this.substr(0, i) + "..." ;
		}
	}
	return this;
}
function setCookie(name, value, hours){
	var expireDate=new Date(new Date().getTime()+hours*3600000);
	document.cookie = name + "=" + escape(value) + "; path=/; domain=xunlei.com; expires=" + expireDate.toGMTString() ;
}
function delCookie(name) {
	var expireDate=new Date(new Date().getTime());
	document.cookie = name + "= ; path=/; domain=xunlei.com; expires=" + expireDate.toGMTString() ;
}

//向左滚动
ScrollCrossLeft={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft.doit=function(obj,b,c,d){
	BigNews.OnScrolling = true ;
	var s=ScrollCrossLeft;
	obj.style.marginLeft=cpu(s.count,b,c,d)+'px';
	s.count++;
	if(s.count==d){
		clearInterval(s.interval);
		s.count=0;
		obj.style.marginLeft=b+c+'px';
		s.callback();
		BigNews.OnScrolling = false ;
	}
	function cpu(t,b,c,d) {return c*((t=t/d-1)*t*t+1)+b;};
}
ScrollCrossLeft2={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft2.doit_2=function(obj,b,c,d){
	var ss=ScrollCrossLeft2;
	obj.style.marginLeft=cpu(ss.count,b,c,d)+'px';
	ss.count++;
	if(ss.count==d){
		clearInterval(ss.interval);
		ss.count=0;
		obj.style.marginLeft=b+c+'px';
		ss.callback();
	}
	function cpu(t,b,c,d) {return c*((t=t/d-1)*t*t+1)+b;};
}
ScrollCrossLeft2.scroll=function(obj,step,span,beign,callback,duration){
	var ss=ScrollCrossLeft2;
	ss.duration=duration;
	ss.callback=callback;
	ss.interval=setInterval(function(){ss.doit_2(obj,beign,step*span,duration)},10);
}

var B=BigNews={
	current:0,
	next:0,
	scrollInterval:0,
	autoScroller:0,
	s:{},
	OnScrolling:false
};
BigNews.turn=function(index,obj){
	if (BigNews.OnScrolling) {
		return false ;
	}
	clearInterval(BigNews.autoScroller);
	BigNews.scroll(index,obj);
}
BigNews.scroll=function(index,obj){
	
	var count=0;
	var step=obj.step;
	var duration=16;
	var b=BigNews;
	b.next=index;
	if(index!=b.current&&count>duration/8){
		return;
	}
	try { clearInterval(BigNews.s.interval);}catch(e){}
	
	if(obj.pictxt!=null && obj.pictxt!="")	
		$(obj.pictxt+"_"+index).style.display = "block" ;
	var span=-index+b.current;
	var begin_value=$(obj.bigpic).scrollLeft;
	var chang_in_value=span*step+(b.current*step-begin_value);

	//var s=ScrollCrossLeft;
	BigNews.s.duration=duration;
	BigNews.s.callback=cb;
	var beign = parseInt($(obj.bigpic).style.marginLeft)||0 ;
	// load images
	if ($("bigpic_"+index).src == 'http://images.movie.xunlei.com/img_default.gif') {
			try {
				$("bigpic_"+index).src = ScrollBigPic[index] ;
			}
			catch (e) {}
			
	}
	BigNews.s.interval=setInterval(function(){BigNews.s.doit($(obj.bigpic),beign,step*span,duration)},10);

	function cb() {
		BigNews.current=index;
		showTitles(index) ;
	}
	function showTitles(index) {
		for (i=0;i<obj.totalcount;i++) {
			if (i == index) {
				$("big_pic_title_desc_"+i).style.display = "block" ;
				$("big_pic_nav_"+i).className = "on" ;
			}
			else {
				$("big_pic_title_desc_"+i).style.display = "none" ;
				$("big_pic_nav_"+i).className = "" ;
			}
		}
		// next & pre btn
		if (index == 0) { $("big_pic_pre_btn").className = "no" ; } else { $("big_pic_pre_btn").className = "" ; }
		if (index == obj.totalcount - 1) { $("big_pic_next_btn").className = "nextno" ; } else { $("big_pic_next_btn").className = "next" ; }
	}
}
BigNews.auto=function(obj){
	clearInterval(BigNews.autoScroller);
	BigNews.autoScroller=setInterval(function(){
		BigNews.scroll(BigNews.current==(obj.totalcount-1)?0:BigNews.current+1,obj);
	},obj.autotimeintval);
}
BigNews.pauseSwitch = function() {	
	clearTimeout(BigNews.autoScroller);
}
BigNews.showNext = function(current,obj) {	
	if (current >=  MovieRecom.totalcount -1) {
		document.body.focus();
		return false ;
	}
	else {
		BigNews.pauseSwitch();
		BigNews.turn(current+1,obj);
		BigNews.auto(obj);
		document.body.focus();
	}
	
}
BigNews.showPre = function(current,obj) {
	if (current <=  0) {
		document.body.focus();
		return false ;
	}
	else {
		BigNews.pauseSwitch();
		BigNews.turn(current-1,obj);
		BigNews.auto(obj);
		document.body.focus();
	}
	
}
BigNews.init=function(obj){
	BigNews.s=ScrollCrossLeft;
	$(obj.bigpic).onmouseover = new Function("BigNews.pauseSwitch();") ;		
	$(obj.bigpic).onmouseout = new Function("BigNews.auto("+obj.objname+");") ;	
	for (i=0;i<obj.totalcount;i++) {	
		if(obj.smallpic!=null && obj.smallpic!="") {
		 $(obj.smallpic+"_"+i).onclick = new Function("setTimeout('BigNews.pauseSwitch();BigNews.turn("+i+","+obj.objname+");BigNews.auto("+obj.objname+");document.body.focus();return false;',50)") ;		
		 //$(obj.smallpic+"_"+i).onclick = new Function("BigNews.auto("+obj.objname+");") ;	
		}
	}
	$("big_pic_pre_btn").onclick = new Function("setTimeout('BigNews.showPre(BigNews.current,"+obj.objname+");return false;',50)") ;
	$("big_pic_next_btn").onclick = new Function("setTimeout('BigNews.showNext(BigNews.current,"+obj.objname+");return false;',50)") ;
	BigNews.auto(obj);
}

var Turn={}
Turn.pre=function(obj){
	if(obj.current==0){
		return;
	}else{
		Turn.go(obj,obj.current-1);
	}
}
Turn.next=function(obj){
	if(obj.current==2){
		return;
	}else{
		Turn.go(obj,obj.current+1);
	}
}
Turn.go=function(obj,index){
	if(obj.current==index){return;}
	var span=-index+obj.current;
	if(obj.clickflag > 0){return;}
	obj.clickflag=1;
	if(obj.step>0) {
		try {
			//showImage(index) ;
			if (obj.img) {
				setTimeout( function () {
							for (cnt=index*5;cnt<=((index+1)*5 -1 );cnt++ ) {
								var picobj = document.getElementById(obj.div　+ "_pic_" + cnt) ;
								//alert(obj.div　+ "_pic_" + cnt) ;
								//alert(obj.img[cnt]) ;
								//if (picobj.src == "http://images.movie.xunlei.com/img_default.gif"){
									picobj.src = obj.img[cnt] ;
								//}
							}
						}, 50) ;
			}
		}
		catch (e){}
		//ScrollCrossLeft2.callback = cb() ;
		ScrollCrossLeft2.scroll($(obj.div),obj.step,span,parseInt($(obj.div).style.marginLeft)||0,cb,10);
	}
	else{
		displayNOrY();
		cb();	
	}
	document.body.focus() ;
	function showImage() {
		for (cnt=index*6;cnt<=((index+1)*6 -1 );cnt++ ) {
			var picobj = document.getElementById(obj.div　+ "_pic_" + cnt) ;
			//alert(obj.img[cnt]) ;
			if (picobj.src == "http://images.movie.xunlei.com/img_default.gif"){
				picobj.src = obj.img[cnt] ;
			}
		}
	}
	function imgSrc(index,id){
		var arr_img=$(id+'_'+index).getElementsByTagName('img');
		for(var i=0;i<6;i++){
			arr_img[i].src=obj.imgs[index-1][i];
		}
	}
	function cb(){
		obj.current=index;
		obj.clickflag=0;
		for(var i=0;i<3;i++){
			$(obj.a+i).className='';
		}
		$(obj.a+index).className='currA';
	}
	function displayNOrY(){
		obj.current=index;
		for(var i=0;i<3;i++){
			if(i==index)
				$(obj.ul+'_'+i).style.display='block';
			else
				$(obj.ul+'_'+i).style.display='none';
		}
	}
}

var MiniSite=new Object();
MiniSite.Browser={
    ie:/msie/.test(window.navigator.userAgent.toLowerCase()),
    moz:/gecko/.test(window.navigator.userAgent.toLowerCase()),
    opera:/opera/.test(window.navigator.userAgent.toLowerCase()),
    safari:/safari/.test(window.navigator.userAgent.toLowerCase())
};

MiniSite.JsLoader={
    load:function(sUrl,charset,fCallback){
        var _script=document.createElement('script');
        _script.setAttribute('charset',charset);
        _script.setAttribute('type','text/javascript');
        _script.setAttribute('src',sUrl);
        document.getElementsByTagName('head')[0].appendChild(_script);
        if(MiniSite.Browser.ie){
            _script.onreadystatechange=function(){
                if(this.readyState=='loaded'||this.readyState=='complete'){
                    //fCallback();
					//setTimeout(fCallback, 50);
					setTimeout(function(){try{fCallback();}catch(e){}}, 50);
                }
            };
        }else if(MiniSite.Browser.moz){
            _script.onload=function(){
                //fCallback();
				//setTimeout(fCallback, 50);
				setTimeout(function(){try{fCallback();}catch(e){}}, 50);
            };
        }else{
            //fCallback();
			//setTimeout(fCallback, 50);
			setTimeout(function(){try{fCallback();}catch(e){}}, 50);
        }
    }
};