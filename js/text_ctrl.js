// JavaScript Document
/*global jQuery:false */

// text_ctrl.js是將文字分開與動態的前animated做成WOW的 function
$(function(){
	wow = new WOW({
	animateClass: 'animated',
					offset: 0
	});
	wow.init();
	$("#js-rotating").Morphext({
		// 可以改這個動態效果https://animate.style/
		animation: "fadeIn", // Overrides default "bounceIn"

		// 這個,是用來分段index.php和index01.php要分開顯示的文字的
		separator: ",", // Overrides default ","
		speed: 3000, // Overrides default 2000
		complete: function () {
			// Overrides default empty function
		}
	});
});
