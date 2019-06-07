(function() {
	var canvas = document.getElementById('canvas');
	var	ctx = canvas.getContext('2d');
	var	video = document.getElementById('videoElement');
	var	wrapper = document.getElementById('close_wrapper');
	var	width = 0;
	var	height = 0;
	var	streaming_vid = 0;
	var	streaming_filter = 0;
	var	src_upload = 0;
		
	
	// ********************** GET THE CAMERA MOVING **********************
	const constraints = {
		audio: false,
		video: true
	}
	
	if (typeof navigator.mediaDevices === 'undefined') {
					navigator.mediaDevices = {};
				}
				if (typeof navigator.mediaDevices.getUserMedia === 'undefined') {
					navigator.mediaDevices.getUserMedia = function(constraints) {
						// First get ahold of the legacy getUserMedia, if present
						var getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
						// Some browsers just don't implement it - return a rejected promise with an error
						// to keep a consistent interface
						if (!getUserMedia) {
							return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
						}
						// Otherwise, wrap the call to the old navigator.getUserMedia with a Promise
						return new Promise(function(resolve, reject) {
							getUserMedia.call(navigator, constraints, resolve, reject);
						});
					}
				}
	
	navigator.mediaDevices
					.getUserMedia(constraints)
					.then(initSuccess)
					.catch(function(err) {
		console.log(err.name + ": " + err.message);
	});
	
	function initSuccess(requestedStream) {
		// Older browsers may not have srcObject
		if ("srcObject" in video) {
			video.srcObject = requestedStream;
		} else {
			// Avoid using this in new browsers, as it is going away.
			video.src = window.URL.createObjectURL(stream);
		}
		video.onloadedmetadata = function(e) {
			video.play();
		};
	}


	// ********************** STREAM TO CANVAS **********************
	video.addEventListener('play', streamVideo, false);
	video.style.display = "none";

	function streamVideo() {
		streaming_vid = setInterval(function () {
			draw(video, ctx, width, height);
			streamFilter();
		}, 1000 / 30);
	}

	function draw(video, ctx, width, height) {
		if (wrapper.clientWidth <= 750) {
			width = 310;
			height = 310 * 2/3;
		}
		else {
			width = 640;
			height = 480;
		}
		canvas.width = width;
		canvas.height = height;
		ctx.drawImage(video, 0, 0, width, height);
	}


// ********************** FILTER MOVING **********************
	var	preview = new Image();
		isDraggable = false;
		currentX = 0;
		currentY = 0;
	
	currentX = 200;
	currentY = 100;
	preview.src = "public/img/filters/new_afro.png";

	function streamFilter () {
		mouseEvents();
		if (!preview.src.includes('null')) {
			drawFilter();
		}
	}

	preview_width = 0;
	preview_height = 0;

	function drawFilter() {
		// calcul du ration hwight width du filtre
		ratio = preview.height / preview.width;
		preview_width = canvas.width * 2 / 5;
		preview_height = preview_width * ratio;
		ctx.drawImage(preview, currentX-(preview.width/2), currentY-(preview.height/2), preview_width, preview_height);
	}

	function mouseEvents() {
		canvas.onmousedown = function(e) {
			isDraggable = true;
		};
	
		canvas.onmouseup = function(e) {
			isDraggable = false;
		  };
	
		canvas.onmouseout = function(e) {
			isDraggable = false;
		};
	
		canvas.onmousemove = function(e) {
			if (isDraggable) {
				if (canvas.width >= 500) {
					currentX = e.pageX - this.offsetLeft;
					currentY = e.pageY - this.offsetTop - 220;
				}
				else {
					currentX = e.pageX - this.offsetLeft;
					currentY = e.pageY - this.offsetTop - 170;
				}
			 }
		  };
	}


// ********************** BUTTONS **********************
	var pic_button = document.getElementById('pic_button');

	pic_button.addEventListener('click', function(ev){
		erase_button_div.style.display = 'flex';
		upload_button_div.style.display = 'flex';
		clearInterval(streaming_vid);
		clearInterval(streaming_filter);
	}, false);
  
  erase_button.addEventListener('click', function(ev) {
    // ---FRONT BUTTONS ---
    erase_button_div.style.display = 'none';
		upload_button_div.style.display = 'none';
		
		streamVideo();
		if (src_upload) {
			clearInterval(streaming_upload);
			src_upload = null;
		}
		});


// ********************** CHANGE FILTERS **********************
	var radio_1 = document.getElementById('radio_1');
	var radio_2 = document.getElementById('radio_2');
	var radio_3 = document.getElementById('radio_3');
	var radio_4 = document.getElementById('radio_4');
	var radio_5 = document.getElementById('radio_5');

	radio_1.addEventListener('click', function(ev) {
		preview.src = radio_1.childNodes[1].src;
		radio_1.childNodes[0].checked = true;
	}, false);

	radio_2.addEventListener('click', function(ev) {
		preview.style.width = "10px";
		preview.src = radio_2.childNodes[1].src;
	}, false);

	radio_3.addEventListener('click', function(ev) {
		preview.src = radio_3.childNodes[1].src;
		radio_3.childNodes[0].checked = true;
	}, false);

	radio_4.addEventListener('click', function(ev) {
		preview.src = radio_4.childNodes[1].src;
		radio_4.childNodes[0].checked = true;
		}, false);
	
	radio_5.addEventListener('click', function(ev) {
		preview.src = radio_5.childNodes[1].src;
		radio_5.childNodes[0].checked = true;
		}, false);

		radio_6.addEventListener('click', function(ev) {
			preview.src = null;
			radio_6.childNodes[0].checked = true;
			}, false);
 

// ********************** UPLOAD TO SERVER TO MERGE IMAGES **********************
	upload_button.addEventListener('click', function(ev) {

		// ---FRONT BUTTONS ---
		erase_button_div.style.display = 'none';
		upload_button_div.style.display = 'none';

		// --- SEND TO BACK ---
		streamVideo();
		var request = new XMLHttpRequest();

		if (src_upload) {
			draw(src_upload, ctx, width, height);
			clearInterval(streaming_upload);
			src_upload = null;
		}

		var img = canvas.toDataURL("image/png");
		
		if (document.getElementById('radio_1').childNodes[0].checked)
			var filter_src = document.getElementById('radio_1').childNodes[1].src;
		else if (document.getElementById('radio_2').childNodes[0].checked)
			var filter_src = document.getElementById('radio_2').childNodes[1].src;
		else if (document.getElementById('radio_3').childNodes[0].checked)
			var filter_src = document.getElementById('radio_3').childNodes[1].src;
		else if (document.getElementById('radio_4').childNodes[0].checked)
			var filter_src = document.getElementById('radio_4').childNodes[1].src;
		else if (document.getElementById('radio_5').childNodes[0].checked)
			var filter_src = document.getElementById('radio_5').childNodes[1].src;
		else if (document.getElementById('radio_6').childNodes[0].checked)
			var filter_src = null;
		request.open('Post', 'index.php?action=upload', true);
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		currentX_txt = currentX - (preview.width / 2);
		currentY_txt = currentY - (preview.height / 2);
		postRequest = "filterX=" + currentX_txt + "&filterY=" + currentY_txt + "&filter="
			+ filter_src + "&img=" + img + "&preview_width=" + preview_width + "&preview_height=" + preview_height;
		request.send(postRequest);
		
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				var response = request.responseText.split(";");
				var my_gallery = document.getElementById('my_gallery');
				new_pic = document.createElement('img');
				new_pic.src = response[1];
				new_pic.id = "pic_src_gallery;" + response[0];
				my_gallery.prepend(new_pic);
			}
		};
  });


// ********************** GET UPLOADED IMAGE AND STREAM IT **********************
	var upload_file_button = document.getElementById('upload_file_button');
	var upload_file = document.getElementById('upload_file');

	upload_file.addEventListener('change', function (ev) {
		var img = new Image();

		if (src_upload) {
			clearInterval(streaming_upload);
		}

		img.onerror = function() {
			alert("Only images and gifs are allowed for upload");
		}
		clearInterval(streaming_vid);
		src = URL.createObjectURL(this.files[0]);
		img.src = src;
		img.onload = draw_upload;
		erase_button_div.style.display = 'flex';
		upload_button_div.style.display = 'flex';
	}, false);

	function draw_upload() {
		src_upload = this;
		streamUpload(this);

		function streamUpload(src) {
			streaming_upload = setInterval(function () {
				drawUpload(src, ctx, width, height);
				if (!preview.src.includes('null')) {
					drawFilter();
				}
			}, 1000 / 30);
		}
	
		function drawUpload(src, ctx, width, height) {
			if (wrapper.clientWidth <= 750) {
				width = 310;
				height = 310 * 2/3;
			}
			else {
				width = 640;
				height = 480;
			}
	
			canvas.width = width;
			canvas.height = height;
			ctx.drawImage(src, 0, 0, width, height);
		}
	}

	upload_file_button.addEventListener('click', function(ev) {
		upload_file.click();
	}, false);

})();