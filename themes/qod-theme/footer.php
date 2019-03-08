<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

 ?>
 
			</div><!-- #content -->
 
			<footer id="colophon" class="site-footer" role="contentinfo"> <!-- display the page created in the footer-->
				<div class="site-info">
					<?php 
						wp_nav_menu( 
					 	array( 
						 	'theme_location' => 'primary', 
							 'menu_id' => 'primary-menu',
							 'menu_class' => 'footer-navigation'
						 	) 
						); 
					?>
					<p>Brought to you by <a href="http://www.github.com/kerv917">Kerveland Richardson</a></p>	
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->
 
		<?php wp_footer(); ?>
 
	</body>
 </html>