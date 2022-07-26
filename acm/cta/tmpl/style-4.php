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

$colItem = 'col-12 col-sm-6 col-lg-' . 12 / $column;

if ($column == 4) {
    $colItem = 'col-12 col-lg-6 col-xl-' . 12 / $column;
} elseif ($column == 3) {
    $colItem = 'col-12 col-md-12 col-lg-' . 12 / $column;
}
?>

<div class="acm-cta style-4">
	<?php for ($i = 0; $i < $count; $i++): ?>
		<?php if ($i % $column == 0): ?>
			<div class="row cols-<?php echo $column; ?> d-flex justify-content-center">
		<?php endif; ?>

			<div class="<?php echo $colItem; ?>">
				<div class="cta-item">
					<div class="item-inner">			
						<?php if ($helper->get('title', $i)): ?>
							<h3>
								<?php if ($helper->get('link', $i)): ?>
									<a href="<?php echo $helper->get('link', $i); ?>" class="link-heading">
								<?php endif; ?>

								<?php echo $helper->get('title', $i); ?>

								<?php if ($helper->get('link', $i)): ?>
									</a>
								<?php endif; ?>
							</h3>
						<?php endif; ?>
						
						<?php if ($helper->get('description', $i)): ?>
							<div class="description"><?php echo $helper->get('description', $i); ?></div>
						<?php endif; ?>
					</div>

					<?php if ($helper->get('link', $i) && $helper->get('ft-btn-title', $i)): ?>
						<div class="link-action">
							<a href="<?php echo $helper->get('link', $i); ?>">
								<?php echo $helper->get('ft-btn-title', $i); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>

		<?php if ($i % $column == $column - 1 || $i == $count - 1) {
      echo '</div>';
  } ?>
	<?php endfor; ?>
</div>