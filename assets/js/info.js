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
		url: $("#base_url") + "/php/info.php",
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
		success: function () {
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
