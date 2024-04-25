!function(e){"use strict";var t=e(window);e(window).on("load",(function(){e("#preloader").delay(350).fadeOut("slow"),e("body").delay(350).css({overflow:"visible"})})),t.on("scroll",(function(){e(window).scrollTop()<100?e("#header-sticky,#header-mob-sticky,#header-tab-sticky").removeClass("header-sticky"):e("#header-sticky,#header-mob-sticky,#header-tab-sticky").addClass("header-sticky")})),t.on("scroll",(function(){t.scrollTop()<245?e(".scroll-to-target").removeClass("open"):e(".scroll-to-target").addClass("open")})),Number.prototype.format_price=function(e,t){var i=window.currencies||{};e||(e=void 0!==i.number_after_dot?i.number_after_dot:2);var a="\\d(?=(\\d{"+(t||3)+"})+$)",o="",n=this;return i.show_symbol_or_title&&(o=i.symbol||i.title),i.display_big_money&&(n>=1e6&&n<1e9?(n/=1e6,o=i.million+(o?" "+o:"")):n>=1e9&&(n/=1e9,o=i.billion+(o?" "+o:""))),n=(n=(n=n.toFixed(Math.max(0,~~e))).toString().split("."))[0].toString().replace(new RegExp(a,"g"),"$&"+i.thousands_separator)+(n[1]?i.decimal_separator+n[1]:""),i.show_symbol_or_title&&(i.is_prefix_symbol?n=o+n:n+=o),n},e(".scroll-to-target").length&&e(".scroll-to-target").on("click",(function(){var t=e(this).attr("data-target");e("html, body").animate({scrollTop:e(t).offset().top},1e3)})),e("[data-background]").each((function(){e(this).css("background-image","url( "+e(this).attr("data-background")+"  )")})),e("[data-width]").each((function(){e(this).css("width",e(this).attr("data-width"))})),e("[data-bg-color]").each((function(){e(this).css("background-color",e(this).attr("data-bg-color"))})),e("select").not(".review-star, .product-option-select").niceSelect(),e("#mobile-menu").meanmenu({meanMenuContainer:".mobile-menu",meanScreenWidth:"1199",meanExpand:['<i class="fal fa-plus"></i>']}),e(".tp-cat-toggle").on("click",(function(){e(".category-menu").slideToggle(500)})),e(".tp-menu-toggle").on("click",(function(){e(".tpsideinfo").addClass("tp-sidebar-opened"),e(".body-overlay").addClass("opened")})),e(".tpsideinfo__close").on("click",(function(){e(".tpsideinfo").removeClass("tp-sidebar-opened"),e(".body-overlay").removeClass("opened")})),e(".body-overlay").on("click",(function(){e(".tpsideinfo").removeClass("tp-sidebar-opened"),e(".body-overlay").removeClass("opened")})),e(".tp-cart-toggle").on("click",(function(){e(".tp-cart-info-area").addClass("tp-sidebar-opened"),e(".cartbody-overlay").addClass("opened")})),e(".tpcart__close").on("click",(function(){e(".tp-cart-info-area").removeClass("tp-sidebar-opened"),e(".cartbody-overlay").removeClass("opened")})),e(".cartbody-overlay").on("click",(function(){e(".tp-cart-info-area").removeClass("tp-sidebar-opened"),e(".cartbody-overlay").removeClass("opened")})),new Swiper(".slider-active",{loop:!0,slidesPerView:1,effect:"fade",autoplay:{delay:4500,disableOnInteraction:!0},pagination:{el:".slider-pagination",clickable:!0}}),e("#showlogin").on("click",(function(){e("#checkout-login").slideToggle(900)})),e("#showcoupon").on("click",(function(){e("#checkout_coupon").slideToggle(900)})),e("#cbox").on("click",(function(){e("#cbox_info").slideToggle(900)})),e("#ship-box").on("click",(function(){e("#ship-box-info").slideToggle(1e3)})),new Swiper(".greenslider-active",{loop:!0,slidesPerView:1,fade:"effect",effect:"fade",autoplay:{delay:5e3,disableOnInteraction:!1},pagination:{el:".greenslider-pagination",clickable:!0}}),new Swiper(".slidertwo-active",{loop:!0,slidesPerView:1,effect:"fade",autoplay:{delay:5500,disableOnInteraction:!1},pagination:{el:".slidertwo_pagination",clickable:!0}}),new Swiper(".sliderthree-active",{loop:!1,effect:"fade",slidesPerView:1,autoplay:{delay:6e3,disableOnInteraction:!1},pagination:{el:".tpsliderthree__pagination",clickable:!0}}),new Swiper(".shopslider-active",{loop:!0,slidesPerView:6,spaceBetween:25,centereMode:!0,autoplay:{delay:3500,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:6},1200:{slidesPerView:5},992:{slidesPerView:4},768:{slidesPerView:3},576:{slidesPerView:2},0:{slidesPerView:1}}}),new Swiper(".tp-team-active",{loop:!0,slidesPerView:4,spaceBetween:25,centereMode:!0,autoplay:{delay:3500,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:4},1200:{slidesPerView:4},992:{slidesPerView:3},768:{slidesPerView:2},576:{slidesPerView:2},0:{slidesPerView:1}}}),new Swiper(".related-product-active",{loop:!0,slidesPerView:5,spaceBetween:30,autoplay:{delay:3500,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:5},1200:{slidesPerView:5},992:{slidesPerView:4},768:{slidesPerView:2},576:{slidesPerView:2},0:{slidesPerView:1}},navigation:{nextEl:".tprelated__nxt",prevEl:".tprelated__prv"}}),new Swiper(".product-active",{loop:!0,slidesPerView:5,spaceBetween:30,autoplay:{delay:3500,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:5},1200:{slidesPerView:5},992:{slidesPerView:4},768:{slidesPerView:3},576:{slidesPerView:3},0:{slidesPerView:1}},navigation:{nextEl:".tpproductarrow__nxt",prevEl:".tpproductarrow__prv"}}),e("[data-countdown]").each((function(){var t=e(this),i=e(this).data("countdown");t.countdown(i,(function(e){t.html(e.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Minute</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Second</p></span>'))}))})),new Swiper(".brand-active",{loop:!0,slidesPerView:6,spaceBetween:30,freeMode:!0,autoplay:{delay:3e3,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:6},1200:{slidesPerView:4},992:{slidesPerView:3},768:{slidesPerView:3},576:{slidesPerView:2},0:{slidesPerView:1}}}),new Swiper(".platinam-pro-active",{loop:!0,slidesPerView:4,spaceBetween:30,autoplay:{delay:3e3,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:4},1200:{slidesPerView:3},992:{slidesPerView:2},768:{slidesPerView:2},576:{slidesPerView:1},0:{slidesPerView:1}},navigation:{nextEl:".tpplatiarrow__nxt",prevEl:".tpplatiarrow__prv"}}),e(".popup-video").magnificPopup({type:"iframe"}),e(".popup-image").magnificPopup({type:"image",gallery:{enabled:!0}}),new Swiper(".testi-active",{loop:!0,slidesPerView:3,spaceBetween:30,autoplay:{delay:3e3,disableOnInteraction:!0},breakpoints:{1400:{slidesPerView:3},1200:{slidesPerView:3},992:{slidesPerView:3},768:{slidesPerView:2},576:{slidesPerView:1},0:{slidesPerView:1}},navigation:{nextEl:".tptestiarrow__nxt",prevEl:".tptestiarrow__prv"}}),new Swiper(".postbox-active",{loop:!0,slidesPerView:1,spaceBetween:0,autoplay:{delay:4e3},navigation:{nextEl:".postbox-slider-button-next",prevEl:".postbox-slider-button-prev"}}),e('.tpproduct [class*="col"]').on({mouseenter:function(){e(this).siblings().stop().css("z-index","-1")},mouseleave:function(){e(this).siblings().stop().css("z-index","1")}}),new Swiper(".swiper--top",{spaceBetween:0,centeredSlides:!0,speed:3e4,autoplay:{delay:1},loop:!0,freeMode:!0,slidesPerView:"auto",allowTouchMove:!1,disableOnInteraction:!0}),e(".tpproduct-details__quantity .cart-minus").on("click",(function(){var t=e(this).parent().find("input"),i=parseInt(t.val())-1;i=i<1?1:i,t.val(i),t.trigger("change")})),e(".tpproduct-details__quantity .cart-plus").on("click",(function(){var t=e(this).parent().find("input");t.val(parseInt(t.val())+1),t.trigger("change")})),e(document).on("submit",".newsletter-form",(function(t){t.preventDefault(),t.stopPropagation();var i=e(this),a=i.find("button[type=submit]");e.ajax({type:"POST",cache:!1,url:i.prop("action"),data:new FormData(i[0]),contentType:!1,processData:!1,beforeSend:function(){a.prop("disabled",!0),a.find("i").addClass("button-loading")},success:function(e){i.find("input[type=email]").val(""),toastr.success(e.message)},error:function(e){NinicoApp.handleError(e)},complete:function(){"undefined"!=typeof refreshRecaptcha&&refreshRecaptcha(),a.prop("disabled",!1),a.find("i").removeClass("button-loading")}})})).on("click",".product-area #product-type-tab button",(function(t){var i=e(t.target),a=i.closest("div").data("route"),o=e(document).find(".product-area .tab-content .tab-pane"),n=e(document).find(".loading-spinner");e.ajax({url:"".concat(a,"?type=").concat(i.data("type"),"&limit=").concat(i.closest("div").data("limit")),method:"GET",dataType:"json",beforeSend:function(){return n.removeClass("d-none")},success:function(e){o.html(e.data)},error:function(e){NinicoApp.handleError(e)},complete:function(){return n.addClass("d-none")}})})).on("submit","#contact-form",(function(t){t.preventDefault();var i=e(t.currentTarget),a=i.find("button[type=submit] > i");e.ajax({type:"POST",cache:!1,url:i.prop("action"),data:new FormData(i[0]),contentType:!1,processData:!1,beforeSend:function(){a.addClass("button-loading")},success:function(e){var t=e.error,a=e.message;t?toastr.error(a):(i[0].reset(),toastr.success(a))},error:function(e){NinicoApp.handleError(e)},complete:function(){"undefined"!=typeof refreshRecaptcha&&refreshRecaptcha(),a.removeClass("button-loading")}})})),e(".product-area").length&&e('.product-area #product-type-tab button[data-type="all"]').trigger("click")}(jQuery);