var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var newPathname = winOrigin + "/" + winPath[1] + "/";

(function($) {

	'use strict';
	
	/*
	Navigation
	*/
    var list_main = $('li.list-main');
    var list_grandchild = $('li.list-grandchild');
	var winPathName = window.location.pathname;
	var newPath = winOrigin + winPathName;
	
	list_main.each(function() {
        var mainHref = $(this).find('a').attr('href');
		
        if (mainHref === newPath) {
            $(this).addClass('active');
        }
    });
	
    list_grandchild.each(function() {
        var href = $(this).find('a').attr('href');
        var list_parent = $(this).closest("li.list-parent");
        
        if (href === newPath) {
            list_parent.addClass('active');
        }
    });

}).apply(this, [jQuery]);