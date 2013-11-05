<?php

defined( '_JEXEC' ) or die;

include_once JPATH_THEMES . '/' . $this->template . '/logic.php';

MFWJavascriptAnimation::loadIcon();
?>
<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>" data-fouc-class-names="swift-loading"><![endif]-->
<!--[if IE 8]><html class="lt-ie10 ie8" lang="<?php echo $this->language; ?>" data-fouc-class-names="swift-loading"><![endif]-->
<!--[if IE 9]><html class="lt-ie10 ie9" lang="<?php echo $this->language; ?>" data-fouc-class-names="swift-loading"><![endif]-->
<!--[if gt IE 9]><!--><html lang="<?php echo $this->language; ?>" data-fouc-class-names="swift-loading"><!--<![endif]-->

<head>
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<link rel="shortcut icon" href="<?php echo $tpath; ?>/img/favicon.ico"></link>

	<?php echo MFWHtmlHead::setMetaFacebook(); ?>
	<?php echo MFWHtmlHead::setMetaApple(); ?>
	<?php echo MFWHtmlHead::setMetaMicrosoft(); ?>
	<?php echo MFWHtmlHead::setMetaTwitter(); ?>
	<?php echo MFWHtmlHead::setMetaExtended(); ?>

	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<noscript><meta http-equiv="X-Frame-Options" content="DENY" /></noscript>
</head>
<body class="<?php echo
	( $option ? $option . ' ' : '' )
	. ( $view ? ' view-' . $view : '' )
	. ( $layout ? ' layout-' . $layout : ' no-layout' )
	. ( $task ? ' task-' . $task : ' no-task' )
	. ( $itemid ? ' itemid-' . $itemid : '' )
	. ( ( $menu->getActive() == $menu->getDefault() ) ? ' main' : ' page' )
	. ( $active->alias ? ' ' . $active->alias : '' )
	. ( $pageclass ? ' ' . $pageclass : '' ); ?>
 sidebar-active
 breadcrumbs-fixed
">
	<div id="siteready-overlay" class="loader-overlay" style="display: none;">
		<div class="loader-wrapper">
			<div class="loader"></div>
		</div>
	</div>


<!--

    Welcome to the light side of the source, young padawan.

    One step closer to learn something interesting you are...

                               ____                  
                            _.' :  `._               
                        .-.'`.  ;   .'`.-.           
               __      / : ___\ ;  /___ ; \      __  
             ,'_ ""=-.:__;".-.";: :".-.":__;.-="" _`,
             :' `.t""=-.. '<@.`;_  ',@:` ..-=""j.' `;
                  `:-.._J '-.-'L__ `-.-' L_..-;'     
                    "-.__ ;  .-"  "-.  : __.-"       
                        L ' /.======.\ ' J           
                         "-.   "__"   .-"            
                        __.l"-:_JL_;-";.__           
                     .-j/'.;  ;""""  / .'\"-.        
                   .' /:`. "-.:     .-" .';  `.      
                .-"  / ;  "-. "-..-" .-"  :    "-.   
             .+"-.  : :      "-.__.-"      ;-._   \  
             ; \  `.; ;                    : : "+. ; 
             :  ;   ; ;                    : ;  : \: 
             ;  :   ; :                    ;:   ;  : 
            : \  ;  :  ;                  : ;  /  :: 
            ;  ; :   ; :                  ;   :   ;: 
            :  :  ;  :  ;                : :  ;  : ; 
            ;\    :   ; :                ; ;     ; ; 
            : `."-;   :  ;              :  ;    /  ; 
             ;    -:   ; :              ;  : .-"   : 
             :\     \  :  ;            : \.-"      : 
              ;`.    \  ; :            ;.'_..-=  / ; 
              :  "-.  "-:  ;          :/."      .'  :
               \         \ :          ;/  __        :
                \       .-`.\        /t-""  ":-+.   :
                 `.  .-"    `l    __/ /`. :  ; ; \  ;
                   \   .-" .-"-.-"  .' .'j \  /   ;/ 
                    \ / .-"   /.     .'.' ;_:'    ;  
                     :-""-.`./-.'     /    `.___.'   
                           \ `t  ._  /               
                            "-.t-._:'                

-->


	<div class="navbar navbar-inverse navbar-shadow navbar-fixed-top">
		<div class="navbar-header">
			<ul class="nav navbar-nav">
				<li>
					<a href="#" class="sidebar-toggle"><i class="fa fa-reorder"></i></a>
				</li>
			</ul>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo JRoute::_('/'); ?>"><i class="fa fa-cloud"></i> <?php echo $sitename; ?></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<jdoc:include type="modules" name="nav-top" /><!--°nav-top-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<jdoc:include type="modules" name="nav-login" /><!--°nav-login-->
			</ul>
		</div>
	<!-- .navbar -->
	</div>

	<div class="main-container">
		<div id="sidebar" class="sidebar hidden-xs">
			<jdoc:include type="modules" name="sidebar-shortcuts" />

			<jdoc:include type="modules" name="sidebar" />

			<ul class="nav nav-list">
				<li>
					<a href="calendar.html">
						<i class="nav-icon fa fa-calendar"></i>
						<span class="menu-text">
							Calendar
							<span class="badge badge-primary icon-animated-pulsate">5</span>

							<span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
								<i class="fa fa-warning red bigger-130"></i>
							</span>
						</span>
					</a>
				</li>
			<!-- /.nav-list -->
			</ul>

			<div class="sidebar-collapse sidebar-kill" id="sidebar-collapse">
				<i class="nav-icon fa fa-angle-double-left" data-icon1="fa-angle-double-left" data-icon2="fa-angle-double-right"></i>
			</div>
		<!-- .sidebar -->
		</div>

		<div class="breadcrumbs" id="breadcrumbs">
			<jdoc:include type="modules" name="breadcrumbs" />

			<div class="breadcrumb-search breadcrumb-right" id="breadcrumb-search">
				<jdoc:include type="modules" name="breadcrumb-search" /><!--.search-->
			</div>
		</div>

		<div class="main-container-inner clearfix">
			<div id="site-inner-overlay"></div>

			<div class="main-content row clearfix">
				<jdoc:include type="message" />

				<div class="page-content clearfix">
						<jdoc:include type="component" />

						<div class="jumbotron">
							<h1><i class="fa fa-hand-o-right icon-animated-handpointer"></i> Hello, world!</h1>
							<p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
						</div>
						<div class="col-md-4 hidden-sm">
							<h2>Heading 1</h2>
							<p><i class="fa fa-wrench icon-animated-wrench"></i> Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
							<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
						</div>
						<div class="col-md-4 col-sm-6">
							<h2>Heading 2</h2>
							<p><i class="fa fa-envelope-o icon-animated-vertical"></i> Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
							<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
						</div>
						<div class="col-md-4 col-sm-6">
							<h2>Heading 3</h2>
							<p><i class="fa fa-bell-o icon-animated-bell"></i> Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
							<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
						</div>
				<!-- .page-content -->
				</div>

			<!-- .main-content -->
			</div>

			<hr>

			<footer>
				<p>&copy; <?php echo date('Y') . ' ' . $sitename; ?></p>
			</footer>

			<jdoc:include type="modules" name="debug" />

		<!-- .main-container-inner -->
		</div>
	<!-- .main-container -->
	</div>

</body>
</html>












<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php

$test = '';

echo '<pre>';
print_r( $test );
echo '</pre>';
?>