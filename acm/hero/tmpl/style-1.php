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
$bgHero = '';

if ($helper->get('ft-bg')) {
    $bgHero =
        'style="background-image: url(' .
        JUri::root() .
        '' .
        $helper->get('ft-bg') .
        ');"';
}
?>

<div class="acm-hero style-1 align-<?php echo $helper->get(
    'ft-align'
); ?>" <?php echo $bgHero; ?>>
	<div class="mask" style="opacity: <?php echo $helper->get('ft-mask'); ?>"></div>
	<div class="container">
		<div class="hero-item">
			<?php if ($helper->get('title')): ?>
				<h1><?php echo $helper->get('title'); ?></h1>
			<?php endif; ?>
		</div>
	</div>
</div>