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

<div class="wrapper__main">
	<div class="content__main">

		<!--header-->
		<header class="header" id="header">

			<div class="container-fluid header__container">
				<div class="row header__row">
					<div class="col-xs-12 header__col">
						<div class="header__inner">
							<a href=".header__contWrap" class="header__hamburger">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_hamburger_sidebar') ) :
								endif; ?>
							</a>

							<div class="header__langSwitcherWrap">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_lang_switcher_sidebar') ) :
								endif; ?>
							</div>

							<div class="header__logoWrap">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_logo_sidebar') ) :
								endif; ?>
							</div>

							<div class="header__contWrap">

								<?php
								ob_start();
								dynamic_sidebar('header_phone_sidebar');
								$header__phone = ob_get_clean();
								$header__phone = trim( strip_tags($header__phone) );
								?>
								<a href="tel:<?php echo str_replace( array(' ', '(', ')', '-'), '', $header__phone ); ?>" class="header__phone">
									<?php echo $header__phone; ?>
								</a>

								<div class="header__authWrap authHidden">
									<a href="https://signumservise.seotm.top/admin/site/login" class="header__authLink" target="_blank">
										<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_auth_sidebar') ) :
										endif; ?>
									</a>
								</div>

								<div class="header__menuWrap">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_menu_sidebar') ) :
									endif; ?>
								</div>

								<?php
								ob_start();
								dynamic_sidebar('header_phone_sidebar');
								$header__phone = ob_get_clean();
								$header__phone = trim( strip_tags($header__phone) );
								?>
								<a href="tel:<?php echo str_replace( array(' ', '(', ')', '-'), '', $header__phone ); ?>" class="header__phone phoneHidden">
									<?php echo $header__phone; ?>
								</a>

								<div class="header__authWrap">
									<a href="https://signumservise.seotm.top/admin/site/login" class="header__authLink" target="_blank">
										<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_auth_sidebar') ) :
										endif; ?>
									</a>
								</div>

								<div class="header__socialLangWrap">
									<div class="header__socialsWrap">
										<div class="social__wrap">
											<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_menu_social_sidebar') ) :
											endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</header>

		<div id="main" class="site__main">
