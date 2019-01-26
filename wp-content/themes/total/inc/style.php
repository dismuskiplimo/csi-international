<?php
/**
 * @package Total
 */

function total_dymanic_styles(){
	$color = get_theme_mod( 'total_template_color', '#FFC107' );
	$color_rgba = total_hex2rgba($color, 0.9);
	$darker_color = totalColourBrightness($color, -0.9);
	$custom_css = "
button,
input[type='button'],
input[type='reset'],
input[type='submit'],
.widget-area .widget-title:after,
h3#reply-title:after,
h3.comments-title:after,
.nav-previous a,
.nav-next a,
.pagination .page-numbers,
.ht-main-navigation li:hover > a,
.page-template-home-template .ht-main-navigation li:hover > a,
.home.blog .ht-main-navigation li:hover > a,
.ht-main-navigation .current_page_item > a,
.ht-main-navigation .current-menu-item > a,
.ht-main-navigation .current_page_ancestor > a,
.page-template-home-template .ht-main-navigation .current > a,
.home.blog .ht-main-navigation .current > a,
.ht-slide-cap-title span,
.ht-progress-bar-length,
#ht-featured-post-section,
.ht-featured-icon,
.ht-service-post-wrap:after,
.ht-service-icon,
.ht-team-social-id a,
.ht-counter:after,
.ht-counter:before,
.ht-testimonial-wrap  .owl-carousel .owl-nav .owl-prev, 
.ht-testimonial-wrap  .owl-carousel .owl-nav .owl-next,
.ht-blog-read-more a,
.ht-cta-buttons a.ht-cta-button1,
.ht-cta-buttons a.ht-cta-button2:hover,
#ht-back-top:hover,
.entry-readmore a,
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce ul.products li.product:hover .button,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce nav.woocommerce-pagination ul li a, 
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce span.onsale,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce #respond input#submit.disabled, 
.woocommerce #respond input#submit:disabled, 
.woocommerce #respond input#submit:disabled[disabled], 
.woocommerce a.button.disabled, .woocommerce a.button:disabled, 
.woocommerce a.button:disabled[disabled], 
.woocommerce button.button.disabled, 
.woocommerce button.button:disabled, 
.woocommerce button.button:disabled[disabled], 
.woocommerce input.button.disabled, 
.woocommerce input.button:disabled, 
.woocommerce input.button:disabled[disabled],
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover, 
.woocommerce a.button.alt:disabled[disabled], 
.woocommerce a.button.alt:disabled[disabled]:hover, 
.woocommerce button.button.alt.disabled, 
.woocommerce button.button.alt.disabled:hover, 
.woocommerce button.button.alt:disabled, 
.woocommerce button.button.alt:disabled:hover, 
.woocommerce button.button.alt:disabled[disabled], 
.woocommerce button.button.alt:disabled[disabled]:hover, 
.woocommerce input.button.alt.disabled, 
.woocommerce input.button.alt.disabled:hover, 
.woocommerce input.button.alt:disabled, 
.woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt:disabled[disabled], 
.woocommerce input.button.alt:disabled[disabled]:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce-MyAccount-navigation-link a
{
	background:{$color};
}

a,
a:hover,
.ht-post-info .entry-date span.ht-day,
.entry-categories .fa,
.widget-area a:hover,
.comment-list a:hover,
.no-comments,
.ht-site-title a,
.woocommerce .woocommerce-breadcrumb a:hover,
#total-breadcrumbs a:hover,
.ht-featured-link a,
.ht-portfolio-cat-name-list .fa,
.ht-portfolio-cat-name:hover, 
.ht-portfolio-cat-name.active,
.ht-portfolio-caption a,
.ht-team-detail,
.ht-counter-icon,
.woocommerce ul.products li.product .price,
.woocommerce div.product p.price, 
.woocommerce div.product span.price,
.woocommerce .product_meta a:hover,
.woocommerce-error:before, 
.woocommerce-info:before, 
.woocommerce-message:before{
	color:{$color};
}

.ht-main-navigation ul ul,
.ht-featured-link a,
.ht-counter,
.ht-testimonial-wrap .owl-item img,
.ht-blog-post,
#ht-colophon,
.woocommerce ul.products li.product:hover, 
.woocommerce-page ul.products li.product:hover,
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce ul.products li.product:hover .button,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce div.product .woocommerce-tabs ul.tabs,
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover, 
.woocommerce a.button.alt:disabled[disabled], 
.woocommerce a.button.alt:disabled[disabled]:hover, 
.woocommerce button.button.alt.disabled, 
.woocommerce button.button.alt.disabled:hover, 
.woocommerce button.button.alt:disabled, 
.woocommerce button.button.alt:disabled:hover, 
.woocommerce button.button.alt:disabled[disabled], 
.woocommerce button.button.alt:disabled[disabled]:hover, 
.woocommerce input.button.alt.disabled, 
.woocommerce input.button.alt.disabled:hover, 
.woocommerce input.button.alt:disabled, 
.woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt:disabled[disabled], 
.woocommerce input.button.alt:disabled[disabled]:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle
{
	border-color: {$color};
}

#ht-masthead,
.woocommerce-error, 
.woocommerce-info, 
.woocommerce-message{
border-top-color: {$color};
}

.nav-next a:after{
border-left-color: {$color};
}

.nav-previous a:after{
border-right-color: {$color};
}

.ht-active .ht-service-icon{
    box-shadow: 0px 0px 0px 2px #FFF, 0px 0px 0px 4px {$color};
}

.woocommerce ul.products li.product .onsale:after{
	border-color: transparent transparent {$darker_color} {$darker_color};
}

.woocommerce span.onsale:after{
	border-color: transparent {$darker_color} {$darker_color} transparent
}

.ht-portfolio-caption,
.ht-team-member-excerpt,
.ht-title-wrap{
	background:{$color_rgba}
}

@media screen and (max-width: 1000px){
.toggle-bar,
.ht-main-navigation .ht-menu{
	background:{$color}
}
}
";

    return punte_css_strip_whitespace($custom_css);
}