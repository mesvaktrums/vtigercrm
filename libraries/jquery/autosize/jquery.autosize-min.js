// Autosize 1.14 - jQuery plugin for textareas
// (c) 2012 Jack Moore - jacklmoore.com
// license: www.opensource.org/licenses/mit-license.php
(function(e){var t={className:"autosizejs",append:"",callback:!1},n="hidden",r="border-box",i="lineHeight",s='<textarea tabindex="-1" style="position:absolute; top:-9999px; left:-9999px; right:auto; bottom:auto; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden;"/>',o=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],u="oninput",a="onpropertychange",f=e(s)[0];f.setAttribute(u,"return"),e.isFunction(f[u])||a in f?(e(f).css(i,"99px"),e(f).css(i)==="99px"&&o.push(i),e.fn.autosize=function(i){return i=e.extend({},t,i||{}),this.each(function(){function b(){var e,r,s;p||(p=!0,l.value=t.value+i.append,l.style.overflowY=t.style.overflowY,s=parseInt(t.style.height,10),l.style.width=f.css("width"),l.scrollTop=0,l.scrollTop=9e4,e=l.scrollTop,r=n,e>h?(e=h,r="scroll"):e<c&&(e=c),e+=m,t.style.overflowY=r,s!==e&&(t.style.height=e+"px",y&&i.callback.call(t)),setTimeout(function(){p=!1},1))}var t=this,f=e(t),l,c=f.height(),h=parseInt(f.css("maxHeight"),10),p,d=o.length,v,m=0,g=t.value,y=e.isFunction(i.callback);if(f.css("box-sizing")===r||f.css("-moz-box-sizing")===r||f.css("-webkit-box-sizing")===r)m=f.outerHeight()-f.height();if(f.data("mirror")||f.data("ismirror"))return;l=e(s).data("ismirror",!0).addClass(i.className)[0],v=f.css("resize")==="none"?"none":"horizontal",f.data("mirror",e(l)).css({overflow:n,overflowY:n,wordWrap:"break-word",resize:v}),h=h&&h>0?h:9e4;while(d--)l.style[o[d]]=f.css(o[d]);e("body").append(l),a in t?u in t?t[u]=t.onkeyup=b:t[a]=b:(t[u]=b,t.value="",t.value=g),e(window).resize(b),f.bind("autosize",b),b()})}):e.fn.autosize=function(e){return this}})(jQuery);