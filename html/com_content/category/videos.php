<?php
/*
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
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;

require_once dirname(dirname(__FILE__)) . '../../../helper.php';
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
// JHtml::addIncludePath('templates/ja_symphony/html/com_content');
JHtml::addIncludePath(dirname(dirname(__FILE__)));
// JHtml::_('behavior.caption');
$mainframe = JFactory::getApplication();
$jinput = $mainframe->input;

$numresult = JATemplateHelper::getArticleContentNumber('video');
$app = JFactory::getApplication('site');
$mergedParams = $app->getParams();
$menuParams = new \Joomla\Registry\Registry();
//var_dump($mergedParams);die();
$ordering[] = $mergedParams->get('orderby_sec', '');
//var_dump($ordering);die();
$result = JATemplateHelper::getArticleContent('video', '', $ordering);

if ($menu = $app->getMenu()->getActive()) {
    $menuParams_tmp = version_compare(JVERSION, '4', 'ge')
        ? $menu->getParams()
        : $menu->params;
    $menuParams->loadString($menuParams_tmp);
}

$mergedParams = clone $menuParams;
$mergedParams->merge($mergedParams);

// Set limit for query. If list, use parameter. If blog, add blog parameters for limit.
if (
    $app->input->get('layout') == 'blog' ||
    $mergedParams->get('layout_type') == 'blog'
) {
    $limit =
        $mergedParams->get('num_leading_articles') +
        $mergedParams->get('num_intro_articles') +
        $mergedParams->get('num_links');
} else {
    $limit = $app->getUserStateFromRequest(
        'com_content.category.list.' . $itemid . '.limit',
        'limit',
        $mergedParams->get('display_num'),
        'uint'
    );
}
$limitstart = $jinput->get('limitstart', 0);
// In case limit has been changed, adjust it
$limitstart = $limit != 0 ? floor($limitstart / $limit) * $limit : 0;
$this->columns = !empty($this->columns)
    ? $this->columns
    : $this->params->get('num_columns');
?>
<div class="blog video-list<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading', 1)): ?>
	<div class="page-header clearfix">
		<h1 class="page-title"> <?php echo $this->escape(
      $this->params->get('page_heading')
  ); ?> </h1>
	</div>
	<?php endif; ?>
	<?php if (
     $this->params->get('show_category_title', 1) or
     $this->params->get('page_subheading')
 ): ?>
  	<div class="page-subheader clearfix">
  		<h2 class="page-subtitle"><?php echo $this->escape(
        $this->params->get('page_subheading')
    ); ?>
			<?php if ($this->params->get('show_category_title')): ?>
			<small class="subheading-category"><?php echo $this->category->title; ?></small>
			<?php endif; ?>
  		</h2>
	</div>
	<?php endif; ?>
	
	<?php if (
     $this->params->get('show_tags', 1) &&
     !empty($this->category->tags->itemTags)
 ): ?>
		<?php echo JLayoutHelper::render(
      'joomla.content.tags',
      $this->category->tags->itemTags
  ); ?>
	<?php endif; ?>
	
	<?php if (
     $this->params->get('show_description', 1) ||
     $this->params->def('show_description_image', 1)
 ): ?>
	<div class="category-desc clearfix">
		<?php if (
      $this->params->get('show_description_image') &&
      $this->category->getParams()->get('image')
  ): ?>
			<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
		<?php endif; ?>
		<?php if (
      $this->params->get('show_description') &&
      $this->category->description
  ): ?>
			<?php echo HTMLHelper::_(
       'content.prepare',
       $this->category->description,
       '',
       'com_content.category'
   ); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if (
     empty($this->lead_items) &&
     empty($this->link_items) &&
     empty($this->intro_items)
 ): ?>
		<?php if ($this->params->get('show_no_articles', 1)): ?>
			<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
 $introcount = count($result);
 $counter = 0;
 ?>

	<div class="ja-videos-list-wrap">
		<div id="ja-main-player" class="embed-responsive embed-responsive-16by9">
			<div id="videoplayer">
				<?php echo JLayoutHelper::render('joomla.content.video_play', [
        'item' => $result[0],
        'context' => 'featured',
    ]); ?>
			</div>
		</div>

		<script type="text/javascript">

			(function($){
				$(document).ready(function(){
					$('#ja-main-player').find('iframe.ja-video, video, .jp-video, .jp-jplayer').each(function(){
						var container = $('#ja-main-player');
						var width = container.outerWidth(true);
						var height = container.outerHeight(true);

						$(this).removeAttr('width').removeAttr('height');
						$(this).css({width: width, height: height});
					});
				});
			})(jQuery);
		</script>
	</div>

	<?php if (!empty($result)): ?>
  <div id="item-container">
  	<div class="items-row cols-<?php echo (int) $this->columns; ?> row v-gutters">
		<?php foreach ($result as $key => &$item): ?>
			<?php $rowcount = ((int) $counter % (int) $this->columns) + 1; ?>
			<div class="col-12 col-md-<?php echo $this->columns > 2
       ? '6'
       : round(12 / $this->columns); ?> col-lg-<?php echo round(
     12 / $this->columns
 ); ?> news-medium">
				<div class="article-inner <?php echo $item->state == 0
        ? ' system-unpublished'
        : null; ?>">
						<?php
      $this->item = &$item;
      echo $this->loadTemplate('item');
      ?>
					<?php $counter++; ?>
				</div><!-- end span -->
			</div>
		<?php endforeach; ?>
		</div>
  </div>
	<?php endif; ?>

	
	<?php if (
     !empty($this->children[$this->category->id]) &&
     $this->maxLevel != 0
 ): ?>
	<div class="cat-children">
		<?php if ($this->params->get('show_category_heading_title_text', 1) == 1): ?>
		<h3> <?php echo Text::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
		<?php endif; ?>
		<?php echo $this->loadTemplate('children'); ?> </div>
	<?php endif; ?>
	<?php
 $show_option = $this->params->get('show_pagination');
 $pagination_type = $this->params->get('pagination_type');
 ?>
	<?php
 $this->pagination = new JPagination($numresult, $limitstart, $limit);
 $pagesTotal = isset($this->pagination->pagesTotal)
     ? $this->pagination->pagesTotal
     : $this->pagination->get('pages.total');
 if (
     ($this->params->def('show_pagination', 1) == 1 ||
         $this->params->get('show_pagination') == 2) &&
     $pagesTotal > 1
 ): ?>
		<div class="pagination-wrap">
			<?php if ($this->params->def('show_pagination_results', 1)): ?>
			<div class="counter"> <?php echo $this->pagination->getPagesCounter(); ?></div>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>

		<!-- Show load more use infinitive-scroll -->
	  <?php
   JHtml::_('jquery.framework');
   JFactory::getDocument()->addScript(
       JUri::base() .
           'templates/' .
           $app->getTemplate() .
           '/js/infinitive-paging.js'
   );
   JFactory::getDocument()->addScript(
       JUri::base() .
           'templates/' .
           $app->getTemplate() .
           '/js/jquery.infinitescroll.js'
   );
   $mode = 'manual';

   if ($this->pagination->pagesTotal > 1): ?>
	        <script>
	            jQuery(".pagination-wrap").css('display','none');
	        </script>
	        <div class="bottom-actions text-center">
	        	<div id="infinity-next" class="btn btn-outline-primary btn-arrow-right hide" data-limit="<?php echo $this
              ->pagination
              ->limit; ?>" data-url="<?php echo JUri::current(); ?>" data-mode="<?php echo $mode; ?>" data-pages="<?php echo $this
    ->pagination->pagesTotal; ?>" data-finishedmsg="<?php echo JText::_(
    'T4_LOADMORE_END_MSG'
); ?>"><?php echo JText::_('T4_LOAD_MORE'); ?></div>
	        </div>
	    <?php else: ?>
	    		<div class="infinity-wrap">
	        	<div id="infinity-next" class="btn btn-outline-primary btn-arrow-right disabled" data-pages="1"><?php echo Text::_(
              'T4_LOADMORE_END_MSG'
          ); ?></div>
	      	</div>
	    <?php endif;
   ?>
	<?php endif;
 ?>
</div>
