<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;

	$count = count($list);
	$modShow = $params->get('show-link');
	$modCat = $params->get('title-category');
	$modMenu = $params->get('link-category');
	$moduleAli = $params->get('sub-align','left');

	$modTitle = '';

	if($module->showtitle != 0) {
		$modTitle = 'has-title'.'-'.$moduleAli;
	}
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
?>
<div id="mod-articles-<?php echo $module->id; ?>" class="mod-article-highlight <?php echo $modTitle.' '.$moduleclass_sfx; ?>" >
	<div class="row">
		<?php if ($grouped) : ?>
			<div class="alert alert-warning">
				<?php echo text::_('TPL_NO_SUPPORT') ;?>
			</div>
		<?php else : ?>
			<?php $i=1; foreach ($list as $item) : ?>
				<?php
					// Intro Image
					$introImage = json_decode($item->images)->image_intro;
				?>

				<?php if($i<=2) :?>
					<div class="col-12 col-xl-6 item-<?php echo ($i==1) ? 'highlight' : 'child' ;?>" >
				<?php endif;?>
					<div class="item-inner <?php if($introImage) echo 'has-image' ?>">
						
						<!-- Intro Image -->
						<?php if($introImage) : ?>
						<div class="intro-image">
							<img src="<?php echo $introImage ;?>" alt="Intro Image" />
						</div>
						<?php endif ;?>

						<div class="article-content">
							<!-- Title -->
							<div class="title">
								<?php if ($params->get('link_titles') == 1) : ?>
									<h3>
										<a class="mod-articles-category-title <?php echo $item->active; ?> link-heading" href="<?php echo $item->link; ?>">
											<?php echo $item->title; ?>
										</a>
									</h3>
								<?php else : ?>
									<h3>
										<?php echo $item->title; ?>
									</h3>
								<?php endif; ?>
							</div>

							<div class="article-aside">
								<?php if($item->displayCategoryTitle || $item->displayDate) :?>
								<div class="article-info">
									<?php if ($params->get('show_author')) : ?>
										<span class="articles-writtenby">
											<?php echo Text::_('TPL_BY').' '.'<b>'.$item->displayAuthorName.'</b>'; ?>
										</span>
									<?php endif; ?>

									<?php if ($item->displayDate) : ?>
										<span class="articles-date">
											<?php echo $item->displayDate; ?>
										</span>
									<?php endif; ?>

									<?php if ($item->displayCategoryTitle) : ?>
										<span class="category">
											<?php echo $item->displayCategoryTitle; ?>
										</span>
									<?php endif; ?>

									<?php if ($item->displayHits) : ?>
										<span class="articles-hits">
											<i class="far fa-eye"></i> <?php echo $item->displayHits; ?>
										</span>
									<?php endif; ?>
								</div>
								<?php endif; ?>
							</div>

							<?php if($i==1) :?>
								<?php if ($params->get('show_introtext')) : ?>
									<div class="articles-introtext">
										<?php echo $item->displayIntrotext; ?>
									</div>
								<?php endif; ?>

								<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
									<div class="mod-articles-category-tags mt-3">
										<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
									</div>
								<?php endif; ?>

								<?php if ($params->get('show_readmore')) : ?>
									<p class="articles-readmore">
										<a class="articles-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
											<?php if ($item->params->get('access-view') == false) : ?>
												<?php echo Text::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
											<?php elseif ($readmore = $item->alternative_readmore) : ?>
												<?php echo $readmore; ?>
												<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
												<span class="d-none"><?php echo Text::_('TPL_READ_MORE'); ?></span>
												<i class="fas fa-arrow-right"></i>
											<?php else : ?>
												<?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
												<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php endif; ?>
										</a>
									</p>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				<?php if($i==1 || $i==$count) :?>
					</div>
				<?php endif;?>
			<?php $i++; endforeach; ?>
		<?php endif; ?>
	</div>

	<?php if($modShow && $modCat) :?>
		<div class="bottom-actions text-center">
			<a class="btn btn-outline-primary btn-arrow-right" href="<?php  echo JRoute::_("index.php?Itemid={$modMenu}"); ?>" title="<?php echo $modCat ;?>">
					<?php echo $modCat ;?>
			</a>
		</div>
	<?php endif ;?>
</div>
