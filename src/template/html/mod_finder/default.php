<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_finder
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.framework');
JHtml::addIncludePath(JPATH_SITE . '/components/com_finder/helpers/html');

// Load the smart search component language file.
$lang = JFactory::getLanguage();
$lang->load('com_finder', JPATH_SITE);

$suffix = $params->get('moduleclass_sfx');
$output = '<input type="text" name="q" id="breadcrumb-search-input" class="form-control breadcrumb-search-input" value="' . htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string')) . '" placeholder="' . JText::_('MOD_FINDER_SEARCH_VALUE', true) . '" autocomplete="off" />';
$button = '';

if ($params->get('show_button', 1))
{
	$button = '<button class="breadcrumb-search-btn btn btn-primary ' . $suffix . ' finder' . $suffix . '" type="submit"><i class="fa fa-search icon-white"></i> ' . JText::_('MOD_FINDER_SEARCH_BUTTON') . '</button>';
} else {
	$button = '';
}

// JHtml::stylesheet('com_finder/finder.css', false, true, false);
?>

<script type="text/javascript">
//<![CDATA[
	window.addEvent('domready', function()
	{
		var value;

		// Set the input value if not already set.
		if (!document.id('breadcrumb-search-input').getProperty('value'))
		{
			document.id('breadcrumb-search-input').setProperty('value', '<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>');
		}

		// Get the current value.
		value = document.id('breadcrumb-search-input').getProperty('value');

		// If the current value equals the default value, clear it.
		document.id('breadcrumb-search-input').addEvent('focus', function()
		{
			if (this.getProperty('value') == '<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>')
			{
				this.setProperty('value', '');
			}
		});

		// If the current value is empty, set the previous value.
		document.id('breadcrumb-search-input').addEvent('blur', function()
		{
			if (!this.getProperty('value'))
			{
				this.setProperty('value', value);
			}
		});

		document.id('mod-finder-searchform').addEvent('submit', function(e){
			e = new Event(e);
			e.stop();

			// Disable select boxes with no value selected.
			if (document.id('mod-finder-advanced') != null)
			{
				document.id('mod-finder-advanced').getElements('select').each(function(s){
					if (!s.getProperty('value'))
					{
						s.setProperty('disabled', 'disabled');
					}
				});
			}

			document.id('mod-finder-searchform').submit();
		});

		/*
		 * This segment of code sets up the autocompleter.
		 */
		<?php if ($params->get('show_autosuggest', 1)) : ?>
			<?php JHtml::_('script', 'com_finder/autocompleter.js', false, true); ?>
			var url = '<?php echo JRoute::_('index.php?option=com_finder&task=suggestions.display&format=json&tmpl=component', false); ?>';
			var ModCompleter = new Autocompleter.Request.JSON(document.id('breadcrumb-search-input'), url, {'postVar': 'q'});
		<?php endif; ?>
	});
//]]>
</script>

<form id="mod-finder-searchform" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
	<div class="finder<?php echo $suffix; ?>">
		<?php if ($params->get('show_button', 1)) { ?>
			<div class="input-group">
				<span class="input-icon">
					<?php echo '<input type="text" name="q" id="breadcrumb-search-input" class="form-control" value="' . htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string')) . '" placeholder="' . JText::_('MOD_FINDER_SEARCH_VALUE', true) . '" autocomplete="off" />'; ?>
					<i class="breadcrumb-search-icon fa fa-search"></i>
				</span>
				<span class="input-group-btn">
					<?php echo '<button class="btn btn-primary ' . $suffix . ' finder' . $suffix . '" type="submit"><i class="fa fa-search icon-white"></i> ' . JText::_('MOD_FINDER_SEARCH_BUTTON') . '</button>'; ?>
				</span>
			</div>
		<?php } else { ?>
			<span class="input-icon">
				<?php echo $output; ?>
				<i class="breadcrumb-search-icon fa fa-search"></i>
			</span>
		<?php } ?>

		<?php if ($params->get('show_advanced', 1)) : ?>
			<?php if ($params->get('show_advanced', 1) == 2) : ?>
				<a href="<?php echo JRoute::_($route); ?>" class="btn btn-mini icon-only hidden-phone btn-primary" title="<?php echo JText::_('COM_FINDER_ADVANCED_SEARCH'); ?>"><i class="icon-terminal"></i></a>
			<?php elseif ($params->get('show_advanced', 1) == 1) : ?>
				<div id="mod-finder-advanced">
					<?php echo JHtml::_('filter.select', $query, $params); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php echo modFinderHelper::getGetFields($route); ?>
	</div>
</form>
