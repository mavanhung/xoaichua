(()=>{function n(e){window.showAlert("alert-danger",e)}function o(e){var o="";$.each(e,function(e,t){""!==o&&(o+="<br />"),o+=t}),n(o)}window.showAlert=function(e,t){var o;e&&""!==t&&(o=Math.floor(1e3*Math.random()),e='<div class="alert '.concat(e,' alert-dismissible" id="').concat(o,'">\n                            <span class="close elegant-icon icon_close" data-dismiss="alert" aria-label="close"></span>\n                            <i class="elegant-icon icon_')+("alert-success"===e?"info":"error-circle_alt")+' message-icon"></i>\n                            '.concat(t,"\n                        </div>"),$("#alert-container").append(e).ready(function(){window.setTimeout(function(){$("#alert-container #".concat(o)).remove()},6e3)}))},$(document).on("click",".newsletter-form button[type=submit]",function(e){e.preventDefault(),e.stopPropagation();var t=$(this);t.addClass("button-loading"),$.ajax({type:"POST",cache:!1,url:t.closest("form").prop("action"),data:new FormData(t.closest("form")[0]),contentType:!1,processData:!1,success:function(e){if(t.removeClass("button-loading"),"undefined"!=typeof refreshRecaptcha&&refreshRecaptcha(),e.error)return n(e.message),!1;t.closest("form").find("input[type=email]").val(""),e=e.message,window.showAlert("alert-success",e)},error:function(e){"undefined"!=typeof refreshRecaptcha&&refreshRecaptcha(),t.removeClass("button-loading"),void 0!==(e=e).errors&&e.errors.length?o(e.errors):void 0!==e.responseJSON?void 0!==e.responseJSON.errors?422===e.status&&o(e.responseJSON.errors):void 0!==e.responseJSON.message?n(e.responseJSON.message):$.each(e.responseJSON,function(e,t){$.each(t,function(e,t){n(t)})}):n(e.statusText)}})}),$(document).ready(function(){$.ajax({type:"GET",url:$("#sidebar-wrapper").data("load-url"),success:function(e){if(e.error)return!1;$(".sidebar-inner").html(e.data)},error:function(e){console.log(e)}})})})(),$(document).ready(function(){var s=e=>{window.showAlert("alert-danger",e)},t=e=>{let o="";$.each(e,(e,t)=>{""!==o&&(o+="<br />"),o+=t}),s(o)};window.localStorage.getItem("comment_author")&&(e=JSON.parse(window.localStorage.getItem("comment_author")),$(".form-comment-post").find('input[name="name"]').val(e.name),$(".form-comment-post").find('input[name="email"]').val(e.email),$(".form-comment-post").find('input[name="phone"]').val(e.phone),$("#saveCommentAuthor").prop("checked",!0));function i(e){var t,o=new ClipboardEvent("").clipboardData||new DataTransfer;for(t of c)o.items.add(t);e.files=o.files;{var n=e,e=$(".image-upload__text"),s=$(n).data("max-files"),i=n.files.length;s?(s<=i?e.closest(".image-upload__uploader-container").addClass("d-none"):e.closest(".image-upload__uploader-container").removeClass("d-none"),e.text(i+"/"+s)):e.text(i);const r=$(".image-viewer__list"),l=$("#review-image-template").html();if(r.addClass("is-loading"),r.find(".image-viewer__item").remove(),i){for(let e=i-1;0<=e;e--)r.prepend(l.replace("__id__",e));for(let t=i-1;0<=t;t--){var a=new FileReader;a.onload=function(e){r.find(".image-viewer__item[data-id="+t+"]").find("img").attr("src",e.target.result)},a.readAsDataURL(n.files[t])}}r.removeClass("is-loading")}}let c=[];$(document).on("change",".form-comment-post input[type=file]",function(e){e.preventDefault();let o=this,n=$(o),s=n.data("max-size");Object.keys(o.files).map(function(e){var t;s&&o.files[e].size/1024>s?(t=n.data("max-size-message").replace("__attribute__",o.files[e].name).replace("__max__",s),window.showAlert("alert-danger",t)):c.push(o.files[e])});var e=c.length,t=n.data("max-files");t&&t<e&&c.splice(e-t-1,e-t),i(o)}),$(document).on("click",".form-comment-post .image-viewer__icon-remove",function(e){e.preventDefault();e=$(e.currentTarget).closest(".image-viewer__item").data("id"),c.splice(e,1),e=$(".form-comment-post input[type=file]")[0];i(e)}),$(document).on("click",".form-comment-post a.btn-send-comment",function(e){e.preventDefault(),e.stopPropagation(),$(this).prop("disabled",!0).addClass("btn-disabled").addClass("button-loading");const n=$(this).closest("form");$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"POST",cache:!1,url:n.prop("action"),data:new FormData(n[0]),contentType:!1,processData:!1,success:e=>{var t,o;e.error?s(e.message):($("#saveCommentAuthor").is(":checked")?(o={name:$(".form-comment-post").find('input[name="name"]').val(),email:$(".form-comment-post").find('input[name="email"]').val(),phone:$(".form-comment-post").find('input[name="phone"]').val()},window.localStorage.setItem("comment_author",JSON.stringify(o))):window.localStorage.removeItem("comment_author"),$("#saveCommentAuthor").is(":checked")||(n.find('input[name="name"]').val(""),n.find('input[name="email"]').val(""),n.find('input[name="phone"]').val("")),n.find("select").val(0),n.find("textarea").val(""),n.find('input[type="file"]').val(""),0<(o=$(".image-viewer__item")).length&&(c.splice(0,o.length),t=$(".form-comment-post input[type=file]"),i(t)),$(".be-comment-wrapper").prepend(e.data),$(".comments-count").text(Number($(".comments-count").text())+1),window.showAlert("alert-success","Thêm bình luận thành công!")),$(this).prop("disabled",!1).removeClass("btn-disabled").removeClass("button-loading")},error:e=>{$(this).prop("disabled",!1).removeClass("btn-disabled").removeClass("button-loading"),e=e,n,void 0!==e.errors&&e.errors.length?t(e.errors):void 0!==e.responseJSON?void 0!==e.responseJSON.errors?422===e.status&&t(e.responseJSON.errors):void 0!==e.responseJSON.message?s(e.responseJSON.message):$.each(e.responseJSON,(e,t)=>{$.each(t,(e,t)=>{s(t)})}):s(e.statusText)}})}),$(document).on("click","a.btn-comment-readmore",function(e){e.preventDefault(),e.stopPropagation();$(this);$(this).prop("disabled",!0).addClass("btn-disabled").addClass("button-loading"),$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"GET",url:$(this).data("url"),success:e=>{e.error||($(this).remove(),$(".be-comment-wrapper").append(e.data)),$(this).prop("disabled",!1).removeClass("btn-disabled").removeClass("button-loading")},error:e=>{$(this).prop("disabled",!1).removeClass("btn-disabled").removeClass("button-loading")}})});var e=$('form.form-comment-post input[name="posts_id"]').val();e&&$.ajax({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},type:"GET",url:window.location.origin+"/ajax/comment/"+e,beforeSend:()=>{$(".be-comment-wrapper").addClass("comment-loadding")},success:e=>{e.error||$(".be-comment-wrapper").html(e.data),$(".be-comment-wrapper").removeClass("comment-loadding")},error:e=>{$(".be-comment-wrapper").removeClass("comment-loadding")}}),Fancybox.bind('[data-fancybox="gallery"]',{Image:{zoom:!1}})});const App={menuScroll:function(){var t=window.pageYOffset;window.onscroll=function(){var e=window.pageYOffset;document.getElementById("hdFixed").style.top=e<t||t<168?"0":"-100px",t=e}}};function add_script_fix_devgg(){!function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t)}catch(e){}return e}()||function(i){var a=!0,r=!1;EventTarget.prototype.addEventListener=function(e,t,o){var n="object"==typeof o,s=n?o.capture:o;(o=n?o:{}).passive=void 0!==o.passive?o.passive:a,o.capture=void 0!==s?s:r,i.call(this,e,t,o)}}(EventTarget.prototype.addEventListener)}$(document).ready(function(){App.menuScroll(),$(document).on("click",".post-content-wrapper img, .single-content figure img",function(){var e=$(this).attr("src");Fancybox.show([{src:e,type:"image"}])}),$(document).on("click",".btn-copy",function(e){e.preventDefault();var e=$(this).data("href"),t=$("<input>");$("body").append(t),t.val(e).select(),document.execCommand("copy"),t.remove(),window.showAlert("alert-success","Đã sao chép liên kết")});const o=({url:e,title:t,w:o,h:n})=>{var s=void 0!==window.screenLeft?window.screenLeft:window.screenX,i=void 0!==window.screenTop?window.screenTop:window.screenY,a=window.innerWidth||document.documentElement.clientWidth||screen.width,r=window.innerHeight||document.documentElement.clientHeight||screen.height,l=a/window.screen.availWidth,e=window.open(e,t,`
          scrollbars=yes,
          width=${o/l},
          height=${n/l},
          top=${(r-n)/2/l+i},
          left=${(a-o)/2/l+s}
          `);window.focus&&e.focus()};$(document).on("click",".fb-share-button",function(e){e.preventDefault();var e=$(this).attr("data-href"),t=$(this).attr("data-title"),e="https://www.facebook.com/sharer/sharer.php?u="+e+"&title="+t;o({url:e,title:t,w:626,h:436})}),$(document).on("click",".fb-mess-share-button",function(e){e.preventDefault();var e=$(this).attr("data-href"),t=$(this).attr("data-title"),e="http://www.facebook.com/dialog/send?app_id=717695893406776&display=popup&link="+e+"&redirect_uri="+e;o({url:e,title:t,w:626,h:436})}),$(document).on("click",".zalo-share-button",function(e){e.preventDefault()}),$(document).on("click",".twitter-share-button",function(e){e.preventDefault();var e=$(this).attr("data-href"),t=$(this).attr("data-title"),e="https://twitter.com/intent/tweet?url="+e+"&text="+t;o({url:e,title:t,w:626,h:436})});var t=$(".cpnBtn"),e=($(document).on("click",".cpnBtn",function(e){e.preventDefault();e=$(this).prev();navigator.clipboard.writeText(e.text()),$(this).text("Đã copy"),window.showAlert("alert-success","Đã copy mã giảm giá"),setTimeout(function(){t.text("Copy mã")},3e3)}),$(".select2").data("default"));$(".select2").select2({data:[e],ajax:{url:"/ajax/tiki-seller",dataType:"json",delay:250,data:function(e){return{q:e.term,page:e.page}},processResults:function(e,t){return t.page=t.page||1,{results:e.items,pagination:{more:30*t.page<e.total_count}}}},language:{inputTooShort:function(){return"Nhập tên cửa hàng cần tìm"},searching:function(){return"Đang tìm kiếm..."},loadingMore:function(){return"Đang tải thêm kết quả..."},errorLoading:function(){return"Không thể tải kết quả"},noResults:function(){return"Không tìm thấy kết quả"}},placeholder:"Tất cả",minimumInputLength:1,templateResult:function(e){if(e.loading)return e.text;var t=$("<div class='select2-result-repository clearfix d-flex'><div class='select2-result-repository__avatar'><img width='50' src='"+e.logo+"' /></div><div class='select2-result-repository__meta ml-10 d-flex align-items-center'><div class='select2-result-repository__title'></div></div></div>");return t.find(".select2-result-repository__title").text(e.seller_name),t},templateSelection:function(e){return e.seller_name||e.text}}),$(document).on("click","#refresh_btn",function(e){$('input[name="qs"]').val(""),$(".select2").val(null).trigger("change"),window.showAlert("alert-success","Làm mới bộ lọc thành công")}),$(document).on("mouseenter",".zalo",function(e){$(this).hasClass("zalo-share-button")||($(this).addClass("zalo-share-button"),ZaloSocialSDK.reload())});var n=$("#scrollTop");$(window).scroll(function(){300<$(window).scrollTop()?n.addClass("show"):n.removeClass("show")}),n.on("click",function(e){$("html, body").animate({scrollTop:0},"300")})}),document.addEventListener("DOMContentLoaded",function(){var e=[].slice.call(document.querySelectorAll(".lazy-background"));if("IntersectionObserver"in window&&"IntersectionObserverEntry"in window&&"intersectionRatio"in window.IntersectionObserverEntry.prototype){let o=new IntersectionObserver(function(e,t){e.forEach(function(e){e.isIntersecting&&(e.target.style.backgroundImage=`url('${e.target.dataset.bg_url}')`,o.unobserve(e.target))})});e.forEach(function(e){o.observe(e)})}}),add_script_fix_devgg(),function(r){"use strict";r(window).on("load",function(){r(".preloader").delay(450).fadeOut("slow")}),r(document).ready(function(){var e,i,t,o,n,s,a;r("button.search-icon").on("click",function(){r("body").toggleClass("open-search-form"),r(".mega-menu-item").removeClass("open")}),r(".search-close").on("click",function(){r("body").removeClass("open-search-form")}),r(".off-canvas-toggle").on("click",function(){r("body").toggleClass("canvas-opened")}),r(".dark-mark").on("click",function(){r("body").removeClass("canvas-opened")}),r(".off-canvas-close").on("click",function(){r("body").removeClass("canvas-opened")}),document.querySelector.bind(document),r(".play-video").length&&r(".play-video").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),r(window).on("scroll",function(){r(window).scrollTop()<245?r(".header-sticky").removeClass("sticky-bar"):r(".header-sticky").addClass("sticky-bar")}),r(".sticky-sidebar").theiaStickySidebar(),r(".slide-fade").slick({infinite:!0,dots:!1,arrows:!0,autoplay:!0,autoplaySpeed:3e3,fade:!0,fadeSpeed:1500,prevArrow:'<button type="button" class="slick-prev" aria-label="slick-prev"><i class="elegant-icon arrow_left"></i></button>',nextArrow:'<button type="button" class="slick-next" aria-label="slick-next"><i class="elegant-icon arrow_right"></i></button>',appendArrows:".arrow-cover"}),r(".carausel-3-columns").slick({dots:!1,infinite:!0,speed:2e3,arrows:!0,autoplay:!0,slidesToShow:3,slidesToScroll:1,loop:!0,adaptiveHeight:!0,prevArrow:'<button type="button" class="slick-prev" aria-label="slick-prev"><i class="elegant-icon arrow_left"></i></button>',nextArrow:'<button type="button" class="slick-next" aria-label="slick-next"><i class="elegant-icon arrow_right"></i></button>',appendArrows:".carausel-3-columns-wrapper",responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:481,settings:{slidesToShow:1,slidesToScroll:1}}]}),r(".featured-slider-2-items").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,dots:!1,fade:!0,asNavFor:".featured-slider-2-nav"}),r(".featured-slider-2-nav").slick({slidesToShow:3,slidesToScroll:1,vertical:!0,asNavFor:".featured-slider-2-items",dots:!1,arrows:!1,focusOnSelect:!0,verticalSwiping:!0}),r(".featured-slider-3-items").slick({slidesToShow:1,slidesToScroll:1,arrows:!0,dots:!1,fade:!0,prevArrow:'<button type="button" class="slick-prev" aria-label="slick-prev"><i class="elegant-icon arrow_left"></i></button>',nextArrow:'<button type="button" class="slick-next" aria-label="slick-next"><i class="elegant-icon arrow_right"></i></button>',appendArrows:".slider-3-arrow-cover"}),r(".sub-mega-menu .nav-pills > a").on("mouseover",function(e){r(this).tab("show")}),(e=r("ul#mobile-menu")).length&&e.slicknav({prependTo:".mobile_menu",closedSymbol:"+",openedSymbol:"-"}),(i=function(e,t,o){this.toRotate=t,this.el=e,this.loopNum=0,this.period=parseInt(o,10)||2e3,this.txt="",this.tick(),this.isDeleting=!1}).prototype.tick=function(){var e=this.loopNum%this.toRotate.length,e=this.toRotate[e],t=(this.isDeleting?this.txt=e.substring(0,this.txt.length-1):this.txt=e.substring(0,this.txt.length+1),this.el.innerHTML='<span class="wrap">'+this.txt+"</span>",this),o=200-100*Math.random();this.isDeleting&&(o/=2),this.isDeleting||this.txt!==e?this.isDeleting&&""===this.txt&&(this.isDeleting=!1,this.loopNum++,o=500):(o=this.period,this.isDeleting=!0),setTimeout(function(){t.tick()},o)},window.onload=function(){for(var e=document.getElementsByClassName("typewrite"),t=0;t<e.length;t++){var o=e[t].getAttribute("data-type"),n=e[t].getAttribute("data-period");o&&new i(e[t],JSON.parse(o),n)}var s=document.createElement("style");s.type="text/css",s.innerHTML=".typewrite > .wrap { border-right: 0.05em solid #5869DA}",document.body.appendChild(s)},r(".menu li.menu-item-has-children").on("click",function(){var e=r(this);(e.hasClass("open")?(e.removeClass("open"),e.find("li").removeClass("open"),e):(e.addClass("open"),e.children("ul").slideDown(200),e.siblings("li").children("ul").slideUp(200),e.siblings("li").removeClass("open"),e.siblings("li").find("li").removeClass("open"),e.siblings("li"))).find("ul").slideUp(200)}),o=r(document).height(),n=r(window).height(),r(window).on("scroll",function(){t=r(window).scrollTop()/(o-n)*100,r(".scroll-progress").width(t+"%")}),r(".grid").length&&(a=r(".grid").masonry({itemSelector:".grid-item",percentPosition:!0,columnWidth:".grid-sizer",gutter:0})).imagesLoaded().progress(function(){a.masonry()}),r.fn.vwScroller=function(t){var o=!1,n=r(document),s=r(window),e=(t=r.extend({delay:500,position:.7,visibleClass:"",invisibleClass:""},t),r.proxy(function(){var e=n.scrollTop()>(n.height()-s.height())*t.position;!o&&e?i():o&&!e&&a()},this)),i=r.proxy(function(){o=!0,t.visibleClass&&this.addClass(t.visibleClass),t.invisibleClass&&this.removeClass(t.invisibleClass)},this),a=r.proxy(function(){o=!1,t.visibleClass&&this.removeClass(t.visibleClass),t.invisibleClass&&this.addClass(t.invisibleClass)},this);return setInterval(e,t.delay),this},r.fn.vwScroller&&((s=r(".single-more-articles")).vwScroller({visibleClass:"single-more-articles--visible",position:.55}),s.find(".single-more-articles-close-button").on("click",function(){s.hide()})),r("button.single-more-articles-close").on("click",function(){r(".single-more-articles").removeClass("single-more-articles--visible")}),r("#news-flash").vTicker({speed:800,pause:3e3,animation:"fade",mousePause:!1,showItems:1}),r("#date-time").vTicker({speed:800,pause:3e3,animation:"fade",mousePause:!1,showItems:1})})}(jQuery);