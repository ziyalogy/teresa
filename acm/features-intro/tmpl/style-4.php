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

<div class="acm-features style-4 text-<?php echo $moduleAli; ?>">
	<div class="features-background d-none d-lg-block" style="background-image: url(<?php echo $helper->get(
     'img-features'
 ); ?>)"></div>
	<div class="container">
		<div class="features-background d-block d-lg-none" style="background-image: url(<?php echo $helper->get(
      'img-features'
  ); ?>)"></div>

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-8 col-xl-6">
				<div class="features-content bg-<?php echo $helper->get('bg-content'); ?>">
					<?php if ($moduleTitle || $moduleMain): ?>
						<div class="section-title-wrap text-<?php echo $moduleAli; ?> space-<?php echo $titleSpace; ?>">
							<?php if ($moduleTitle && $module->showtitle == '1'): ?>
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

					<div class="features-item">							
						<?php if ($helper->get('description')): ?>
							<div class="features-desc">
								<?php echo $helper->get('description'); ?>
							</div>
						<?php endif; ?>
						
						<?php if ($helper->get('button')): ?>
							<div class="action">
								<a class="btn btn-outline-light btn-arrow-right" href="<?php echo $helper->get(
            'title-link'
        ); ?>"><?php echo $helper->get('button'); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>