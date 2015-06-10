// JavaScript Document
jQuery(document).ready(function(e) {	
	twitterTrends1();
	youtubeTrends1IE();
});

/*function youtubeTrends1(){
	jQuery.ajax({ // youtube trends
		type: "POST",
		url: "proxy.php",
		data: {
			youtubeProxy: 1,
		},
		dataType: "xml",
		success: function(response) {
			//alert();
			var entry0 = jQuery(response).find('entry:eq(0)');
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").text(jQuery(response).find('entry:eq(0) title').html()); // first trend title
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(0) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-author").text(jQuery(response).find('entry:eq(0) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-views").text(jQuery(entry0).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail img").attr("src", jQuery(entry0).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			//jQuery(".container-youtube .single-trend:nth-child(1) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(1) a').attr("href")); // external link
			var entry1 = jQuery(response).find('entry:eq(1)');
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").text(jQuery(response).find('entry:eq(1) title').html()); // second trend title
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(1) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-author").text(jQuery(response).find('entry:eq(1) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-views").text(jQuery(entry1).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail img").attr("src", jQuery(entry1).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			var entry2 = jQuery(response).find('entry:eq(2)');
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").text(jQuery(response).find('entry:eq(2) title').html()); // third trend title
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(2) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-author").text(jQuery(response).find('entry:eq(2) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-views").text(jQuery(entry2).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail img").attr("src", jQuery(entry2).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			var entry3 = jQuery(response).find('entry:eq(3)');
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").text(jQuery(response).find('entry:eq(3) title').html()); // fourth trend title
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(3) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-author").text(jQuery(response).find('entry:eq(3) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-views").text(jQuery(entry3).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail img").attr("src", jQuery(entry3).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			
			jQuery(".youtubeActive").addClass("slidernav");
			jQuery(".slidernav").removeClass("youtubeActive");	
			jQuery("#youtubeSlidernav1").addClass("youtubeActive");	
			jQuery("#youtubeSlidernav1").removeClass("slidernav");	
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(youtubeTrends2, 6000);
    			//youtubeTrends1().delay( 3000 );
  			});
}*/
/*function youtubeTrends2(){
	jQuery.ajax({ // youtube trends
		type: "POST",
		url: "proxy.php",
		data: {
			youtubeProxy: 1,
		},
		dataType: "xml",
		success: function(response) {
			//var data = jQuery.parseXML(response);
			var entry4 = jQuery(response).find('entry:eq(4)');
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").text(jQuery(response).find('entry:eq(4) title').html()); // first trend title
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(4) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-author").text(jQuery(response).find('entry:eq(4) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-views").text(jQuery(entry4).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail img").attr("src", jQuery(entry4).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			//jQuery(".container-youtube .single-trend:nth-child(1) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(1) a').attr("href")); // external link
			var entry5 = jQuery(response).find('entry:eq(5)');
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").text(jQuery(response).find('entry:eq(5) title').html()); // second trend title
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(5) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-author").text(jQuery(response).find('entry:eq(5) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-views").text(jQuery(entry5).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail img").attr("src", jQuery(entry5).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			var entry6 = jQuery(response).find('entry:eq(6)');
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").text(jQuery(response).find('entry:eq(6) title').html()); // third trend title
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(6) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-author").text(jQuery(response).find('entry:eq(6) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-views").text(jQuery(entry6).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail img").attr("src", jQuery(entry6).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			var entry7 = jQuery(response).find('entry:eq(7)');
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").text(jQuery(response).find('entry:eq(7) title').html()); // fourth trend title
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(7) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-author").text(jQuery(response).find('entry:eq(7) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-views").text(jQuery(entry7).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail img").attr("src", jQuery(entry7).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			
			jQuery(".youtubeActive").addClass("slidernav");
			jQuery(".slidernav").removeClass("youtubeActive");	
			jQuery("#youtubeSlidernav2").addClass("youtubeActive");	
			jQuery("#youtubeSlidernav2").removeClass("slidernav");	
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(youtubeTrends3, 6000);
    			//youtubeTrends1().delay( 3000 );
  			});
}*/
/*function youtubeTrends3(){
	jQuery.ajax({ // youtube trends
		type: "POST",
		url: "proxy.php",
		data: {
			youtubeProxy: 1,
		},
		dataType: "xml",
		success: function(response) {
			//var data = jQuery.parseXML(response);
			var entry8 = jQuery(response).find('entry:eq(8)');
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").text(jQuery(response).find('entry:eq(8) title').html()); // first trend title
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(8) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-author").text(jQuery(response).find('entry:eq(8) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-views").text(jQuery(entry8).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail img").attr("src", jQuery(entry8).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			//jQuery(".container-youtube .single-trend:nth-child(1) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(1) a').attr("href")); // external link
			var entry9 = jQuery(response).find('entry:eq(9)');
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").text(jQuery(response).find('entry:eq(9) title').html()); // second trend title
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(9) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-author").text(jQuery(response).find('entry:eq(9) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-views").text(jQuery(entry9).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail img").attr("src", jQuery(entry9).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			var entry10 = jQuery(response).find('entry:eq(10)');
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").text(jQuery(response).find('entry:eq(10) title').html()); // third trend title
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(10) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-author").text(jQuery(response).find('entry:eq(10) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-views").text(jQuery(entry10).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail img").attr("src", jQuery(entry10).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			var entry11 = jQuery(response).find('entry:eq(11)');
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").text(jQuery(response).find('entry:eq(11) title').html()); // fourth trend title
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("href", jQuery(response).find('entry:eq(11) link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-author").text(jQuery(response).find('entry:eq(11) author name').html()); // author
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-views").text(jQuery(entry11).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail img").attr("src", jQuery(entry11).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			
			jQuery(".youtubeActive").addClass("slidernav");
			jQuery(".slidernav").removeClass("youtubeActive");	
			jQuery("#youtubeSlidernav3").addClass("youtubeActive");	
			jQuery("#youtubeSlidernav3").removeClass("slidernav");	
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(youtubeTrends1, 6000);
    			//youtubeTrends1().delay( 3000 );
  			});
}*/
function trimTitle(entrySerial){
	var trimTitle = jQuery(entrySerial).find("title").eq(0).text();
		if(trimTitle.length > 45){
			trimTitle = trimTitle.substring(0,45) + '...';
		}
	return trimTitle;
}
function youtubeTrends1IE(){
	jQuery.ajax({ // youtube trends
		type: "POST",
		url: "proxy.php",
		data: {
			youtubeProxy: 1,
		},
		dataType: "xml",
		success: function(response) {
			//alert();
			
			var entry0 = jQuery(response).find('entry').eq(0);
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").text(trimTitle(entry0)); // first trend title
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("href", jQuery(entry0).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("title", jQuery(entry0).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-author").text(jQuery(entry0).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-views").text(jQuery(entry0).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail img").attr("src", jQuery(entry0).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail a").attr("href", jQuery(entry0).find('link').attr("href")); // thumbnail link
			//jQuery(".container-youtube .single-trend:nth-child(1) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(1) a').attr("href")); // external link
			
			var entry1 = jQuery(response).find('entry').eq(1);
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").text(trimTitle(entry1)); // first trend title
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("href", jQuery(entry1).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("title", jQuery(entry1).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-author").text(jQuery(entry1).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-views").text(jQuery(entry1).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail img").attr("src", jQuery(entry1).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail a").attr("href", jQuery(entry1).find('link').attr("href")); // thumbnail link
			
			var entry2 = jQuery(response).find('entry').eq(2);
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").text(trimTitle(entry2)); // first trend title
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("href", jQuery(entry2).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("title", jQuery(entry2).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-author").text(jQuery(entry2).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-views").text(jQuery(entry2).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail img").attr("src", jQuery(entry2).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail a").attr("href", jQuery(entry2).find('link').attr("href")); // thumbnail link
			
			var entry3 = jQuery(response).find('entry').eq(3);
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").text(trimTitle(entry3)); // first trend title
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("href", jQuery(entry3).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("title", jQuery(entry3).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-author").text(jQuery(entry3).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-views").text(jQuery(entry3).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail img").attr("src", jQuery(entry3).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail a").attr("href", jQuery(entry3).find('link').attr("href")); // thumbnail link
			
			jQuery(".youtubeActive").addClass("slidernav");
			jQuery(".slidernav").removeClass("youtubeActive");	
			jQuery("#youtubeSlidernav1").addClass("youtubeActive");	
			jQuery("#youtubeSlidernav1").removeClass("slidernav");	
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(youtubeTrends2IE, 6000);
    			//youtubeTrends1().delay( 3000 );
  			});
}

function youtubeTrends2IE(){
	jQuery.ajax({ // youtube trends
		type: "POST",
		url: "proxy.php",
		data: {
			youtubeProxy: 1,
		},
		dataType: "xml",
		success: function(response) {
			//alert();
			var entry4 = jQuery(response).find('entry').eq(4);
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").text(trimTitle(entry4)); // first trend title
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("href", jQuery(entry4).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("title", jQuery(entry4).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-author").text(jQuery(entry4).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-views").text(jQuery(entry4).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail img").attr("src", jQuery(entry4).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail a").attr("href", jQuery(entry4).find('link').attr("href")); // thumbnail link
			//jQuery(".container-youtube .single-trend:nth-child(1) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(1) a').attr("href")); // external link
			var entry5 = jQuery(response).find('entry').eq(5);
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").text(trimTitle(entry5)); // first trend title
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("href", jQuery(entry5).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("title", jQuery(entry5).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-author").text(jQuery(entry5).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-views").text(jQuery(entry5).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail img").attr("src", jQuery(entry5).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail a").attr("href", jQuery(entry5).find('link').attr("href")); // thumbnail link
			
			var entry6 = jQuery(response).find('entry').eq(6);
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").text(trimTitle(entry6)); // first trend title
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("href", jQuery(entry6).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("title", jQuery(entry6).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-author").text(jQuery(entry6).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-views").text(jQuery(entry6).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail img").attr("src", jQuery(entry6).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail a").attr("href", jQuery(entry6).find('link').attr("href")); // thumbnail link
			
			var entry7 = jQuery(response).find('entry').eq(7);
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").text(trimTitle(entry7)); // first trend title
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("href", jQuery(entry7).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("title", jQuery(entry7).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-author").text(jQuery(entry7).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-views").text(jQuery(entry7).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail img").attr("src", jQuery(entry7).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail a").attr("href", jQuery(entry7).find('link').attr("href")); // thumbnail link
			
			jQuery(".youtubeActive").addClass("slidernav");
			jQuery(".slidernav").removeClass("youtubeActive");	
			jQuery("#youtubeSlidernav2").addClass("youtubeActive");	
			jQuery("#youtubeSlidernav2").removeClass("slidernav");	
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(youtubeTrends3IE, 6000);
    			//youtubeTrends1().delay( 3000 );
  			});
}

function youtubeTrends3IE(){
	jQuery.ajax({ // youtube trends
		type: "POST",
		url: "proxy.php",
		data: {
			youtubeProxy: 1,
		},
		dataType: "xml",
		success: function(response) {
			//alert();
			var entry8 = jQuery(response).find('entry').eq(8);
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").text(trimTitle(entry8)); // first trend title
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("href", jQuery(entry8).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-title").attr("title", jQuery(entry8).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-author").text(jQuery(entry8).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(0) .youtube-trend-views").text(jQuery(entry8).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail img").attr("src", jQuery(entry8).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(0) .thumbnail a").attr("href", jQuery(entry8).find('link').attr("href")); // thumbnail link
			
			var entry9 = jQuery(response).find('entry').eq(9);
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").text(trimTitle(entry9)); // first trend title
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("href", jQuery(entry9).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-title").attr("title", jQuery(entry9).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-author").text(jQuery(entry9).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(1) .youtube-trend-views").text(jQuery(entry9).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail img").attr("src", jQuery(entry9).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(1) .thumbnail a").attr("href", jQuery(entry9).find('link').attr("href")); // thumbnail link
			
			var entry10 = jQuery(response).find('entry').eq(10);
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").text(trimTitle(entry10)); // first trend title
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("href", jQuery(entry10).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-title").attr("title", jQuery(entry10).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-author").text(jQuery(entry10).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(2) .youtube-trend-views").text(jQuery(entry10).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail img").attr("src", jQuery(entry10).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(2) .thumbnail a").attr("href", jQuery(entry10).find('link').attr("href")); // thumbnail link
			
			var entry11 = jQuery(response).find('entry').eq(11);
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").text(trimTitle(entry11)); // first trend title
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("href", jQuery(entry11).find('link').attr("href")); // title link
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-title").attr("title", jQuery(entry11).find("title").eq(0).text()); // title tooltip
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-author").text(jQuery(entry11).find('author name').text()); // author
			jQuery(".container-youtube .single-trend:eq(3) .youtube-trend-views").text(jQuery(entry11).find("yt\\:statistics, statistics").attr("viewCount")); // views
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail img").attr("src", jQuery(entry11).find('media\\:group media\\:thumbnail, thumbnail').attr('url')); // thumbnail
			jQuery(".container-youtube .single-trend:eq(3) .thumbnail a").attr("href", jQuery(entry11).find('link').attr("href")); // thumbnail link
			
			jQuery(".youtubeActive").addClass("slidernav");
			jQuery(".slidernav").removeClass("youtubeActive");	
			jQuery("#youtubeSlidernav3").addClass("youtubeActive");	
			jQuery("#youtubeSlidernav3").removeClass("slidernav");
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(youtubeTrends1IE, 6000);
    			//youtubeTrends1().delay( 3000 );
  			});
}

function twitterTrends1(){
	jQuery.ajax({ // twiiter trends
		type: "POST",
		url: "proxy.php",
		data: {
			twitterTempProxy: 1,
		},
		//dataType: "json",
		success: function(response) {
			var data = jQuery.parseJSON(response);
			
		function trimTitleTwitter(serial){
			var trimTitle = jQuery(data).find('.trend-box:first-child li:nth-child('+serial+')').text();
			if(trimTitle.length > 18){
				trimTitle = trimTitle.substring(0,18) + '...';
			}
			return trimTitle;
		}
			//alert();
			jQuery(".container-twitter .single-trend:nth-child(1) a").text(trimTitleTwitter(1)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(1) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(1)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(1) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(1) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(2) a").text(trimTitleTwitter(2)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(2) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(2)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(2) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(2) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(3) a").text(trimTitleTwitter(3)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(3) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(3)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(3) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(3) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(4) a").text(trimTitleTwitter(4)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(4) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(4)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(4) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(4) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(5) a").text(trimTitleTwitter(5)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(5) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(5)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(5) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(5) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(6) a").text(trimTitleTwitter(6)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(6) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(6)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(6) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(6) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(7) a").text(trimTitleTwitter(7)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(7) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(7)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(7) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(7) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(8) a").text(trimTitleTwitter(8)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(8) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(8)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(8) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(8) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(9) a").text(trimTitleTwitter(9)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(9) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(9)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(9) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(9) a').attr("href")); // external link
			
			jQuery(".container-twitter .single-trend:nth-child(10) a").text(trimTitleTwitter(10)); // first trend
			jQuery(".container-twitter .single-trend:nth-child(10) a").attr("title", jQuery(data).find('.trend-box:first-child li:nth-child(10)').text()); // external link
			jQuery(".container-twitter .single-trend:nth-child(10) a").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(10) a').attr("href")); // external link
			
			/*jQuery("#twitterTrendCol2 .twitterRow1").text(jQuery(data).find('.trend-box:first-child li:nth-child(2)').text()); // second trend
			jQuery("#twitterTrendCol2 .twitterRow1").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(2) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol2 .twitterRow2").text(jQuery(data).find('.trend-box:first-child li:nth-child(3)').text()); // third trend
			jQuery("#twitterTrendCol2 .twitterRow2").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(3) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol2 .twitterRow3").text(jQuery(data).find('.trend-box:first-child li:nth-child(4)').text()); // fourth trend
			jQuery("#twitterTrendCol2 .twitterRow3").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(4) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol3 .twitterRow1").text(jQuery(data).find('.trend-box:first-child li:nth-child(5)').text()); // fifth trend
			jQuery("#twitterTrendCol3 .twitterRow1").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(5) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol3 .twitterRow2").text(jQuery(data).find('.trend-box:first-child li:nth-child(6)').text()); // sixth trend
			jQuery("#twitterTrendCol3 .twitterRow2").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(6) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol3 .twitterRow3").text(jQuery(data).find('.trend-box:first-child li:nth-child(7)').text()); // seventh trend
			jQuery("#twitterTrendCol3 .twitterRow3").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(7) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol4 .twitterRow1").text(jQuery(data).find('.trend-box:first-child li:nth-child(8)').text()); // eigth trend
			jQuery("#twitterTrendCol4 .twitterRow1").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(8) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol4 .twitterRow2").text(jQuery(data).find('.trend-box:first-child li:nth-child(9)').text()); // ninth trend
			jQuery("#twitterTrendCol4 .twitterRow2").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(9) a').attr("href")); // external link
			
			jQuery("#twitterTrendCol4 .twitterRow3").text(jQuery(data).find('.trend-box:first-child li:nth-child(10)').text()); // tenth trend
			jQuery("#twitterTrendCol4 .twitterRow3").attr("href", jQuery(data).find('.trend-box:first-child li:nth-child(10) a').attr("href")); // external link*/
			//jQuery("#tbltwitterTrends").append(data);
			//jQuery("#tbltwitterTrends").append(data);
		},
		//other code
		error: function() {
			//alert("The XML File could not be processed correctly.");
		}
	}).done(function( n ) {
		setTimeout(twitterTrends1, 3600000);
    			//youtubeTrends1().delay( 3000 );
  			});
}