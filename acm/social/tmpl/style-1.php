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
$count = $helper->getRows('link');
?>

<div class="acm-social style-1">
  <div class="social-follow-wrap">
    <div class="social-follow d-flex">
    	<?php for ($i = 0; $i < $count; $i++): ?>
      	<div class="social-inner">
      		<a href="<?php echo $helper->get(
            'link',
            $i
        ); ?>" title="<?php echo $helper->get('title', $i); ?>">
            <span class="<?php echo $helper->get('font-icon', $i); ?>"></span>
      			<span class="d-none"><?php echo $helper->get('title', $i); ?></span>
      		</a>
      	</div>
      <?php endfor; ?>
    </div>
  </div>
</div>
