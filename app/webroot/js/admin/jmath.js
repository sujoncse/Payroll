/*====================/

jQuery Maths
Michael Jasper
http://www.mikedoesweb.com
(c) 2011

=====================*/


(function ($) {
	'use strict';
	$.fn.math = function (operation, a, b) {

		return this.each(function () {
			var result = 0;
			switch(operation){
				case '+':
					result = a + b;
					break;
				case '-':
					result = a - b;
					break;
				case '*':
					result = a * b;
					break;
				case '/':
					if(b !== 0){
					  result = a / b;
					} else {
					  result = "undefined";
					}
					break;
				}
			}
			$(this).html(result);
		});
	};
}(jQuery));

