<?php
/*
 * ------------------------------------------------------------------------
 * JA Mono Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Buildal Solutions Co., Ltd
 * Websites:  http://www.buildal.ug -  https://www.teresa.edu.ug
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */
defined('_JEXEC') or die();
use Joomla\CMS\Layout\LayoutHelper;

$params = $displayData['params'];
$title = $displayData['title'];
$item = $displayData['item'];
$canEdit = $params->get('access-edit');
$print = $displayData['print'];

$info = $params->get('info_block_position', 0);
$icons =
    !empty($this->print) ||
    $canEdit ||
    $params->get('show_print_icon') ||
    $params->get('show_email_icon');

// Check if associations are implemented. If they are, define the parameter.
$assocParam =
    JLanguageAssociations::isEnabled() && $params->get('show_associations');

// Todo Not that elegant would be nice to group the params
$useDefList =
    $params->get('show_modify_date') ||
    $params->get('show_publish_date') ||
    $params->get('show_create_date') ||
    $params->get('show_hits') ||
    $params->get('show_category') ||
    $params->get('show_parent_category') ||
    $params->get('show_author') ||
    $assocParam;
?>

<div class="ja-masthead<?php echo $params->get(
    'moduleclass_sfx',
    ''
); ?> view-article-info">
	<div class="container">
		<div class="ja-masthead-detail">
			<?php echo JHtml::_('content.prepare', '{loadposition breadcrumbs}'); ?>

			<h1 class="ja-masthead-title"><?php echo $title; ?></h1>

			<!-- Aside -->
			<?php if ($useDefList && ($info == 0 || $info == 2)): ?>
			<div class="article-aside">
		<?php if ($useDefList && ($info == 0 || $info == 2)): ?>
				<?php echo LayoutHelper::render('joomla.content.info_block', [
        'item' => $item,
        'params' => $params,
        'position' => 'above',
    ]); ?>
			<?php endif; ?>

		<?php if (!$print): ?>
			<?php if (
       $canEdit ||
       $params->get('show_print_icon') ||
       $params->get('show_email_icon')
   ): ?>
				<?php echo LayoutHelper::render('joomla.content.icons', [
        'params' => $params,
        'item' => $item,
        'print' => false,
    ]); ?>
			<?php endif; ?>
		<?php else: ?>
			<?php if ($useDefList): ?>
				<div id="pop-print" class="btn hidden-print">
					<?php echo HTMLHelper::_('icon.print_screen', $item, $params); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
			<?php endif; ?>
			<!-- // Aside -->
		</div>
	</div>
</div>