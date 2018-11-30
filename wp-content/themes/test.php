<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="preloader-wrap">
    <div id="inTurnBlurringTextG">
        <span>Anne</span><span>Versin</span>
    </div>
</div>
<script type="text/javascript">
    <?php //if ((is_front_page() || is_home()) && (empty( $_COOKIE["firstVisit"]) || $_COOKIE["firstVisit"] != 'yes')) { ?>
    <?php if ((is_front_page() || is_home())) { ?>
    var setintervalSRC = false;
    // var elem = document.createElement('div');
    // elem.className = 'preloader';
    // elem.innerHTML = '<div class="title"><div>Hair</div><div><small>and</small></div><div>Make-Up</div></div>';
    // document.body.appendChild(elem);

    var elem2 = document.createElement('div');
    elem2.className = 'preloader__imgWrap';
    document.body.appendChild(elem2);
    var __$i=0;

    function hideImg() {
        clearInterval(setintervalSRC);
        setTimeout(function(){
            document.querySelector('.preloader__imgWrap').setAttribute('style', '-webkit-transition: opacity ease 0.5s;-o-transition: opacity ease 0.5s;transition: opacity ease 0.5s;opacity:0;');
            // removeImg()
            removediv()
        }, 1000);
    }

    function removediv() {
        setTimeout(function() {
            document.querySelector('.preloader__imgWrap').remove();
        }, 500);
    }

    <?php } ?>

    window.onload = function() {
        document.querySelector('.preloader-wrap').classList.add("hide-loader");
        <?php if ((is_front_page() || is_home())) { ?>

        /* adding video */
        var video_1 = document.createElement('video');
        video_1.className = 'preloader__video_1';
        video_1.setAttribute('mute', '');
        video_1.setAttribute('autoplay', '');

        var video_source_1 = document.createElement('source'),
            video_source_attr_src_1 = cfs_get_option( 'options', 'preloader_video_1' );
        video_source_1.setAttribute('type', 'video/mp4');
        video_source_1.setAttribute('src', video_source_attr_src_1);
        video_1.appendChild(video_source_1);


        document.body.appendChild(video_1);
        /* adding video End */

        setTimeout(function(){
            var srcs = document.getElementsByClassName("preloader__img");
            var srcs_lenght = srcs.length;
            setintervalSRC = setInterval(function(){
                img_clone = srcs[__$i].cloneNode(true);
                elem2.innerHTML = '';
                elem2.appendChild(img_clone);
                if ( __$i === (srcs_lenght) ) {
                    hideImg();
                } else {
                    __$i++;
                }
            }, 250);
        }, 6000);

        <?php } ?>
    };
</script>

<div class="wrapper__main">
    <div class="content__main">

        <!--header-->
        <header class="header" id="header">

            <div class="container header__container">
                <div class="row header__row">
                    <div class="col-xs-12 header__col">
                        <div class="header__inner text-center">
                            <?php $info_p = cfs_get_option( 'options', 'information_page' ); ?>
                            <a href="<?php echo get_home_url(); ?>" class="header__logoLink homePageLink"><span>Anne</span><span>Versin</span></a>
                            <a href="<?php echo get_page_link($info_p[0]); ?>" class="header__logoLink insidePageLink"><?php echo get_the_title($info_p[0]); ?></a>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div id="main" class="site__main">
            <?php //if ((is_front_page() || is_home()) && (empty( $_COOKIE["firstVisit"]) || $_COOKIE["firstVisit"] != 'yes')) { ?>
            <?php if ((is_front_page() || is_home()) ) {
            $imgs = cfs_get_option( 'options', 'preloader' );
            if (!empty( $imgs) && is_array( $imgs)) {
                echo '<div class="hidden-img">';
                foreach ($imgs as $img) {
                    echo '<img class="preloader__img" src="'.$img['image'].'" alt="First visit">';
                }
                echo '</div>';
            } ?>
<?php }?>