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
$count = $helper->getRows('title');
// MODULE CONFIG
$moduleTitle = $module->title;
$moduleMain = $params->get('main-heading');

// Sub Align
$moduleAli = $params->get('sub-align', 'left');

// Main Color
$mainColor = $params->get('main-color', 'normal');

// Sub Color
$titleColor = $params->get('title-color', 'normal');

// Title Space
$titleSpace = $params->get('title-space', 'large');
?>

<div class="acm-hero style-3 text-<?php echo $moduleAli; ?>">
	<div class="row g-0">
		<div class="col-12 col-lg-6 order-2 order-lg-1">
			<div class="feature-inner bg-<?php echo $helper->get('bg-content'); ?>">
				<?php if ($module->showtitle == '1' || $moduleMain): ?>
				<div class="section-title-wrap text-<?php echo $moduleAli; ?> space-<?php echo $titleSpace; ?>">
					<?php if ($module->showtitle == '1'): ?>
						<h3 class="section-title h6 text-<?php echo $titleColor; ?>">
							<span><?php echo $moduleTitle; ?></span>
						</h3>
					<?php endif; ?>

					<?php if ($moduleMain): ?>
						<div class="main-heading mt-0 text-<?php echo $mainColor; ?> h2">
							<?php echo $moduleMain; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>

				<?php if ($helper->get('hero-desc')): ?>
				<div class="hero-desc">
					<?php echo $helper->get('hero-desc'); ?>
				</div>
				<?php endif; ?>

				<?php if ($helper->get('btn-title')): ?>
				<div class="hero-action">
					<a href="<?php echo $helper->get(
         'btn-link'
     ); ?>" title="<?php echo $helper->get(
    'btn-title'
); ?>" class="btn btn-outline-primary btn-arrow-right">
						<?php echo $helper->get('btn-title'); ?>
					</a>
					
				</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="col-12 col-lg-6 intro-image order-1 order-lg-2" style="background-image:  url('<?php echo $helper->get(
      'intro-image'
  ); ?>')">
		</div>
	</div>
</div>