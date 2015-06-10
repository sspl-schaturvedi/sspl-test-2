// JavaScript Document
jQuery(document).ready(function(e) {
	displayGoogleTrends();
	displayYoutubeTrends();
	displayTwitterTrends();
});



/*function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "jQuery1,");
}*/

/*function trimTitle(entrySerial){
	var trimTitle = jQuery(entrySerial).find("title").eq(0).text();
		if(trimTitle.length > 45){
			trimTitle = trimTitle.substring(0,45) + '...';
		}
	return trimTitle;
}*/

jQuery(document).ready(function(){
    function ticker() {
    $('#ticker li:first').slideUp(function() {
        $(this).appendTo($('#ticker')).slideDown();
    });
}
setInterval(ticker, 3000);
});

jQuery(document).on('click', 'input[name="save-announce"]' ,function(e) { // saving the latest announce
    if(jQuery.trim(jQuery('textarea.announce-textarea').val()) == ''){
		jQuery("textarea.announce-textarea").css({"border-color": "rgba(255,0,4,1.00)"});
		jQuery(".announce-blank-err").show();
		//alert('Blank announcement can not be saved!');
		return;
	}
	/*if(jQuery('input[name="announce-status"]').is(':checked')){
		var status = 1;
	}
	else{
		var status = 0;
	}*/
	//alert(jQuery('textarea.announce-textarea').val());
	jQuery.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			setAnnounce: 1,
			announce: jQuery('textarea.announce-textarea').val(),
		},
		success: function(response){
			//alert(response);
			location.reload();
		},
	});
});

jQuery(document).on("change", "input[name='announce-status']", function(e){
	if(jQuery(this).is(':checked')){
		var status = 1;
		jQuery(this).siblings('label').text('Enabled');
		jQuery('textarea.announce-textarea').attr('disabled', false);
		jQuery('input[name="save-announce"]').attr('disabled', false);
	}
	else{
		var status = 0;
		jQuery(this).siblings('label').text('Disabled');
		jQuery('textarea.announce-textarea').val("");
		jQuery('textarea.announce-textarea').attr('disabled', true);
		jQuery('input[name="save-announce"]').attr('disabled', true);
	}
	jQuery.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			updateAnnounceStatus: 1,
			status: status,
		},
		success: function(response){
		},
	});
});

function displayGoogleTrends(){ // displays google trends on frontend
    jQuery.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			getGoogleData: 1,
		},
		success: function(response){
			var data = jQuery.parseJSON(response);
			var wordArr = [];
			jQuery(data).each(function(i, l) {
				if(i==0){
					var w=10;
				}
				else{
					var w=1;
				}
				wordArr.push({text: l['title'], weight: 25-i, link: l['url']});
            });
			jQuery("#wordcloud").html('');
			jQuery("#wordcloud").jQCloud(wordArr);
			/*var wordArr = [];
			jQuery(data).each(function(i, l) {
				var weight;
				if(i==0){
					weight = 60;
				}
				else{
					weight = 40-i;
				}
				jQuery("#wordcloud1").append('<span data-weight="'+weight+'">'+l['title']+'</span>');
			});
			jQuery("#wordcloud1").awesomeCloud({ // projection cloud
					"size" : {
						"grid" : 20,
						"normalize" : false
					},
					"options" : {
						"color" : "random-dark",
						"rotationRatio" : 0.55,
						"printMultiplier" : 1						
					},
					"font" : "'Bevan'",
					"shape" : "Rectangle"
			});*/
		},
	});
	//setTimeout(function(){displayGoogleTrends()}, 900000);
}

function displayYoutubeTrends(){ // displays youtube trends on frontend
	jQuery.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			getYoutubeData: 1,
		},
		success: function(response){
			var data = jQuery.parseJSON(response);
			displayYoutubeTrends_Slide(data,2);
		},
	});
}

function displayYoutubeTrends_Slide(data,slide){ // displays first slide of youtube data
	var data = data;
	var slide = slide;
	for(var i=0; i<4; i++){
		(function(i){
        	setTimeout(function(){
				var view = data[i+4*slide]['views'];
				view = view.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				jQuery('#youtube-trends-widget .panel-body .youtube-tile').eq(i).hide();
				jQuery('#youtube-trends-widget .panel-body .youtube-tile').eq(i).fadeIn(1000).addClass('tiles-zoom');
				jQuery('#youtube-trends-widget .panel-body .youtube-tile .thumbnail img').eq(i).attr('src', data[i+4*slide]['thumbnail']); // thumbnail image
				jQuery('#youtube-trends-widget .panel-body .youtube-tile .thumbnail a').eq(i).attr('href', data[i+4*slide]['url']); // thumbnail image
				jQuery('#youtube-trends-widget .panel-body .youtube-tile .trend-title').eq(i).text(data[i+4*slide]['title']); // title
				jQuery('#youtube-trends-widget .panel-body .youtube-tile .trend-title').eq(i).attr('href', data[i+4*slide]['url']); // title link
				jQuery('#youtube-trends-widget .panel-body .youtube-tile .author').eq(i).text(data[i+4*slide]['author']); // author name
				jQuery('#youtube-trends-widget .panel-body .youtube-tile .trend-views').eq(i).text(view); // total views
				jQuery('#youtube-trends-widget .panel-body .youtube-tile').eq(i).removeClass(function(index, className) {
    				return (className.match(/(^|\s)y-id-\S+/g) || []).join(' ');
				}); // total views
				jQuery('#youtube-trends-widget .panel-body .youtube-tile').eq(i).addClass('y-id-'+(i+4*slide+1)); // total views	
				jQuery('div').removeClass('youtubeactive');
			}, 1500 * i);
    	}(i));
	}
	slide++;
	if(slide==3){ // reset slide to rotate
		slide = 0;
	}
	jQuery('#youtube-trends-widget .panel-body .silder-nav li').removeClass('active'); // current slide indicator
	jQuery('#youtube-trends-widget .panel-body .silder-nav li').eq(slide).addClass('active'); // current slide indicator
	setTimeout(function(){displayYoutubeTrends_Slide(data,slide)}, 8000);
} // end


function displayTwitterTrends(){ // displays twitter trends on frontend
	jQuery.ajax({
		type: 'POST',
		url: 'functions.php',
		data: {
			getTwitterData: 1,
		},
		success: function(response){
			var data = jQuery.parseJSON(response);
			for(var i=0; i<10; i++){
				jQuery('#twitter-trends-widget .panel-body li a span').eq(i).text(data[i]['title']); // thumbnail image
				jQuery('#twitter-trends-widget .panel-body li a').eq(i).attr('href', data[i]['url']); // thumbnail image
				jQuery('#twitter-trends-widget .panel-body li a').eq(i).attr('title', data[i]['url']); // thumbnail image
			}
		},
	});
} // end

/*jQuery.fn.rotate = function(degrees, step, current) { // function to rotate youtube trend videos
    //var self = $(this);
    //current = current || 0;
    step = step || 2;
    current += step;
    self.css({
		
  '-webkit-animation': 'animationFrames1 ease-out 0.8s',
  '-webkit-animation-iteration-count': '1',
  '-webkit-transform-origin': '50% 50%',
  '-webkit-animation-fill-mode':'forwards' /*Chrome 16+, Safari 4+* 
    });
    if (current != degrees) {
        setTimeout(function() {
            self.rotate(degrees, step, current);
        }, 5);
    }
};*/

jQuery(document).on("change", "#user-ctrl-panel input[name='display-announce']", function(e){ // control panel announcement section
	if(jQuery(this).is(':checked')){
		var announce = 1;
		jQuery.ajax({
			type: 'POST',
			url: 'functions.php',
			data: {
				setSessionAnnounce: 1,
				status: 1,
			},
			success: function(response){
				jQuery("#announce-widget").show();
				jQuery("#cross-trends-widget").removeClass('col-md-12').addClass('col-md-5').addClass("element-animation");
				jQuery("#user-ctrl-panel").show();
			},
		});
	}
	else{
		var announce = 0;
		jQuery.ajax({
			type: 'POST',
			url: 'functions.php',
			data: {
				setSessionAnnounce: 1,
				status: 0,
			},
			success: function(response){
				jQuery("#announce-widget").hide();
				jQuery("#cross-trends-widget").removeClass('col-md-5').addClass('col-md-12').addClass("element-animation");
				jQuery("#user-ctrl-panel").show();
			},
		});
	}
}); // end

jQuery(document).on("change", "#user-ctrl-panel input[name='display-cross-trends']", function(e){ // control panel cross trend section
	if(jQuery(this).is(':checked')){
		var crossTrend = 1;
		jQuery.ajax({
			type: 'POST',
			url: 'functions.php',
			data: {
				setSessionCrossTrend: 1,
				status: 1,
			},
			success: function(response){
				jQuery("#announce-widget").removeClass('col-md-12').addClass('col-md-7').addClass("element-animation");
				jQuery("#cross-trends-widget").show();
				jQuery("#user-ctrl-panel").show();
			},
		});
	}
	else{
		var crossTrend = 0;
		jQuery.ajax({
			type: 'POST',
			url: 'functions.php',
			data: {
				setSessionCrossTrend: 1,
				status: 0,
			},
			success: function(response){
				jQuery("#cross-trends-widget").hide();
				jQuery("#announce-widget").removeClass('col-md-7').addClass('col-md-12').addClass("element-animation");
				jQuery("#user-ctrl-panel").show();
			},
		});
	}
}); // end

jQuery(document).on("change", "#user-ctrl-panel input[name='display-assets']", function(e){ // control panel cross trend section
	if(jQuery(this).is(':checked')){
		var Assets = 1;
		jQuery.ajax({
			type: 'POST',
			url: 'functions.php',
			data: {
				setSessionAssets: 1,
				status: 1,
			},
			success: function(response){
				jQuery("#assets-widget").show();
				jQuery("#twitter-widget").removeClass('col-md-12').addClass('col-md-6').addClass("element-animation");
				jQuery("#user-ctrl-panel").show();
			},
		});
	}
	else{
		var Assets = 0;
		jQuery.ajax({
			type: 'POST',
			url: 'functions.php',
			data: {
				setSessionAssets: 1,
				status: 0,
			},
			success: function(response){
				jQuery("#assets-widget").hide();
				jQuery("#twitter-widget").removeClass('col-md-6').addClass('col-md-12').addClass("element-animation");
				jQuery("#user-ctrl-panel").show();
			},
		});
	}
}); // end

jQuery(document).on("click", "body", function(e){
	jQuery("#user-ctrl-panel").hide();
});

jQuery(document).on("click", "#icon-user-control-panel", function(e){
	jQuery("#user-ctrl-panel").show();
});

/*jQuery(document).on("mouseover", "#cross-trends-widget .slide2-body .list-group-item", function(e){ // cross trends mouse over
	jQuery(this).addClass('active');
	var gID = jQuery(this).find("#g-id").val();
	var tID = jQuery(this).find("#t-id").val();
	var yID = jQuery(this).find("#y-id").val();
	jQuery('.'+gID).addClass('active');
	jQuery('.'+yID).addClass('youtubeactive');
});*/

/*jQuery(document).on("mouseout", "#cross-trends-widget .slide2-body .list-group-item", function(e){ // cross trends mouse out
	jQuery(this).removeClass('active');
	var gID = jQuery(this).find("#g-id").val();
	var tID = jQuery(this).find("#t-id").val();
	var yID = jQuery(this).find("#y-id").val();
	jQuery('.'+gID).removeClass('active');
	jQuery('div').removeClass('youtubeactive');
});*/

jQuery(document).on("click", "#show_tw_chart", function(e){
	drawTwChart();
});

jQuery(document).on("click", "#show_fb_chart", function(e){
	drawFbChart();
});

function drawChart(id) {
	for(var i = 0; i<7; i++){
		(function(i){
        	setTimeout(function(){
    			var percentage = $(id + " #bars li .bar").eq(i).data('percentage');
				setTimeout(function(){
					jQuery('.bar').show();	
				}, 3000);
    			$(id + " #bars li .bar").eq(i).addClass("bouncing").animate({'height' : percentage + '%'}, 2000);
			}, 200 * i);
    	}(i));
  	}
}

function eraseChart(id) {
    $(id + " #bars li .bar").addClass("bouncing").animate({'height' : 0 + '%'}, 1000);
	setTimeout(function(){
		//$(id + " #bars li .bar").hide();	
		$(id + " #bars li .bar:before").css('display','none');
	}, 900);
	
}


jQuery(document).ready(function(e) {
	drawFbChart();
});

function drawFbChart(){
	jQuery(".chart").hide();
	jQuery("#chart_facebook").show();
	jQuery('.chart_detail').hide();
	jQuery('.chart_detail').fadeIn(3000);
	jQuery("#assets-widget .fa-twitter").removeClass("graphtweet");
	jQuery("#assets-widget .fa-twitter").css('border', '1px solid #fff');
	jQuery("#assets-widget .fa-facebook").css('border', 'none');
	jQuery("#assets-widget .fa-facebook").addClass("graphfb");
    drawChart("#chart_facebook");
	//setTimeout(drawTwChart, 30000);
	setTimeout(function(){
		eraseChart('#chart_Facebook');
		setTimeout(function(){
			drawTwChart();
		}, 1000);
	}, 30000); 
}

function drawTwChart(){
	jQuery(".chart").hide();
	jQuery("#chart_twitter").show();
	jQuery('.chart_detail').hide();
	jQuery('.chart_detail').fadeIn(3000);
	jQuery("#assets-widget .fa-facebook").removeClass("graphfb");
	jQuery("#assets-widget .fa-facebook").css('border', '1px solid #fff');
	jQuery("#assets-widget .fa-twitter").css('border', 'none');
	jQuery("#assets-widget .fa-twitter").addClass("graphtweet");
    drawChart("#chart_Twitter");
	//setTimeout(drawFbChart, 30000);
	setTimeout(function(){
		eraseChart('#chart_Twitter');
		setTimeout(function(){	
			drawFbChart();
		}, 1000);
	}, 30000);
}
