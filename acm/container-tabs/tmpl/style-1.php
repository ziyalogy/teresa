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
if (version_compare(JVERSION, '4', 'ge')) {
    \Joomla\CMS\HTML\HTMLHelper::_('bootstrap.tab', '', []);
}

$items_position = $helper->get('position');
$mods = JModuleHelper::getModules($items_position);
?>
<div class="acm-container-tabs" id="mod-<?php echo $module->id; ?>">
	<div class="container-tabs-nav">
		<div class="container">

			<!-- BEGIN: TAB NAV -->
			<ul class="nav nav-tabs" role="tablist">
				<?php
    $i = 0;
    foreach ($mods as $mod): ?>
					<li class="nav-item">
						<a class="nav-link <?php if ($i < 1) {
          echo 'active';
      } ?>" href="#mod-<?php echo $mod->id; ?>" role="tab"
							 data-toggle="tab"><?php echo $mod->title; ?></a>
					</li>
					<?php $i++;endforeach;
    ?>

			</ul>
			<!-- END: TAB NAV -->
		</div>
	</div>

	<!-- BEGIN: TAB PANES -->
	<div class="tab-content">
		<?php echo $helper->renderModules($items_position, [
      'style' => 'ACMContainerItems',
      'active' => 0,
      'tag' => 'div',
      'class' => 'tab-pane fade show',
  ]); ?>
	</div>
	<!-- END: TAB PANES -->
</div>