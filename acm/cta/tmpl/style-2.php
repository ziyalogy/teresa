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
$moduleTitle = $module->title;
?>

<div class="acm-cta style-2">
	<div class="cta-inner" style="background-image: url('<?php echo $helper->get(
     'bg-content'
 ); ?>');">
		<div class="container">
			<?php if ($module->showtitle == '1'): ?>
				<div class="cta-title h2">
					<?php echo $moduleTitle; ?> 
				</div>
			<?php endif; ?>

			<?php if ($helper->get('cta-desc')): ?>
				<div class="cta-desc lead">
					<?php echo $helper->get('cta-desc'); ?> 
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
	</div>
</div>
