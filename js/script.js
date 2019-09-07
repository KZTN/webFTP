var accessToken = '214226442.8eff693.bdd4b9a2af434a2f934c50c72517578a';
var username= "caiovidalcom";
var limit = 20; //Limite máximo de fotos
var setSize = "large";

var instagram = function() {
	return {
		init: function() {
			instagram.getUser();
		},
		getUser: function() {
			var getUserURL = 'https://api.instagram.com/v1/users/search?q='+ username +'&access_token='+ accessToken +'';
			$.ajax({
				type: "GET",
				dataType: "jsonp",
				cache: false,
				url: getUserURL,
				success: function(data) {
					var getUserID = data.data[0].id;
					instagram.loadImages(getUserID);
				}	
			});
		},
		loadImages: function(userID) {
			var getImagesURL = 'https://api.instagram.com/v1/users/'+ userID +'/media/recent/?access_token='+ accessToken +'';
			$.ajax({
				type: "GET",
				dataType: "jsonp",
				cache: false,
				url: getImagesURL,
				success: function(data) {
					for(var i = 0; i < limit; i+=1) {
						if(setSize == "small") {
							var size = data.data[i].images.thumbnail.url;
						} else if(setSize == "medium") {
							var size = data.data[i].images.low_resolution.url;
						} else {
							var size = data.data[i].images.standard_resolution.url;	
						}
						$("#instagram").append("<li><a target='_blank' href='" + data.data[i].link +"'><img src='" + size +"'/></a>");
					}
				}
			});
		}
	}
}();

$(document).ready(function() {
    instagram.init();
});