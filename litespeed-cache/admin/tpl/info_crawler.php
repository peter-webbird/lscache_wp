<?php
if (!defined('WPINC')) die;

?>

<h3 class="litespeed-title">
	<?php echo __('Crawler Introduction', 'litespeed-cache'); ?>
	<a href="javascript:;" class="litespeed-expend" data-litespeed-expend-all="crawler">+</a>
</h3>

<h4 class="litespeed-question litespeed-down"><?php echo __('How Does the Crawler Work?', 'litespeed-cache'); ?></h4>
<div class="litespeed-answer">
	<p><?php echo __('Using a sitemap as a guide, LSCache crawler, travels its way throughout the site, catching pages that are not in the cache. LiteSpeed Web Server will cache the pages when they are requested.', 'litespeed-cache'); ?></p>

	<p><?php echo __('The purpose is to minimize visitor exposure to uncached content.', 'litespeed-cache'); ?></p>

	<p><?php echo sprintf(__('To learn more about each of the crawler settings, see <a %s>our wiki - Crawler Settings</a>.', 'litespeed-cache'), 'href="https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:cache:lscwp:configuration#crawler_settings" target="_blank"'); ?></p>
</div>


<h4 class="litespeed-question litespeed-down"><?php echo __('Should I Enable the Crawler?', 'litespeed-cache'); ?></h4>
<div class="litespeed-answer">
	<p><?php echo __('Not every site needs a crawler.', 'litespeed-cache'); ?></p>

	<p><?php echo __('In WordPress,  the first visitor to an uncached page waits for the page to be dynamically-generated and served, and the page is then cached for subsequent visitors.', 'litespeed-cache'); ?></p>

	<p><?php echo __('The LSCache crawler makes the first visitor’s experience better by essentially becoming the first visitor. The crawler caches the page, and the visitor who would have been first is spared the wait. As such, the crawler realistically only benefits the first out of the many users who visit that page before it expires. If you have a small user base, then crawling impacts a greater percentage of your visitors than it would on a site that draws a large crowd.', 'litespeed-cache'); ?></p>

	<p><?php echo __('You should weigh this benefit against your server’s resources. If resources are plentiful, then the crawler is a nice thing to have.', 'litespeed-cache'); ?></p>

	<p><?php echo __('If your site is busy, you’ll find that commonly-visited pages are quickly re-cached by new visitors, without the aid of a crawler. An extra crawler task would compete for server resources while delivering minimal benefits.', 'litespeed-cache'); ?></p>

	<p><?php echo __('The decision to use a crawler depends on the busy-ness of the site and the availability of server resources. Ultimately, it is the hosting provider who can best make this call.', 'litespeed-cache'); ?></p>
</div>



<h4 class="litespeed-question litespeed-down"><?php echo __('Enabling the Crawler', 'litespeed-cache'); ?></h4>
<div class="litespeed-answer">
	<p><?php echo __('Due to the potential of the crawler to consume considerable resources, we have put the on/off switch in the hands of the server administrators. The crawler is disabled by default and can only be enabled by an admin.', 'litespeed-cache'); ?></p>

	<p><?php echo sprintf(__('Instructions for enabling the crawler can be found in <a %s>our wiki - Enabling the Crawler</a>. If you do not have access to server configuration files or virtual host include files, you will need to ask your web host for assistance.', 'litespeed-cache'), 'href="https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:cache:lscwp:configuration:enabling_the_crawler" target="_blank"'); ?></p>
</div>



<h4 class="litespeed-question litespeed-down"><?php echo __('Testing the Crawler', 'litespeed-cache'); ?></h4>
<div class="litespeed-answer">
	<p><?php echo __('To determine whether the crawler is working as expected, you can test it with a single URL.', 'litespeed-cache'); ?></p>

	<ul>
		<li>
			<?php echo __('Pick a URL from your sitemap and purge it:', 'litespeed-cache'); ?><br />
			<?php echo __('Navigate to <b>LiteSpeed Cache > Manage > Purge By… > URL</b> and enter the full URL in the text box.', 'litespeed-cache'); ?>
		</li>
		<li>
			<?php echo __('Manually run the crawler:', 'litespeed-cache'); ?><br />
			<?php echo __('Navigate to <b>LiteSpeed Cache > Crawler</b>, make sure <b>Activation</b> is set to Enable, and press the <b>Manually run</b> button. Wait for it to finish.', 'litespeed-cache'); ?>
		</li>
		<li>
			<?php echo __('See if the purged URL was cached during the crawl:', 'litespeed-cache'); ?><br />
			<?php echo __('Turn on your browser’s Developer Tool/Inspector. Visit the URL that should have been crawled. Select the <b>Network</b> tab in the inspector, select the page request (the URL we just visited - it should be the first entry in the list), and select the <b>Header</b> tab. If the URL was crawled correctly, you will see the response header X-LiteSpeed-Cache: hit.', 'litespeed-cache'); ?>
		</li>
	</ul>
</div>

<h5><?php echo sprintf(__('If you don’t see X-LiteSpeed-Cache: hit, and you can’t figure out why the crawler didn’t cache the purged URL, you can visit <a %s>our support forum</a> for help.', 'litespeed-cache'), 'href="https://wordpress.org/support/plugin/litespeed-cache" target="_blank"'); ?></h5>
