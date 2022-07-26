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
?>

<div class="acm-features style-7">
	<div class="container">
		<div class="row row-cols-1 row-cols-lg-<?php echo $helper->get(
      'columns'
  ); ?> v-gutters">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<div class="col">
					<div class="features-item">
						<div class="count-step bg-highlight">
							<span class="label h5 m-0"><?php echo Jtext::_('TPL_COUNT'); ?></span>
							<span class="num h2 m-0"><?php echo $i < 9 ? '0' . ($i + 1) : $i; ?></span>
						</div>

						<div class="feature-inner">
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
		</div>

		<?php if ($helper->get('desc')): ?>
		<div class="bottom-actions text-center">
			<?php echo $helper->get('desc'); ?>
		</div>
		<?php endif; ?>
	</div>
</div>