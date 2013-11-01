<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// JHtml::_('behavior.keepalive');

if ($params->get('name') == 0) {
	$name = $user->get('name');
} else {
	$name = $user->get('username');
}

?>
<li class="dropdown user-login <?php echo $params->get('moduleclass_sfx', ''); ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img alt="<?php echo $name; ?>'s Photo" src="http://gravatar.com/avatar/<?php echo md5(strtolower(trim($user->get('email')))); ?>?size=50" class="nav-user-photo img-circle" />
		<span class="user-info">
			<small><?php echo JText::_('MOD_LOGIN_GREETING'); ?>, </small>
			<?php echo $name; ?>
		</span>
		<i class="fa fa-caret-down"></i>
	</a>

	<ul class="dropdown-menu">
		<li class="dropdown-header"><?php echo JText::sprintf('TPL_FRONTEND_DROPDOWNMENU_ACCOUNT_HEADER', $name); ?></li>
		<li class="user-menu">
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=profile', true, $params->get('usesecure')); ?>">
				<i class="fa fa-user"></i> <?php echo JText::_('TPL_FRONTEND_EDIT_PROFILE'); ?>
			</a>
		</li>
		<li class="user-menu">
			<a href="<?php echo JRoute::_('#', true, $params->get('usesecure')); ?>">
				<i class="fa fa-cog"></i> <?php echo JText::_('TPL_FRONTEND_SETTINGS'); ?>
			</a>
		</li>
		<li class="divider"></li>
		<li class="user-menu">
			<a href="javascript:document.getElementById('form-logout').submit()">
				<i class="fa fa-power-off"></i> <?php echo JText::_('JLOGOUT'); ?>
			</a>
			<form class="hidden" id="form-logout" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post">
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.logout" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</form>
		</li>
	</ul>
</li>