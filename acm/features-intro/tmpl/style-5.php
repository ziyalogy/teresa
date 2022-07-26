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
$columns = 2;
?>

<div class="acm-features style-5">
	<?php for ($i = 0; $i < $count; $i++): ?>
	<div class="features-item">
		<div class="container">
			<div class="row large-gutters align-<?php echo $helper->get(
       'align-media',
       $i
   ); ?>">
				<?php if ($helper->get('img', $i)): ?>
					<div class="col-12 col-lg-6 features-media">
						<div class="intro-img">
							<img src="<?php echo $helper->get('img', $i); ?>" alt="" />
						</div>				
					</div>
				<?php endif; ?>

				<div class="col-12 col-lg-6 features-desc">
					<div class="info-wrap">
						<div class="inner">
							<?php if ($helper->get('title', $i)): ?>
								<div class="title h2">
									<?php echo $helper->get('title', $i); ?>
								</div>
							<?php endif; ?>

							<?php if ($helper->get('description', $i)): ?>
								<div class="description">
									<?php echo $helper->get('description', $i); ?>
								</div>
							<?php endif; ?>

							<?php if ($helper->get('link', $i)): ?>
								<div class="actions">
									<a href="<?php echo $helper->get(
             'link',
             $i
         ); ?>" class="btn btn-outline-primary btn-arrow-right">
										<?php echo $helper->get('link-title', $i); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endfor; ?>
</div>
