<?php

defined('_JEXEC') or die;

// Variables
$app       = JFactory::getApplication();
$doc       = JFactory::getDocument();
$params    = $app->getParams();
$menu      = $app->getMenu();
$active    = $app->getMenu()->getActive();
$headdata  = $doc->getHeadData();
$pageclass = $params->get('pageclass_sfx');
$tpath     = $this->baseurl . 'templates/' . $this->template;

// Detecting active variables
$option    = $app->input->getCmd('option', false);
$view      = $app->input->getCmd('view', false);
$layout    = $app->input->getCmd('layout', false);
$task      = $app->input->getCmd('task', false);
$itemid    = $app->input->getCmd('Itemid', false);
$sitename  = htmlspecialchars( $app->getCfg('sitename') );

// Parameter
$googlefont = $this->params->get('googlefont') ? $this->params->get('googlefont') : false;


// Advanced parameter
if ($app->isSite()) {
	// disable js
	if ( $this->params->get('disablejs') ) {
		$fnjs = $this->params->get('fnjs');

		if ( trim($fnjs) != '' ) {
			$filesjs = explode(',', $fnjs);
			$head = (array) $headdata['scripts'];
			$newhead = array();

			foreach( $head as $key => $elm ) {
				$add = true;

				foreach( $filesjs as $dis ) {
					if ( strpos($key,$dis) != false ) {
						$add = false;
						break;
					}
				}

				if ($add) {
					$newhead[$key] = $elm;
				}

				$headdata['scripts'] = $newhead;
			}
		}
	}

	// disable css
	if ( $this->params->get('disablecss') ) {
		$fncss=$this->params->get('fncss');

		if ( trim($fncss) != '' ) {
			$filescss = explode(',', $fncss);
			$head = (array) $headdata['styleSheets'];
			$newhead = array();
			foreach( $head as $key => $elm ) {
				$add = true;

				foreach( $filescss as $dis ) {
					if ( strpos($key,$dis) != false ) {
						$add = false;
						break;
					}
				}

				if ($add) {
					$newhead[$key] = $elm;
				}

				$headdata['styleSheets'] = $newhead;
			}
		}
	}

	$doc->setHeadData($headdata);
}


// Remove generator tag
$this->setGenerator(null);


// Force latest IE & chrome frame
$doc->setMetadata('x-ua-compatible', 'IE=edge,chrome=1');


// Add stylesheets
JHtml::_('stylesheet', $tpath . '/css/template.css', false, false);


// Add javascripts
JHtml::_('script', $tpath . '/js/template.js', false, false);


// Add Google font
if ( $googlefont ) {
	$doc->addStyleSheet( 'https://fonts.googleapis.com/css?family=' . $googlefont );
	$doc->addStyleDeclaration( 'body { font-family: ' . str_replace('+', ' ', $googlefont) . '; }' );
}
?>
