/*
 * TEMPLATE SETTINGS
 * GRIDTHEME
 *
 */

/* Global variables */
window.template = {};


/* WINDOW.ONLOAD BLOCK
****************************************/


/* READY STATE BLOCK
****************************************/
jQuery(function() {
	/*
	 * Fix Dropdown input problem: Prevent closing on input fields in drop downs
	 */
	$(".dropdown-menu input, .dropdown-menu label").click(function(e) {
		e.stopPropagation();
	});


	/*
	 * Sidebar opener function. Toggle body class sidebar-open. Use ".prevent-scroll" class from mootombo site-overlay class to prevent site scrolling during sidemenu is open
	 */
	$('.sidebar-toggle, #site-inner-overlay').click(function(e) {
		e.preventDefault();

		$('body').toggleClass('sidebar-open prevent-scroll');
	});
	/* Kill the fixed sidemenu and activate toggle sidemenu*/
	$('.sidebar-kill').click(function(e) {
			$('body').removeClass('sidebar-active');
			$('body').fadeIn('sidebar-toggle');
	});
});


/* FUNCTION BLOCK
****************************************/










jQuery(function($) {
	//opening submenu
	$('.nav-list').on("click", function(e){
		//check to see if we have clicked on an element which is inside a .dropdown-toggle element?!
		//if so, it means we should toggle a submenu
		var link_element = $(e.target).closest('a');
		if(!link_element || link_element.length == 0) return;//if not clicked inside a link element
		
		$minimized = $('#sidebar').hasClass('menu-min');
		
		if(! link_element.hasClass('dropdown-toggle') ) {//it doesn't have a submenu return
			//just one thing before we return
			//if sidebar is collapsed(minimized) and we click on a first level menu item
			//and the click is on the icon, not on the menu text then let's cancel event and cancel navigation
			//Good for touch devices, that when the icon is tapped to see the menu text, navigation is cancelled
			//navigation is only done when menu text is tapped
			if($minimized &&
				link_element.get(0).parentNode.parentNode == this /*.nav-list*/ )//i.e. only level-1 links
			{
					var text = link_element.find('.menu-text').get(0);
					if( e.target != text && !$.contains(text , e.target) )//not clicking on the text or its children
					  return false;
			}

			return;
		}
		//
		var sub = link_element.next().get(0);

		//if we are opening this submenu, close all other submenus except the ".active" one
		if(! $(sub).is(':visible') ) {//if not open and visible, let's open it and make it visible
		  var parent_ul = $(sub.parentNode).closest('ul');
		  if($minimized && parent_ul.hasClass('nav-list')) return;
		  
		  parent_ul.find('> .open > .submenu').each(function(){
			//close all other open submenus except for the active one
			if(this != sub && !$(this.parentNode).hasClass('active')) {
				$(this).slideUp(200).parent().removeClass('open');
				
				//uncomment the following line to close all submenus on deeper levels when closing a submenu
				//$(this).find('.open > .submenu').slideUp(0).parent().removeClass('open');
			}
		  });
		} else {
			//uncomment the following line to close all submenus on deeper levels when closing a submenu
			//$(sub).find('.open > .submenu').slideUp(0).parent().removeClass('open');
		}

		if($minimized && $(sub.parentNode.parentNode).hasClass('nav-list')) return false;

		$(sub).slideToggle(200).parent().toggleClass('open');
		return false;
	 })
});
