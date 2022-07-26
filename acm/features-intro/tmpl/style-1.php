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
$column = $helper->get('columns');
$ftAlign = $helper->get('align');
$ftDesc = $helper->get('desc');
$imageType = $helper->get('image-type');

$colItem = 'col-12 col-sm-6 col-lg-' . 12 / $column;

if ($column == 4) {
    $colItem = 'col-12 col-lg-6 col-xl-' . 12 / $column;
} elseif ($column == 3) {
    $colItem = 'col-12 col-md-12 col-lg-' . 12 / $column;
}

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

<div class="acm-features style-1">
	<div class="container">
		<?php if ($moduleTitle || $moduleMain || $ftDesc): ?>
		<div class="row feature-info-wrap">
			<?php if ($moduleTitle || $moduleMain): ?>
				<div class="col-12 col-xl-4">
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
				</div>
			<?php endif; ?>

			<?php if ($ftDesc): ?>
			<div class="col-12 col-xl-8 feature-desc">
				<?php echo $ftDesc; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="row text-<?php echo $ftAlign; ?> cols-<?php echo $column; ?> d-flex justify-content-center v-gutters">
			<?php for ($i = 0; $i < $count; $i++): ?>
					<div class="<?php echo $colItem; ?>">
						<div class="features-item <?php if (!$helper->get('link', $i)) {
          echo 'no-link';
      } ?>">
							<div class="item-inner">
								<?php if ($helper->get('img-mask', $i)): ?>
									<div class="img-mask">
										<img src="<?php echo $helper->get('img-mask', $i); ?>" alt="" />
									</div>
								<?php endif; ?>

								<?php if ($helper->get('img-icon', $i)): ?>
									<div class="img-icon">
										<img src="<?php echo $helper->get('img-icon', $i); ?>" alt="" />
									</div>
								<?php endif; ?>

								<?php if ($helper->get('sub-title', $i)): ?>
									<div class="section-title h3">
										<?php echo $helper->get('sub-title', $i); ?>
									</div>
								<?php endif; ?>
								
								<?php if ($helper->get('title', $i)): ?>
									<h3 class="text-primary">
										<?php if ($helper->get('link', $i)): ?>
											<a href="<?php echo $helper->get('link', $i); ?>">
										<?php endif; ?>

										<?php echo $helper->get('title', $i); ?>

										<?php if ($helper->get('link', $i)): ?>
											</a>
										<?php endif; ?>
									</h3>
								<?php endif; ?>
								
								<?php if ($helper->get('description', $i)): ?>
									<p class="pr-sm-3 mb-0"><?php echo $helper->get('description', $i); ?></p>
								<?php endif; ?>
							</div>

							<?php if ($helper->get('link', $i) && $helper->get('ft-btn-title', $i)): ?>
								<div class="link-action">
									<a class="btn btn-<?php echo $helper->get(
             'ft-btn-color',
             $i
         ); ?> d-block btn-arrow-right" href="<?php echo $helper->get(
     'link',
     $i
 ); ?>">
										<?php echo $helper->get('ft-btn-title', $i); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
			<?php endfor; ?>
		</div>
	</div>
</div>