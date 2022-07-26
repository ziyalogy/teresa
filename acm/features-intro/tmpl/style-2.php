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
$count = $helper->getRows('data.title');
$column = $helper->get('columns');
?>

<div class="acm-features style-2">
	<div id="acm-feature-<?php echo $module->id; ?>" class="owl-slide">
		<div class="owl-carousel owl-theme">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<?php if ($helper->get('data.link', $i)): ?>
					<a href="<?php echo $helper->get('data.link', $i); ?>" title="">
				<?php endif; ?>

				<div class="features-item">
					<div class="features-item-inner">
						<?php if ($helper->get('data.img', $i)): ?>
							<div class="features-img" style="background-image: url('<?php echo $helper->get(
           'data.img',
           $i
       ); ?>');">
							</div>
						<?php endif; ?>
						
						<?php if (
          $helper->get('data.title', $i) ||
          $helper->get('data.description', $i)
      ): ?>
						<div class="features-text">
							<?php if ($helper->get('data.title', $i)): ?>
								<h4 class="text-secondary m-0"><?php echo $i < 9
            ? '0' . ($i + 1)
            : $i + 1; ?>.</h4>
								<h3 class="mt-1"><?php echo $helper->get('data.title', $i); ?></h3>
							<?php endif; ?>
							
							<?php if ($helper->get('data.description', $i)): ?>
								<div class="desc"><?php echo $helper->get('data.description', $i); ?></div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($helper->get('data.link', $i)): ?>
					</a>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("#acm-feature-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: <?php echo $column; ?>,
      margin: 18,
      responsive : {
      	0 : {
      		items: 1,
      	},

      	768 : {
      		items: 2,
      	},

      	1300 : {
      		items: 3,
      	},

      	1600 : {
      		items: <?php echo $column; ?>,
      	}
      },
      loop: false,
      nav : true,
      dots: false,
      autoplay: false
    });
  });
})(jQuery);
</script>