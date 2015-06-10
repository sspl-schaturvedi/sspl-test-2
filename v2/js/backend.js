function refreshDatabase(){
	updateGoogleData();
	updateTwitterData();
	updateYoutubeData();
	findCrossTrendsTG();
	findCrossTrendsTY();
	findCrossTrendsGY();
	//setTimeout(function(){refreshDatabase()}, 1000);
}

function updateGoogleData(){ // gets data from google api and pushes it into local db
	var titleArr = [];
	var descArr = [];
	var urlArr = [];
	jQuery.ajax({ // getting data form api
		url: 'proxy.php',
		type: 'POST',
		data: {
			googleProxy: 1,
		},
		success: function(response){
			//alert(jQuery(response).find("item title").eq(0).text());
			
			jQuery(response).find("item").each(function(i, l) {
				titleArr[i] = jQuery(this).find("title").text();
				descArr[i] = jQuery(this).find("description").text();
				urlArr[i] = 'https://www.google.co.in/search?q='+jQuery(this).find("title").text()+'&gws_rd=ssl';
            });
			jQuery.ajax({ // sends to push in db
				url: 'functions.php',
				type: 'POST',
				data: {
					insertGoogleData: 1,
					title: titleArr,
					url: urlArr,
					description: descArr,
				},
				success: function(response){
				},
			});
		},
	});
} // end

function updateTwitterData(){ // gets data from twitter api and pushes it into local db
	var titleArr = [];
	var urlArr = [];
	jQuery.ajax({ // getting data form api
		url: 'proxy.php',
		type: 'POST',
		data: {
			twitterProxy: 1,
		},
		success: function(response){
			var data = jQuery.parseJSON(response);
			//alert(jQuery(response).find("item title").eq(0).text());
			
			jQuery(data).find('.trend-box:first-child li').each(function(i, l) {
				titleArr[i] = jQuery(this).text();
				urlArr[i] = jQuery(this).find("a").attr("href");
			});
			jQuery.ajax({
				url: 'functions.php',
				type: 'POST',
				data: {
					insertTwitterData: 1,
					title: titleArr,
					url: urlArr,
				},
				success: function(response){
				},
			});
		},
	});
} // end

function updateYoutubeData(){ // gets data from youtube api and pushes it into local db
	var titleArr = [];
	var descArr = [];
	var thumbArr = [];
	var authorArr = [];
	var viewArr = [];
	var urlArr = [];
	jQuery.ajax({ // getting data form api
		url: 'proxy.php',
		type: 'POST',
		data: {
			youtubeProxy: 1,
		},
		success: function(response){
			//alert(response);
			//jQuery("#response").text(jQuery(response).find("#browse-items-primary li ul.yt-uix-shelfslider-list").eq(0).html());
			jQuery(response).find('li.yt-uix-shelfslider-item:lt(12)').each(function(i, l) {
				titleArr[i] = jQuery(this).find(".yt-lockup-content .yt-lockup-title").text();
				//alert(titleArr[i]);
				//descArr[i] = jQuery(this).find('media\\:group media\\:description, description').text();
				thumbArr[i] = 'https:' + jQuery(this).find('.yt-lockup-thumbnail img').attr('data-thumb');
				authorArr[i] = jQuery(this).find(".yt-lockup-content .yt-lockup-byline").text();
				viewArr[i] = jQuery(this).find(".yt-lockup-content .yt-lockup-meta li").eq(0).text().replace(/,/g, '');
				urlArr[i] = 'https://www.youtube.com' + jQuery(this).find(".yt-lockup-content .yt-lockup-title a").attr('href');
            });
			//alert(viewArr);
			jQuery.ajax({ // updates youtube table in db
				url: 'functions.php',
				type: 'POST',
				data: {
					insertYoutubeData: 1,
					title: titleArr,
					description: descArr,
					thumbnail: thumbArr,
					author: authorArr,
					views: viewArr,
					url: urlArr,
				},
				success: function(response){
				},
			});
		},
	});
} // end

function findCrossTrendsTG(){ // finds common trends in Twitter and Google
	jQuery.ajax({
		url: 'functions.php',
		type: 'POST',
		data: {
			findCrossTrendsTG: 1,
		},
		success: function(response){
			var data = jQuery.parseJSON(response);
			//alert(response);
			jQuery(data).each(function(i, l) {
            });
		},
	});
} //end

function findCrossTrendsTY(){ // finds common trends in Twitter and Youtube
	jQuery.ajax({
		url: 'functions.php',
		type: 'POST',
		data: {
			findCrossTrendsTY: 1,
		},
		success: function(response){
			//alert(response);
			var data = jQuery.parseJSON(response);
			jQuery(data).each(function(i, l) {
            });
		},
	});
} //end

function findCrossTrendsGY(){ // finds common trends in Google and Youtube
	jQuery.ajax({
		url: 'functions.php',
		type: 'POST',
		data: {
			findCrossTrendsGY: 1,
		},
		success: function(response){
			//alert(response);
			var data = jQuery.parseJSON(response);
			jQuery(data).each(function(i, l) {
            });
		},
	});
} //end