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
$usersConfig = JComponentHelper::getParams('com_users');
?>
<li class="dropdown user-login <?php echo $params->get('moduleclass_sfx', ''); ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<? if ($usersConfig->get('allowUserRegistration')) : ?>
			<span class="login-text"><i class="fa fa-sign-in"></i> <?php echo JText::_('JLOGIN') . '/' . JText::_('MOD_LOGIN_REGISTER'); ?></span>
		<? else: ?>
			<span class="login-text"><i class="fa fa-sign-in"></i> <?php echo JText::_('JLOGIN'); ?></span>
		<? endif; ?>
		<i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li>
			<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" role="form">
				<?php if ($params->get('pretext')) : ?>
					<p><?php echo $params->get('pretext'); ?></p>
				<?php endif; ?>
				<div class="well">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="username" class="form-control" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?>" />
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input type="password" name="password" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" />
					</div>
					<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
						<label>
							<input type="checkbox" name="remember" class="mfw" />
							<span class="lbl"> <?php echo JText::_('MOD_LOGIN_REMEMBER_ME'); ?></span>
						</label>
					<?php endif; ?>

					<button type="submit" name="Submit" class="btn btn-success btn-block"><?php echo JText::_('JLOGIN'); ?></button>
				</div>

				<?php if ($params->get('posttext')) : ?>
					<p><?php echo $params->get('posttext'); ?></p>
				<?php endif; ?>

				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.login" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />

				<?php echo JHtml::_('form.token'); ?>
			</form>
		</li>
		<li class="user-menu">
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
				<i class="fa fa-lock"></i> <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?>
			</a>
		</li>
		<?php if ($usersConfig->get('allowUserRegistration')) : ?>
			<li class="user-menu">
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
					<i class="fa fa-user"></i> <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($usersConfig->get('allowUserRegistration')) : ?>
			<li class="divider"></li>
			<li class="dropdown-header">
				<?php echo JText::_('MOD_LOGIN_NAVMENU_REGISTRATION'); ?>
			</li>
			<li class="user-menu">
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
					<i class="fa fa-asterisk"></i> <?php echo JText::_('MOD_LOGIN_REGISTER'); ?>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</li>