<?php
/**
 * ------------------------------------------------------------------------
 * Teresa Template
 * ------------------------------------------------------------------------
 * Copyright (C) Buildal Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Buildal Solutions Co., Ltd
 * Websites:  http://www.buildal.ug -  https://www.teresa.edu.ug
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */
defined('_JEXEC') or die();
$count = $helper->getRows('data.desc');
?>

<div id="acm-testimonial-<?php echo $module->id; ?>" class="acm-testimonial style-1 items-<?php echo $helper->get(
    'num-items'
); ?>">
	<div class="container">
		<div class="owl-carousel owl-theme">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<div class="testimonial-item">
					<!-- Description -->
					<?php if ($helper->get('data.desc', $i)): ?>
						<div class="testimonial-desc h4">
							<?php echo $helper->get('data.desc', $i); ?>
						</div>
					<?php endif; ?>

					<?php if ($helper->get('data.author', $i)): ?>
						<div class="testimonial-author fs-sm text-primary"><?php echo $helper->get(
          'data.author',
          $i
      ); ?> </div>
					<?php endif; ?>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    var owl = $('#acm-testimonial-<?php echo $module->id; ?> .owl-carousel');
		owl.owlCarousel({
			items: <?php echo $helper->get('num-items'); ?>,
			addClassActive: true,
			itemsScaleUp : true,
			margin: 0,
			nav : false,
			navText : ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
			loop: <?php echo $count > 2 ? 'true' : 'false'; ?>,
			dots: true,
			autoPlay: <?php echo $helper->get('autoplay'); ?>,
			smartSpeed: 2000,
			autoHeight: true,
			responsive : {
		    0 : {
		    	items: 1,

		    },
		    992 : {
		    	items: 2
		    },
		    1200 : {
		    	items: <?php echo $helper->get('num-items'); ?>
		    }
			}
		});
  });
})(jQuery);
</script>