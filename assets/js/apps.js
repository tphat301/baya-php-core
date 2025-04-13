/* Validation form */
validateForm("validation-newsletter");
validateForm("validation-cart");
validateForm("validation-user");
validateForm("validation-contact");

/* Lazys */
PHP_FRAMEWORK.Lazys = function () {
	if (isExist($(".lazy"))) {
		var lazyLoadInstance = new LazyLoad({
			elements_selector: ".lazy",
		});
	}
};

/* Load name input file */
PHP_FRAMEWORK.loadNameInputFile = function () {
	if (isExist($(".custom-file input[type=file]"))) {
		$("body").on("change", ".custom-file input[type=file]", function () {
			var fileName = $(this).val();
			fileName = fileName.substr(
				fileName.lastIndexOf("\\") + 1,
				fileName.length
			);
			$(this).siblings("label").html(fileName);
		});
	}
};

/* Back to top */
PHP_FRAMEWORK.ScrollToTop = function () {
	if (isExist($(".progress-wrap"))) {
		("use strict");
		var progressPath = document.querySelector(".progress-wrap path");
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition =
			"none";
		progressPath.style.strokeDasharray = pathLength + " " + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition =
			"stroke-dashoffset 10ms linear";
		function updateProgress() {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength) / height;
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		$(window).scroll(updateProgress);
		var offset = 150;
		var duration = 550;
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > offset) {
				$(".progress-wrap").addClass("active-progress");
			} else {
				$(".progress-wrap").removeClass("active-progress");
			}
		});
		$(".progress-wrap").on("click", function (event) {
			event.preventDefault();
			$("html, body").animate(
				{
					scrollTop: 0,
				},
				duration
			);
			return false;
		});
	}
};

/* Alt images */
PHP_FRAMEWORK.AltImg = function () {
	$("img").each(function (index, element) {
		if (!$(this).attr("alt") || $(this).attr("alt") == "") {
			$(this).attr("alt", WEBSITE_NAME);
		}
	});
};

/* Menu */
PHP_FRAMEWORK.Menu = function () {
	/* Menu remove empty ul */
	if (isExist($(".menu"))) {
		$(".menu ul li a").each(function () {
			$this = $(this);

			if (!isExist($this.next("ul").find("li"))) {
				$this.next("ul").remove();
				$this.removeClass("has-child");
			}
		});
	}

	/* Menu fixed */
	$(window).scroll(function () {
		const scrollToTop = $(window).scrollTop();
		if (isExist($(".fx"))) {
			const menu = $(".menu").height() + $(".head").height();
			if (scrollToTop > menu) {
				if (
					!$(".w-menu").hasClass(
						"fix_script animate__animated animate__fadeInDown"
					)
				) {
					$(".w-menu").addClass(
						"fix_script animate__animated animate__fadeInDown"
					);
				}
			} else {
				$(".w-menu").removeClass(
					"fix_script animate__animated animate__fadeInDown"
				);
			}
		}
		if (isExist($(".st"))) {
			const menu = $(".menu").height() + $(".head").height();
			if (scrollToTop > menu) {
				if (
					!$(".w-menu").hasClass(
						"sticky_script animate__animated animate__fadeInDown"
					)
				) {
					$(".w-menu").addClass(
						"sticky_script animate__animated animate__fadeInDown"
					);
				}
			} else {
				$(".w-menu").removeClass(
					"sticky_script animate__animated animate__fadeInDown"
				);
			}
		}
		if (isExist($(".menu-res"))) {
			const menuRes = $(".menu-res").height();
			if (scrollToTop > menuRes) {
				if (
					!$(".menu-res").hasClass(
						"fix_script animate__animated animate__fadeInDown"
					)
				) {
					$(".menu-res").addClass(
						"fix_script animate__animated animate__fadeInDown"
					);
				}
			} else {
				$(".menu-res").removeClass(
					"fix_script animate__animated animate__fadeInDown"
				);
			}
		}
	});

	/* Mmenu */
	if (isExist($("nav#menu"))) {
		$("nav#menu").mmenu({
			extensions: [
				"effect-slide-menu",
				"border-full",
				"position-left",
				"position-front",
			],
			navbars: [
				{
					position: "top",
					content: ["prev", "title", "close"],
				},
			],
		});
	}
};

/* Tools */
PHP_FRAMEWORK.Tools = function () {
	if (isExist($(".toolbar"))) {
		$(".footer").css({ marginBottom: $(".toolbar").innerHeight() });
	}
};

/* Wow */
PHP_FRAMEWORK.Wows = function () {
	new WOW().init();
};

/* Pagings */
PHP_FRAMEWORK.Pagings = function () {
	/* Categories */
	if (isExist($(".paging-product-category"))) {
		$(".paging-product-category").each(function () {
			var list = $(this).data("list");
			loadPaging(
				"api/product.php?perpage=10&idList=" + list,
				".paging-product-category-" + list
			);
		});
	}
};

/* Search */
PHP_FRAMEWORK.Search = function () {
	if (isExist($(".icon-search"))) {
		$(".icon-search").click(function () {
			if ($(this).hasClass("active")) {
				$(this).removeClass("active");
				$(".search-grid")
					.stop(true, true)
					.animate({ opacity: "0", width: "0px" }, 200);
			} else {
				$(this).addClass("active");
				$(".search-grid")
					.stop(true, true)
					.animate({ opacity: "1", width: "230px" }, 200);
			}
			document.getElementById($(this).next().find("input").attr("id")).focus();
			$(".icon-search i").toggleClass("bi bi-x-lg");
		});
	}
};

/* Videos */
PHP_FRAMEWORK.Videos = function () {
	Fancybox.bind("[data-fancybox]", {});
};

/* Owl Data */
PHP_FRAMEWORK.OwlData = function (obj) {
	if (!isExist(obj)) return false;
	var items = obj.attr("data-items");
	var rewind = Number(obj.attr("data-rewind")) ? true : false;
	var autoplay = Number(obj.attr("data-autoplay")) ? true : false;
	var loop = Number(obj.attr("data-loop")) ? true : false;
	var lazyLoad = Number(obj.attr("data-lazyload")) ? true : false;
	var mouseDrag = Number(obj.attr("data-mousedrag")) ? true : false;
	var touchDrag = Number(obj.attr("data-touchdrag")) ? true : false;
	var animations = obj.attr("data-animations") || false;
	var smartSpeed = Number(obj.attr("data-smartspeed")) || 800;
	var autoplaySpeed = Number(obj.attr("data-autoplayspeed")) || 800;
	var autoplayTimeout = Number(obj.attr("data-autoplaytimeout")) || 5000;
	var dots = Number(obj.attr("data-dots")) ? true : false;
	var responsive = {};
	var responsiveClass = true;
	var responsiveRefreshRate = 200;
	var nav = Number(obj.attr("data-nav")) ? true : false;
	var navContainer = obj.attr("data-navcontainer") || false;
	var navTextTemp =
		"<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-left' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='15 6 9 12 15 18' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-right' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='9 6 15 12 9 18' /></svg>";
	var navText = obj.attr("data-navtext");
	navText =
		nav &&
		navContainer &&
		(((navText === undefined || Number(navText)) && navTextTemp) ||
			(isNaN(Number(navText)) && navText) ||
			(Number(navText) === 0 && false));

	if (items) {
		items = items.split(",");

		if (items.length) {
			var itemsCount = items.length;

			for (var i = 0; i < itemsCount; i++) {
				var options = items[i].split("|"),
					optionsCount = options.length,
					responsiveKey;

				for (var j = 0; j < optionsCount; j++) {
					const attr = options[j].indexOf(":")
						? options[j].split(":")
						: options[j];

					if (attr[0] === "screen") {
						responsiveKey = Number(attr[1]);
					} else if (Number(responsiveKey) >= 0) {
						responsive[responsiveKey] = {
							...responsive[responsiveKey],
							[attr[0]]: (isNumeric(attr[1]) && Number(attr[1])) ?? attr[1],
						};
					}
				}
			}
		}
	}

	if (nav && navText) {
		navText =
			navText.indexOf("|") > 0 ? navText.split("|") : navText.split(":");
		navText = [navText[0], navText[1]];
	}

	obj.owlCarousel({
		rewind,
		autoplay,
		loop,
		lazyLoad,
		mouseDrag,
		touchDrag,
		smartSpeed,
		autoplaySpeed,
		autoplayTimeout,
		dots,
		nav,
		navText,
		navContainer: nav && navText && navContainer,
		responsiveClass,
		responsiveRefreshRate,
		responsive,
	});

	if (autoplay) {
		obj.on("translate.owl.carousel", function (event) {
			obj.trigger("stop.owl.autoplay");
		});

		obj.on("translated.owl.carousel", function (event) {
			obj.trigger("play.owl.autoplay", [autoplayTimeout]);
		});
	}

	if (animations && isExist(obj.find("[owl-item-animation]"))) {
		var animation_now = "";
		var animation_count = 0;
		var animations_excuted = [];
		var animations_list = animations.indexOf(",")
			? animations.split(",")
			: animations;

		obj.on("changed.owl.carousel", function (event) {
			$(this)
				.find(".owl-item.active")
				.find("[owl-item-animation]")
				.removeClass(animation_now);
		});

		obj.on("translate.owl.carousel", function (event) {
			var item = event.item.index;

			if (Array.isArray(animations_list)) {
				var animation_trim = animations_list[animation_count].trim();

				if (!animations_excuted.includes(animation_trim)) {
					animation_now = "animate__animated " + animation_trim;
					animations_excuted.push(animation_trim);
					animation_count++;
				}

				if (animations_excuted.length == animations_list.length) {
					animation_count = 0;
					animations_excuted = [];
				}
			} else {
				animation_now = "animate__animated " + animations_list.trim();
			}
			$(this)
				.find(".owl-item")
				.eq(item)
				.find("[owl-item-animation]")
				.addClass(animation_now);
		});
	}
};

/* Owl Page */
PHP_FRAMEWORK.OwlPage = function () {
	if (isExist($(".owl-page"))) {
		$(".owl-page").each(function () {
			PHP_FRAMEWORK.OwlData($(this));
		});
	}
};

/* Cart */
PHP_FRAMEWORK.Cart = function () {
	/* Add */
	if (isExist($(".select-city-cart"))) {
		fetch(CONFIG_BASE + "assets/jsons/city-group.json", {
			headers: { "Content-Type": "application/json" },
		})
			.then((response) => {
				return response.json();
			})
			.then(function (data) {
				$.each(data.citysCentral, function (index, val) {
					$(".select-city-cart").append(
						`<option value="` + val.id + `">` + val.name + `</option>`
					);
				});
			});
	}
	$("body").on("click", ".addcart", function () {
		$this = $(this);
		$parents = $this.parents(".right-pro-detail");
		var id = $this.data("id");
		var action = $this.data("action");
		var quantity = $parents.find(".quantity-pro-detail").find(".qty-pro").val();
		quantity = quantity ? quantity : 1;
		var color = $parents
			.find(".color-block-pro-detail")
			.find(".color-pro-detail input:checked")
			.val();
		color = color ? color : 0;
		var size = $parents
			.find(".size-block-pro-detail")
			.find(".size-pro-detail input:checked")
			.val();
		size = size ? size : 0;
		if (id) {
			$.ajax({
				url: "api/cart.php",
				type: "POST",
				dataType: "json",
				async: false,
				data: {
					cmd: "add-cart",
					id: id,
					color: color,
					size: size,
					quantity: quantity,
				},
				beforeSend: function () {
					holdonOpen();
				},
				success: function (result) {
					if (action == "addnow") {
						$(".count-cart").html(result.max);
						$.ajax({
							url: "api/cart.php",
							type: "POST",
							dataType: "html",
							async: false,
							data: {
								cmd: "popup-cart",
							},
							success: function (result) {
								$("#popup-cart .modal-body").html(result);
								$("#popup-cart").modal("show");
								PHP_FRAMEWORK.Lazys();
								holdonClose();
							},
						});
					} else if (action == "buynow") {
						window.location = CONFIG_BASE + "gio-hang";
					}
				},
			});
		}
	});

	/* Delete */
	$("body").on("click", ".del-procart", function () {
		confirmDialog("delete-procart", LANG["delete_product_from_cart"], $(this));
	});

	/* Counter */
	$("body").on("click", ".counter-procart", function () {
		var $button = $(this);
		var quantity = 1;
		var input = $button.parent().find("input");
		var id = input.data("pid");
		var code = input.data("code");
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") quantity = parseFloat(oldValue) + 1;
		else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
		$button.parent().find("input").val(quantity);
		updateCart(id, code, quantity);
	});

	/* Quantity */
	$("body").on("change", "input.quantity-procart", function () {
		var quantity = $(this).val() < 1 ? 1 : $(this).val();
		$(this).val(quantity);
		var id = $(this).data("pid");
		var code = $(this).data("code");
		updateCart(id, code, quantity);
	});

	/* City */
	if (isExist($(".select-city-cart"))) {
		$(".select-city-cart").change(function () {
			var id = $(this).val();
			loadDistrict(id);
			loadShip();
		});
	}

	/* District */
	if (isExist($(".select-district-cart"))) {
		$(".select-district-cart").change(function () {
			var id = $(this).val();
			var city = $(".select-city-cart").val();
			loadWard(city, id);
			loadShip();
		});
	}

	/* Ward */
	if (isExist($(".select-ward-cart"))) {
		$(".select-ward-cart").change(function () {
			var id = $(this).val();
			loadShip(id);
		});
	}

	/* Payments */
	if (isExist($(".payments-label"))) {
		$(".payments-label").click(function () {
			var payments = $(this).data("payments");
			$(".payments-cart .payments-label, .payments-info").removeClass("active");
			$(this).addClass("active");
			$(".payments-info-" + payments).addClass("active");
		});
	}

	/* Quantity detail page */
	if (isExist($(".quantity-pro-detail span"))) {
		$(".quantity-pro-detail span").click(function () {
			var $button = $(this);
			var oldValue = $button.parent().find("input").val();
			if ($button.text() == "+") {
				var newVal = parseFloat(oldValue) + 1;
			} else {
				if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
				else var newVal = 1;
			}
			$button.parent().find("input").val(newVal);
		});
	}
};

/* Slick */
PHP_FRAMEWORK.SlickPage = function () {
	if (isExist($(".slick-gallery-product"))) {
		$(".slick-gallery-product").slick({
			dots: false,
			infinite: true,
			autoplaySpeed: 3000,
			slidesToShow: 6,
			slidesToScroll: 1,
			adaptiveHeight: true,
			vertical: true,
			autoplay: false,
			infinite: true,
			arrows: false,
			responsive: [
				{
					breakpoint: 769,
					settings: {
						vertical: false,
					},
				},
			],
		});
	}
};

/* TOC */
PHP_FRAMEWORK.Toc = function () {
	if (isExist($(".toc-list"))) {
		$(".toc-list").toc({
			content: "div#toc-content",
			headings: "h2,h3,h4",
		});

		if (!$(".toc-list li").length) $(".meta-toc").hide();
		if (!$(".toc-list li").length)
			$(".meta-toc .mucluc-dropdown-list_button").hide();

		$(".toc-list")
			.find("a")
			.click(function () {
				var x = $(this).attr("data-rel");
				goToByScroll(x);
			});

		$("body").on("click", ".mucluc-dropdown-list_button", function () {
			$(".box-readmore").slideToggle(200);
		});

		$(document).scroll(function () {
			var y = $(this).scrollTop();
			if (y > 300) {
				$(".meta-toc").addClass("fiedx");
			} else {
				$(".meta-toc").removeClass("fiedx");
			}
		});
	}
};
PHP_FRAMEWORK.aweOwlPage = function () {
	var owl = $(".owl-carousel.in-page");
	owl.each(function () {
		var xs_item = $(this).attr("data-xs-items");
		var md_item = $(this).attr("data-md-items");
		var lg_item = $(this).attr("data-lg-items");
		var sm_item = $(this).attr("data-sm-items");
		var margin = $(this).attr("data-margin");
		var dot = $(this).attr("data-dot");
		var nav = $(this).attr("data-nav");
		var height = $(this).attr("data-height");
		var play = $(this).attr("data-play");
		var loop = $(this).attr("data-loop");

		if (typeof margin !== typeof undefined && margin !== false) {
		} else {
			margin = 30;
		}
		if (typeof xs_item !== typeof undefined && xs_item !== false) {
		} else {
			xs_item = 1;
		}
		if (typeof sm_item !== typeof undefined && sm_item !== false) {
		} else {
			sm_item = 3;
		}
		if (typeof md_item !== typeof undefined && md_item !== false) {
		} else {
			md_item = 3;
		}
		if (typeof lg_item !== typeof undefined && lg_item !== false) {
		} else {
			lg_item = 3;
		}

		if (loop == 1) {
			loop = true;
		} else {
			loop = false;
		}
		if (dot == 1) {
			dot = true;
		} else {
			dot = false;
		}
		if (nav == 1) {
			nav = true;
		} else {
			nav = false;
		}
		if (play == 1) {
			play = true;
		} else {
			play = false;
		}

		$(this).owlCarousel({
			loop: loop,
			margin: Number(margin),
			responsiveClass: true,
			dots: dot,
			nav: nav,
			navText: [
				'<div class="owlleft"><svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"><polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline></svg></div>',
				'<div class="owlright"><svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"><polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline></svg></div>',
			],
			autoplay: play,
			autoplayTimeout: 4000,
			smartSpeed: 3000,
			autoplayHoverPause: true,
			autoHeight: false,
			responsive: {
				0: {
					items: Number(xs_item),
				},
				600: {
					items: Number(sm_item),
				},
				1000: {
					items: Number(md_item),
				},
				1200: {
					items: Number(lg_item),
				},
			},
		});
	});
};

PHP_FRAMEWORK.slickPage = function () {
	if (isExist($(".slick.in-page"))) {
		$(".slick.in-page").each(function () {
			var dots = $(this).attr("data-dots");
			var infinite = $(this).attr("data-infinite");
			var speed = $(this).attr("data-speed");
			var vertical = $(this).attr("data-vertical");
			var arrows = $(this).attr("data-arrows");
			var autoplay = $(this).attr("data-autoplay");
			var autoplaySpeed = $(this).attr("data-autoplaySpeed");
			var centerMode = $(this).attr("data-centerMode");
			var centerPadding = $(this).attr("data-centerPadding");
			var slidesDefault = $(this).attr("data-slidesDefault");
			var responsive = $(this).attr("data-responsive");
			var xs_item = $(this).attr("data-xs-items");
			var md_item = $(this).attr("data-md-items");
			var lg_item = $(this).attr("data-lg-items");
			var sm_item = $(this).attr("data-sm-items");
			var slidesDefault_ar = slidesDefault.split(":");
			var xs_item_ar = xs_item.split(":");
			var sm_item_ar = sm_item.split(":");
			var md_item_ar = md_item.split(":");
			var lg_item_ar = lg_item.split(":");
			var to_show = slidesDefault_ar[0];
			var to_scroll = slidesDefault_ar[1];
			if (responsive == 1) {
				responsive = true;
			} else {
				responsive = false;
			}
			if (dots == 1) {
				dots = true;
			} else {
				dots = false;
			}
			if (arrows == 1) {
				arrows = true;
			} else {
				arrows = false;
			}
			if (infinite == 1) {
				infinite = true;
			} else {
				infinite = false;
			}
			if (autoplay == 1) {
				autoplay = true;
			} else {
				autoplay = false;
			}
			if (centerMode == 1) {
				centerMode = true;
			} else {
				centerMode = false;
			}
			if (vertical == 1) {
				vertical = true;
			} else {
				vertical = false;
			}
			if (typeof speed !== typeof undefined && speed !== false) {
			} else {
				speed = 300;
			}
			if (
				typeof autoplaySpeed !== typeof undefined &&
				autoplaySpeed !== false
			) {
			} else {
				autoplaySpeed = 2000;
			}
			if (
				typeof centerPadding !== typeof undefined &&
				centerPadding !== false
			) {
			} else {
				centerPadding = "0px";
			}
			var reponsive_json = [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: Number(lg_item_ar[0]),
						slidesToScroll: Number(lg_item_ar[1]),
					},
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: Number(md_item_ar[0]),
						slidesToScroll: Number(md_item_ar[1]),
					},
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: Number(sm_item_ar[0]),
						slidesToScroll: Number(sm_item_ar[1]),
						vertical: false,
					},
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: Number(xs_item_ar[0]),
						slidesToScroll: Number(xs_item_ar[1]),
						vertical: false,
					},
				},
			];
			if (responsive == 1) {
				$(this).slick({
					dots: dots,
					infinite: infinite,
					arrows: arrows,
					speed: Number(speed),
					vertical: vertical,
					slidesToShow: Number(to_show),
					slidesToScroll: Number(to_scroll),
					autoplay: autoplay,
					autoplaySpeed: Number(autoplaySpeed),
					responsive: reponsive_json,
				});
			} else {
				$(this).slick({
					dots: dots,
					infinite: infinite,
					arrows: arrows,
					speed: Number(speed),
					vertical: vertical,
					slidesToShow: Number(to_show),
					slidesToScroll: Number(to_scroll),
					autoplay: autoplay,
					autoplaySpeed: Number(autoplaySpeed),
				});
			}
		});
	}
};

PHP_FRAMEWORK.DoSearchCustom = function () {
	const checkValueSearch = (keyword) => {
		if (keyword == "") {
			notifyDialog(LANG["no_keywords"]);
			return false;
		} else {
			location.href = "tim-kiem?keyword=" + encodeURI(keyword);
		}
	};
	if (isExist($("input#keyword"))) {
		$("input#keyword").keyup(function (event) {
			if (event.keyCode == 13 || event.which == 13) {
				const keyword = $(this).val();
				checkValueSearch(keyword);
			}
		});
	}
	if (isExist($(".search-ic"))) {
		$(".search-ic").click(function () {
			const search = $(this).prev();
			const keyword = search.val();
			checkValueSearch(keyword);
		});
	}
};

PHP_FRAMEWORK.FilterBrand = function () {
	if (
		isExist($(".filter-brands")) ||
		isExist(isExist($(".filter-brands-price")))
	) {
		let filterNames = [];
		let ids = [];
		let prices = [];
		let filterNamesPrice = [];
		let resultTagsIdString;
		let resultTagsPriceString;
		const filterString = (datas, item, options = ", ") => {
			if (!datas.includes(item)) {
				datas.push(item);
			} else {
				const index = datas.indexOf(item);
				datas.splice(index, 1);
			}
			const isFilters = Boolean(datas.length);
			return isFilters ? datas.join(options) : "";
		};

		$(".filter-brand-check").change(function () {
			const id = $(this).data("id");
			const name = $(this).data("title");
			const filterTags = $(".filter-tags");
			const resultTagsNameString = filterString(filterNames, name);
			resultTagsIdString = filterString(ids, id);
			filterTags.addClass("active");
			const filterTagsDetail = $(".filter-tags-detail");
			filterTagsDetail.text(resultTagsNameString);
			if (!filterNames.length) {
				filterTags.removeClass("active");
			}
			$.ajax({
				url: "api/filter.php",
				type: "POST",
				data: { id: resultTagsIdString },
				success: function (data) {
					$(".load-data-product").html(data);
					PHP_FRAMEWORK.Lazys();
				},
			});
		});

		$(".filter-brand-check-price").change(function () {
			const price = $(this).data("price");
			const name = $(this).data("title");
			const filterTagsPrice = $(".filter-tags-price");
			const resultTagsNameString = filterString(filterNamesPrice, name);
			resultTagsPriceString = filterString(prices, price);
			const filterTagsDetail = $(".filter-tags-price-detail");
			filterTagsDetail.text(resultTagsNameString);
			filterTagsPrice.addClass("active");
			if (!filterNamesPrice.length) {
				filterTagsPrice.removeClass("active");
			}
			$.ajax({
				url: "api/filter.php",
				type: "POST",
				data: { price: resultTagsPriceString },
				success: function (data) {
					$(".load-data-product").html(data);
					PHP_FRAMEWORK.Lazys();
				},
			});
		});

		$(".filter-tags-remove").click(function () {
			$(this).parent().removeClass("active");
			$(".filter-brand-check").prop("checked", false);
			filterNames = [];
			ids = [];
			$.ajax({
				url: "api/filter.php",
				type: "POST",
				data: { id: "", price: resultTagsPriceString ?? "" },
				success: function (data) {
					$(".load-data-product").html(data);
					PHP_FRAMEWORK.Lazys();
				},
			});
		});

		$(".filter-tags-price-remove").click(function () {
			$(this).parent().removeClass("active");
			$(".filter-brand-check-price").prop("checked", false);
			prices = [];
			filterNamesPrice = [];
			$.ajax({
				url: "api/filter.php",
				type: "POST",
				data: { id: resultTagsIdString ?? "", price: "" },
				success: function (data) {
					$(".load-data-product").html(data);
					PHP_FRAMEWORK.Lazys();
				},
			});
		});
	}
};

/* Ready */
$(document).ready(function () {
	PHP_FRAMEWORK.SlickPage();
	PHP_FRAMEWORK.Lazys();
	PHP_FRAMEWORK.AltImg();
	PHP_FRAMEWORK.ScrollToTop();
	PHP_FRAMEWORK.Menu();
	PHP_FRAMEWORK.OwlPage();
	PHP_FRAMEWORK.Videos();
	PHP_FRAMEWORK.Search();
	PHP_FRAMEWORK.DoSearchCustom();
	PHP_FRAMEWORK.Toc();
	PHP_FRAMEWORK.Wows();
	PHP_FRAMEWORK.Pagings();
	PHP_FRAMEWORK.Cart();
	PHP_FRAMEWORK.FilterBrand();
});
