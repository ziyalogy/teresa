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

<div class="acm-cta style-1">
	<div class="container">
		<div class="cta-inner bg-<?php echo $helper->get('bg-content'); ?>">
			<div class="row">
				<div class="col-12 col-lg-6 text-<?php echo $moduleAli; ?>">
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

					<?php if ($helper->get('cta-desc')): ?>
					<div class="d-block d-lg-none mb-4">
						<div class="cta-desc h4 text-white">
							<?php echo $helper->get('cta-desc'); ?> 
						</div>
					</div>
					<?php endif; ?>

					<?php if ($helper->get('cta-title')): ?>
					<div class="cta-action">
						<a href="<?php echo $helper->get(
          'cta-link'
      ); ?>" class="btn btn-outline-light btn-arrow-right">
							<?php echo $helper->get('cta-title'); ?> 
						</a>
					</div>
					<?php endif; ?>
				</div>

				<?php if ($helper->get('cta-desc')): ?>
				<div class="col-12 col-lg-6 d-none d-lg-block">
					<div class="cta-desc h4 text-white">
						<?php echo $helper->get('cta-desc'); ?> 
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
