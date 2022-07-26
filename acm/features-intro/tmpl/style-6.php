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
$count = $helper->getRows('data.time');
// Sub Align
$moduleAli = $params->get('sub-align', 'left');

$modTitle = '';

if ($module->showtitle != 0) {
    $modTitle = 'has-title' . '-' . $moduleAli;
}
?>

<div class="acm-features style-6 border-style-<?php echo $helper->get(
    'border-style'
); ?> <?php echo $modTitle; ?>">
	<div class="container">
		<?php for ($i = 0; $i < $count; $i++): ?>
			<div class="features-item">
				<div class="item-inner row">
					<?php if ($helper->get('data.time', $i)): ?>
						<div class="time col-12 col-lg-2 order-2 order-lg-1">
							<?php echo $helper->get('data.time', $i); ?>
						</div>
					<?php endif; ?>

					<?php if ($helper->get('data.img', $i)): ?>
						<div class="img col-12 col-lg-3 order-1 order-lg-2 mb-3 mb-lg-0">
							<img src="<?php echo $helper->get('data.img', $i); ?>" alt="" />
						</div>
					<?php endif; ?>

					<div class="col-12 col-lg-7 order-3">
						<?php if ($helper->get('data.title', $i)): ?>
							<h3 class="title">
								<?php echo $helper->get('data.title', $i); ?>
							</h3>
						<?php endif; ?>

						<?php if ($helper->get('data.description', $i)): ?>
							<div class="description">
								<?php echo $helper->get('data.description', $i); ?>
							</div>
						<?php endif; ?>
					</div>

				</div>
			</div>
		<?php endfor; ?>

		<?php if ($helper->get('btn-link')): ?>
		<div class="bottom-actions text-center">
			<a class="btn btn-outline-primary btn-arrow-right" href="<?php echo $helper->get(
       'btn-link'
   ); ?>" title="<?php echo $helper->get('btn-title'); ?>">
				<?php echo $helper->get('btn-title'); ?>		
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>