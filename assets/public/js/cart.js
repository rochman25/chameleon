$(document).ready(function () {
	$(".similiar .owl-carousel").owlCarousel({
			responsive: {
				0: {
					margin: 4,
					items: 2,
					pagination: !0,
					singleItem: !0,
					stopOnHover: !0,
					loop: !1,
					dots: !1,
					stagePadding: 30
				},
				1000: {
					margin: 16,
					items: 5,
					slideBy: 2,
					pagination: !0,
					singleItem: !0,
					stopOnHover: !0,
					loop: !1,
					dots: !1,
					nav: !0,
					navText: [
						"<div class='chevron'><i class='svg-icon svg_icon__pdp_leftchev' aria-hidden='true'></i></div>",
						"<div class='chevron'><i class='svg-icon svg_icon__pdp_rightchev' aria-hidden='true'></i></div>"
					]
				}
			}
        });
        $(".image-thumbnail").owlCarousel({
			margin: 8,
			items: 6,
			loop: !0,
			pagination: !0,
			dots: !1,
			nav: !0,
			navText: [
				"<div class='chevron'><i class='svg-icon svg_icon__pdp_leftchev' aria-hidden='true'></i></div>",
				"<div class='chevron'><i class='svg-icon svg_icon__pdp_rightchev' aria-hidden='true'></i></div>"
			]
        });
        $(".image-gallery-mobile").owlCarousel({
			items: 1,
			loop: !0,
			pagination: !0,
			dots: !0,
			nav: !1
		});
		$(".product-info .nav-tabs li").on("click", function () {
			$(".product-info .nav-tabs li").removeClass("active"),
				$(this).addClass("active");
			var t = $(this).attr("data-target");
			$(".product-info .tab-content>div").hide(),
				$(".product-info .tab-content ." + t + " ").show()
		});
		$(".size-product ul li").on("click", function () {
			$(".size-product ul li").removeClass("active"),
				$(this).addClass("active");
        });
        
        $(".size-product2 ul li").on("click", function () {
			$(".size-product2 ul li").removeClass("active"),
				$(this).addClass("active");
        });
        
		$(".wishlist").on("click", function () {
			$(this).hasClass("active") ? $.ajax({
				url: window.location.origin + "/wishlist/remove/",
				type: "POST",
				data: {
					wishlist_id: $(this).attr("data-id")
				}
			}).done(function (t) {
				200 === t.status.code && (
					$(".wishlist").removeClass("active"),
					$(".wishlist").attr("data-id", 0))
			}) : $.ajax({
				url: window.location.origin + "/wishlist/add/",
				type: "POST",
				data: {
					product_id: $("#product").data("product-id"),
					size_id: $(".size-product .size.active").attr("data-value")
				}
			}).done(function (t) {
				200 === t.status.code && ($(".wishlist").addClass("active"),
					$(".wishlist").attr("data-id", t.payload))
			})
		})

})
