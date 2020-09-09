<?php
header ("Content-Type:text/css");
$color = "#AE945B"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#AE945B";
}


function hex2rgba( $color, $opacity) {

    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    if (strlen($color) == 6) {
        list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity.')';

    return $rgb;
}


?>

.theme-btn, .theme-btn-s2, .theme-btn-s3, .theme-btn-s4, .theme-btn:hover, .theme-btn-s2:hover, .theme-btn-s3:hover, .theme-btn-s4:hover, .theme-btn:focus, .theme-btn-s2:focus, .theme-btn-s3:focus, .theme-btn-s4:focus, .theme-btn:active, .theme-btn-s2:active, .theme-btn-s3:active, .theme-btn-s4:active, .back-to-top:hover, .back-to-top, .service-sidebar .service-list-widget a:hover, .service-sidebar .service-list-widget .current a, .feature-projects .count:before, .projects-pg-section .count:before, .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover, .btn-primary, .btn-primary:hover, .site-header .navbar-header button, .site-header #navbar .close-navbar, .hero .slick-dots button{
    background-color: <?php echo  $color ?>;
}

.section-title > span, .section-title-s2 > span, .section-title-s3 > span, .services-section .grid:hover h3 a, .services-section .view-details a:hover, .services-section .view-details a, .about-section .video-holder .fi::before, .about-section-s2 .video-holder .fi::before, .testimonials-section .client-info h4, .feature-projects .view-all a, .projects-pg-section .view-all a, .fun-fact-section .fi::before, .recent-blog-section .blog-grids .details h3 a:hover, .recent-blog-section .meta li a:hover, .newsletter-section .newsletter button i, .site-footer .contact-widget li span, .header-style-1 .topbar .contact-info ul li i, .header-style-2 .topbar .contact-info ul li i, .header-style-3 .topbar .contact-info ul li i, .site-header #navbar > ul li a:hover, .site-header #navbar > ul li a:focus, .site-header #navbar > ul > li .sub-menu a:hover, .page-title .breadcrumb li a, .page-title .breadcrumb li a:hover, .page-title .breadcrumb > li + li::before, .site-footer .link-widget ul a:hover, .site-footer .link-widget ul li:hover::before, .site-footer .about-widget .social-icons ul a:hover, .feature-projects .view-all a:hover, .projects-pg-section .view-all a:hover, .site-footer .lower-footer ul a:hover, .blog-pg-section .post h3 a:hover, .blog-pg-section .post .meta a:hover, .blog-pg-section .entry-details .read-more, .blog-single-section .post .meta a:hover, .contact-pg-section .info-box .social a:hover, .contact-pg-section-s2 .info-box .social a:hover, .testimonials-section .owl-theme .owl-controls .owl-nav [class*=owl-]:hover i:before, .error-404-section .content h2, .error-404-section .content h3, .error-404-section .content .icon i, .blog-sidebar .popular-post-widget .post-info > a:hover, .blog-sidebar .search-widget button, .bobt{
    color: <?php echo  $color ?>;
}

.features-section .features-grids .grid{
    border-top: 3px solid <?php echo  $color ?>;
}

.section-title-s2 h2::before, .about-pg-section .about-pic-video .ceo-holder::before, .contact-section .contact-info{
    background: <?php echo  $color ?>;
}
.theme-btn-s3{
    border: 2px solid <?php echo  $color ?>;
}

.contact-pg-section form input:focus, .contact-pg-section-s2 form input:focus,
.contact-pg-section form textarea:focus,
.contact-pg-section-s2 form textarea:focus, .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover, .btn-primary, .btn-primary:hover{
    border-color: <?php echo  $color ?>;
}

.theme-btn-s4 {
  color: #000;
}

.recent-blog-section .blog-grids .date, .cta-s2-section::before {
    background-color: <?php echo hex2rgba($color,'0.6')?>;
}

.hero-style-1 .slide:before, .hero-style-2 .slide:before, .hero-style-3 .slide:before, .page-title:before{
    background: -webkit-linear-gradient(top, #0a172b 55%, <?php echo  $color ?>);
}

h1, h2, h3, h4, h5, h6{
    color: #000;
}
