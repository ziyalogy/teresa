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

$columns = $helper->get('columns');
$count = $helper->getRows('data-style-1.stats-count');
?>

<div class="acm-stats style-1">
  <?php if ($helper->get('statistics-desc')): ?>
    <div class="stats-desc h3">
      <?php echo $helper->get('statistics-desc'); ?>
    </div>
  <?php endif; ?>

  <?php for ($i = 0; $i < $count; $i++): ?>
    <?php if ($i % $columns == 0) {
        echo '<div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-' .
            $columns .
            '">';
    } ?>

    <div class="stats-inner col">
      <span class="stats-item-counter h3 text-<?php echo $helper->get(
          'color-count'
      ); ?>">
  			<?php echo $helper->get('data-style-1.stats-count', $i); ?>
  		</span>

      <?php if ($helper->get('data-style-1.stats-name', $i)): ?>
        <h5><?php echo $helper->get('data-style-1.stats-name', $i); ?></h5>
      <?php endif; ?>

      <?php if ($helper->get('data-style-1.stats-desc', $i)): ?>
        <span class="description"><?php echo $helper->get(
            'data-style-1.stats-desc',
            $i
        ); ?></span>
      <?php endif; ?>
    </div>
  <?php if ($i % $columns == $columns - 1 || $i == $count - 1) {
      echo '</div>';
  } ?>
  <?php endfor; ?>
</div>