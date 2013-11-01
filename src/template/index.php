<?php

defined( '_JEXEC' ) or die;

include_once JPATH_THEMES . '/' . $this->template . '/logic.php';
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
	. ( ( $menu->getActive() == $menu->getDefault() ) ? 'main' : 'page' )
	. ( $active->alias ? ' ' . $active->alias : '' )
	. ( $pageclass ? ' ' . $pageclass : '' ); ?>
">
	<div id="siteready-overlay" class="loader-overlay">
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


	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo JRoute::_('/'); ?>"><i class="fa fa-cloud"></i> <?php echo $sitename; ?></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-caret-down"></i>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<jdoc:include type="modules" name="nav-login" /><!--.login-->
			</ul>
		</div><!--/.navbar-collapse -->
	</div>

	<div class="mfw-wrapper container">
		<div class="row">
			<div class="col-md-4 hidden-sm">
				<h2>Heading 1</h2>
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
				<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
			</div>
			<div class="col-md-4 col-sm-6">
				<h2>Heading 2</h2>
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
				<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
			</div>
			<div class="col-md-4 col-sm-6">
				<h2>Heading 3</h2>
				<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<p><a class="btn btn-default" href="#">View details &raquo;</a></p>
			</div>
		</div>
		<hr>

		<footer>
			<p>&copy; Company 2013</p>
		</footer>
	</div>

	<jdoc:include type="modules" name="debug" />
</body>
</html>


<?php

$test = '';

echo '<pre>';
print_r( $test );
echo '</pre>';
?>