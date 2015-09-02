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

	
	
</div><!-- .site-content -->

		
		
	<footer id="colophon" class="site-footer" role="contentinfo">
	




	<div class="site-info">
			 
			 
		
	<div class="footer-top">
	
	
		<div class="row">
 <div class="col-xs-12 col-sm-6 col-md-6">
			 		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
</div>


 <div class="col-xs-12 col-sm-6 col-md-6">
 			 		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
 </div>
 </div>
 
 </div>
			<div class="row">
 <div class="col-xs-12 col-sm-6 col-md-6"><?php 
 
 global  $sakshamapp_international_;
 
 if (!isset($sakshamapp_international_['copyright_text'])) {
    echo $sakshamapp_international_['copyright_text'];
}
else
{
	echo "Website Designed by <a href='http://www.sakshamappinternational.com/' target='_blank'>Sakshamapp International Pvt. Ltd</a> ";
}
 ?>
 </div>
  <div class="col-xs-12 col-sm-6 col-md-6"><?php printSocialMedia(); ?></div>
</div>			
		 
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
