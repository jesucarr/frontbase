<footer class="page-footer content-info" role="contentinfo">
  <div class="container">
  	<div class="row">
	  	<?php 
	  	$footer_widget_areas = array('sidebar-footer-1', 'sidebar-footer-2', 'sidebar-footer-3', 'sidebar-footer-4');

	  	$active_footer_widget_areas = array();
	  	foreach ($footer_widget_areas as $widget_area) {
	  		if (\FrontBase\widget_area_exist_and_active($widget_area)) {
	  			array_push($active_footer_widget_areas, $widget_area);
	  		}
	  	}
	  	$span = 12/count($active_footer_widget_areas);

	  	foreach ($active_footer_widget_areas as $widget_area) :?>
	  	<div class="span<?php echo $span ?>">
	  		<?php dynamic_sidebar($widget_area); ?>
	  	</div>
	  	
	  	<?php endforeach; ?>

	    
	   
	    
  	</div>
  	<div class="row">
  		<div class="span12">
  			<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name');   ?> </p>
  			<?php wp_nav_menu(array('theme_location' => 'footer_menu', 'menu_class' => 'footer-nav')); ?>
  		</div>
  	</div>
  </div>
</footer>