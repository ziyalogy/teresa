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

$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$path = JURI::base(true) . '/templates/' . $app->getTemplate() . '/';
$doc->addScript($path . 'js/html5lightbox/html5lightbox.js');

$col = $helper->get('col');
?>

<div class="acm-gallery style-1">
	<div class="isotope-layout">
		<div class="isotope" style="margin: 0 -<?php echo $helper->get('gutter') /
      2; ?>px">
			<?php if ($helper->get('text-1')): ?>
				<div class="mask"></div>
			<?php endif; ?>
			
			<div class="item grid-sizer grid-xs-<?php echo $helper->get(
       'colmb'
   ); ?> grid-sm-<?php echo $helper->get(
     'coltb'
 ); ?> grid-md-<?php echo $helper->get('coldt'); ?>"></div>
			
			<?php $count = $helper->getRows('gallery.img'); ?>
			 
			 <?php for ($i = 0; $i < $count; $i++): ?>
			 <?php $itemsize = $helper->get('gallery.selectitem', $i); ?>
				<?php if ($helper->get('gallery.img', $i)): ?>
					<div class="item item-<?php echo $itemsize; ?> grid-xs-<?php echo $helper->get(
     'colmb'
 ); ?> grid-sm-<?php echo $helper->get(
     'coltb'
 ); ?> grid-md-<?php echo $helper->get('coldt'); ?> <?php echo $helper->get(
     'animation'
 ); ?>" style="padding: 0 <?php echo $helper->get('gutter') /
    2; ?>px <?php echo $helper->get('gutter'); ?>px;">
						<div class="item-image">
							<a href="<?php echo $helper->get(
           'gallery.img',
           $i
       ); ?>" class="html5lightbox" data-group="gallery" >
								<img src="<?php echo $helper->get(
            'gallery.img',
            $i
        ); ?>" alt="<?php echo $helper->get('gallery.alt', $i); ?>" >

								<span class="expand">
									<i class="fas fa-expand-alt"></i>
								</span>
							</a>
						</div>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
			
		</div>

		<?php if ($helper->get('text-1')): ?>
			<div class="caption">
				<p><?php echo $helper->get('text-1'); ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>

<script>
	(function($){
		$(document).ready(function(){
			$(".acm-gallery .html5lightbox").html5lightbox({
				autoslide: true,
				showplaybutton: false,
				jsfolder: "<?php echo $path . 'js/html5lightbox/'; ?>"
			});
		});
	})(jQuery);
</script>