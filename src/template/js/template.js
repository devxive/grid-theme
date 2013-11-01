/*
 * Global variables
 */
window.template = {};

// Fix Dropdown input problem
jQuery(function() {
	/*
	 * Prevent closing on input fields in drop downs
	 */
	$(".dropdown-menu input, .dropdown-menu label").click(function(e) {
		e.stopPropagation();
	});
});