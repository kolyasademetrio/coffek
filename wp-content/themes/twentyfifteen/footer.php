<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

		</div><!-- site__main -->
	</div><!-- content__main -->

	<footer id="colophon" class="footer" role="contentinfo">
		<div class="container footer__container">
			<div class="row footer__row">
				<div class="col-xs-12 footer__col">
					<div class="footer__inner">
						<div class="footer__logoWrap">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_logo_sidebar') ) :
							endif; ?>
						</div>

						<div class="footer__contWrap">
							<div class="footer__phoneMenuWrap">
								<?php
								ob_start();
								dynamic_sidebar('header_phone_sidebar');
								$header__phone = ob_get_clean();
								$header__phone = trim( strip_tags($header__phone) );
								?>
								<a href="tel:<?php echo str_replace( array(' ', '(', ')', '-'), '', $header__phone ); ?>" class="footer__phone">
									<?php echo $header__phone; ?>
								</a>

								<div class="footer__menuWrap">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_menu_sidebar') ) :
									endif; ?>
								</div>
							</div>

							<div class="footer__tryWrap">
								<a href="https://play.google.com/store/apps/details?id=com.coffeepos" class="footer__tryLink" target="_blank">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header_try_free_sidebar') ) :
									endif; ?>
								</a>

							</div>

							<div class="footer__socialsWrap">
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
	</footer><!-- .site-footer -->

</div><!-- wrapper__main -->

<?php wp_footer(); ?>

</body>
</html>
