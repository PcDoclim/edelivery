/* 
Javascript Pageflip v0.3.2 by Charles Mangin (option8@option8.com)


Creative Commons License:

Javascript Pageflip v0.3 by Charles Mangin is licensed under a Creative Commons Attribution-Share Alike 3.0 United States License.

You are free:

to Share — to copy, distribute, display, and perform the work
to Remix — to make derivative works

Under the following conditions:

Attribution. You must attribute this work to Charles Mangin ( with link: http://option8.com ).

  
Share Alike. If you alter, transform, or build upon this work, you may distribute the resulting work only under the same, 
similar or a compatible license.

For any reuse or distribution, you must make clear to others the license terms of this work. The best way to do this is 
with a link to this web page: http://creativecommons.org/licenses/by-sa/3.0/us/

Any of the above conditions can be waived if you get permission from the copyright holder.

Apart from the remix rights granted under this license, nothing in this license impairs or restricts the author's moral rights.

*/



/* set up variables */

var page1, page2, page3, page4, page0, pageN1;
// display page l/r. next spread l/r. previous spread l/r.

var pageIndex = 0; // initial starting page

var pageWidth;
var pageHeight;

function pageLayout() {

//	console.log( "page index " + pageIndex);

// initial spread, presume we usually start on page 1, but not necessarily
	page1 = $(".pageContent:eq(" + pageIndex + ")");
	page1.addClass("page1").css("zIndex", 1);
	
	page2 = $(".pageContent:eq(" + parseInt(pageIndex + 1) + ")");
	page2.addClass("page2").css(
	{
		"left": pageWidth,
		"zIndex": 3,
		"paddingRight":0,
		"width": pageWidth
	});
	
	
// NEXT spread

	if( $(".pageContent").length > parseInt(pageIndex + 2) ) { // if there's a next page...
		page3 = $(".pageContent:eq(" + parseInt(pageIndex + 2) + ")");
		page3.addClass("page3").css(
		{
			"left": pageWidth * 2,
			"zIndex": 4,
			"width":0,
			"marginLeft":0,
			"paddingLeft":0
		});
		
		page4 = $(".pageContent:eq(" + parseInt(pageIndex + 3) + ")");
		page4.addClass("page4").css({
			"left": pageWidth,
			"zIndex": 2
		});
		
	
	// actions	
		page2.click(function() {
			nextPage();
		});
		page2.css("cursor","hand");
	}

// PREVIOUS spread

	if(pageIndex > 1) { // there should be a previous page
		
		page0 = $(".pageContent:eq(" + parseInt(pageIndex - 1) + ")");
		page0.addClass("page0").css(
		{
			"left": 0,
			"zIndex": 0
			
		});
	
		pageN1 = $(".pageContent:eq(" + parseInt(pageIndex - 2) + ")");
		pageN1.addClass("pageN1").css(
		{
			"left": 0,
			"zIndex": 0
			
		});


	// actions	
		page1.click(function() {
			previousPage();
		});
		page1.css("cursor","hand");

	}

}

function previousPage() {

	page0.css("zIndex", 6).css("paddingRight",0);
	page0.children("div:first").css("marginLeft",-1 * pageWidth)
	pageN1.css("zIndex", 5).css("width",0);


	page0.children("div:first").animate(
		{marginLeft: 0}, flipTime	
	);

	page0.animate(
	{
		left: pageWidth,
		width: pageWidth,
		paddingRight: 30
	
	}, {
	duration: flipTime,
	specialEasing: {
		left: "swing",
		width: "swing",
		paddingRight: "linear"
	}
	}
	);

	pageN1.animate(
	{
		width: pageWidth
	
	}, flipTime, "swing", function() 
		{
    		//console.log("Animation complete.");

			page1.removeClass("page1").unbind('click');
			page2.removeClass("page2").unbind('click');
			page3.removeClass("page3");
			page4.removeClass("page4");
			page0.removeClass("page0");
			pageN1.removeClass("pageN1");

			pageIndex -= 2;
			pageLayout();
			$(this).dequeue();
  		}
	);


}


function nextPage() {

	// flip to next spread

	page3.animate(
	{
		left: 0,
		width: pageWidth//,
	//	paddingLeft: 40,
	//	marginLeft: -40
	
	// adjusting the padding/margin to show shadow effects. broken in IE.
	
	},{
		duration: flipTime
	},{
		easing: "swing"
	});

	page2.animate(
	{
		width: 0
	
	}, flipTime, "swing", function() 
		{
  //  console.log("Animation complete.");

			page1.removeClass("page1").unbind('click');
			page2.removeClass("page2").unbind('click');
			page3.removeClass("page3");
			page4.removeClass("page4");
			if(pageIndex > 1) {
				page0.removeClass("page0");
				pageN1.removeClass("pageN1");
}
			pageIndex += 2;
			pageLayout();
			$(this).dequeue();
  		}
	);


}

window.onload = function() {

//	console.log("ready");

// set the page width all the pages key off. if image1 is an odd size, choose a different one to key	
	pageWidth = $(".pageContent:first").width();
	pageHeight = $(".pageContent:first").height();
	
	
	
	$("#pagesContainer").css("width", 2 * pageWidth).css("height", pageHeight);
	
	$(".pageContent > div:first-child").css("width", pageWidth).css("height", pageHeight);
	
//	console.log("page width = " + pageWidth);
//	console.log("page height = " + pageHeight);


	pageLayout();

};
// window ready
