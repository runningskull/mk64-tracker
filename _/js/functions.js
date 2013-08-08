/*
var jQT = new $.jQTouch({
    icon: 'jqtouch.png',
    backSelector: '.previous > a',
    slideSelector: '.next > a',
    flipSelector: '.homelink > a, .homelinka',
    slideupSelector: '.record, .recordback',
    submitSelector: '.submit',
    formSelector: false,
    useFastTouch: false
});
*/

/* Declare a namespace for the site */
var Site = window.Site || {};

/* Create a closure to maintain scope of the '$'
   and remain compatible with other frameworks.  */
$(document).ready(function () {
	$("abbr.timeago").timeago();
});
