/**
 * @file
 * twbase.js - JavaScript file for the TWBase theme.
 */

// console.log('twbase.js download start!');

(function ($, Drupal, once, window, document, undefined) {

  //To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.TWBase = {
    attach: function(context, settings) {

    	// Place your code here.
      // console.log('twbase.js loaded!');

      // once('myDebugBehavior', 'input.myDebugBehavior', context).forEach(function () {
      //   // Apply the myDebugBehavior effect to the elements only once.
      //   console.log('twbase.js loaded!')
      // });
    }
  };

})(jQuery, Drupal, once, this, this.document);

// console.log('twbase.js download finish!');
