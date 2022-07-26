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

$colItem = 'col-12 col-sm-6 col-lg-' . 12 / $column;

if ($column == 4) {
    $colItem = 'col-12 col-lg-6 col-xl-' . 12 / $column;
} elseif ($column == 3) {
    $colItem = 'col-12 col-md-4 col-lg-' . 12 / $column;
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

<div class="acm-features style-3">
	<div class="container">
		<?php if ($moduleTitle || $moduleMain || $ftDesc): ?>
		<div class="row feature-info-wrap v-gutters">
			<?php if ($module->showtitle == '1' || $moduleMain): ?>
				<div class="col-12 col-lg-4 pe-lg-5">
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

					<?php if ($ftDesc): ?>
							<div class="mod-desc">
								<?php echo $ftDesc; ?>
							</div>
						<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="col-12 col-lg-8 feature-content">
				<?php for ($i = 0; $i < $count; $i++): ?>
					<?php if ($i % $column == 0): ?>
						<div class="row text-<?php echo $ftAlign; ?> cols-<?php echo $column; ?> d-flex justify-content-center v-gutters">
					<?php endif; ?>

						<div class="<?php echo $colItem; ?>">
							<div class="features-item">
								<div class="item-inner">
									<?php if ($helper->get('img-icon', $i)): ?>
										<div class="img-icon mb-2 mb-lg-4">
											<img src="<?php echo $helper->get('img-icon', $i); ?>" alt="" />
										</div>
									<?php endif; ?>

									<?php if ($helper->get('sub-title', $i)): ?>
										<div class="section-title h3">
											<?php echo $helper->get('sub-title', $i); ?>
										</div>
									<?php endif; ?>
									
									<?php if ($helper->get('title', $i)): ?>
										<h4 class="h2 my-0">
											<?php echo $helper->get('title', $i); ?>
										</h4>
									<?php endif; ?>
									
									<?php if ($helper->get('description', $i)): ?>
										<div class="mb-0 h4 description"><?php echo $helper->get(
              'description',
              $i
          ); ?></div>
									<?php endif; ?>
								</div>
							</div>
						</div>

					<?php if ($i % $column == $column - 1 || $i == $count - 1) {
         echo '</div>';
     } ?>
				<?php endfor; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>