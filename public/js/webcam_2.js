
(function() {
	var canvas = document.getElementById('canvas');
		ctx = canvas.getContext('2d');
		video = document.getElementById('videoElement');
		vendorUrl = window.URL || window.webkitURL;
		wrapper = document.getElementById('close_wrapper');
		width = 0;
		height = 0;
		streaming_vid = 0;
		streaming_filter = 0;
	
	navigator.getMedia =	navigator.getUserMedia ||
							navigator.webkitGetUserMedia ||
							navigator.mowGetUserMedia;
	navigator.getMedia({
		video: true,
		audio: false
	}, function (stream) {
		video.srcObject = stream;
		video.play();
	}, function (error) {
		console.log("an error occured");
		console.log(error.code);
	});


	video.addEventListener('play', streamVideo, false);
	video.style.display = "none";

	function streamVideo() {
		// console.log(streaming);
		// if (!streaming)
		streaming_vid = setInterval(function () {
			draw(video, ctx, width, height);
		}, 1000 / 30);
		streamFilter();
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


	// --------------- FILTER MOVING ------------------
	var	preview = new Image();
		isDraggable = false;
		currentX = 0;
		currentY = 0;
	
	currentX = 200;
	currentY = 100;
	// preview.onload = function() {
	// 	go();
	// };
	preview.src = "public/img/filters/new_afro.png";

	function streamFilter () {
		mouseEvents();

		streaming_filter = setInterval(function () {
			drawFilter();
		}, 0);
	}

	function drawFilter() {
		ctx.drawImage(preview, currentX-(preview.width/2), currentY-(preview.height/2));
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
			   currentX = e.pageX - this.offsetLeft;
			   currentY = e.pageY - this.offsetTop - 220;
			 }
		  };
	}

	// ------------------ Define action for buttons --------
	var pic_button = document.getElementById('pic_button');
	var another_button = document.getElementById("another_button");

	pic_button.addEventListener('click', function(ev){
		// if (video.style.display == "none")
		// 	document.getElementById("erase_button").click();
		// else
			// takepicture();
			erase_button_div.style.display = 'flex';
			upload_button_div.style.display = 'flex';
			// video.style.display = "flex";
			clearInterval(streaming_vid);
			clearInterval(streaming_filter);
		ev.preventDefault();
	}, false);
  
  erase_button.addEventListener('click', function(ev) {
    // ---FRONT BUTTONS ---
    // canvas.style.display = 'none';
    // video.style.display = 'inline-flex';
    erase_button_div.style.display = 'none';
    upload_button_div.style.display = 'none';
  });
  
  // // ------------------ Change filter --------
  
	var radio_1 = document.getElementById('radio_1');
	var radio_2 = document.getElementById('radio_2');
	var radio_3 = document.getElementById('radio_3');

	radio_1.addEventListener('click', function(ev) {
	preview.src = radio_1.childNodes[1].src;
	radio_1.childNodes[0].checked = true;
	}, false);

	radio_2.addEventListener('click', function(ev) {
	preview.src = radio_2.childNodes[1].src;
	radio_2.childNodes[0].checked = true;
	width = wrapper.offsetWidth / 3.3;
	preview.width = width;
	}, false);

	radio_3.addEventListener('click', function(ev) {
	preview.src = radio_3.childNodes[1].src;
	radio_3.childNodes[0].checked = true;
	}, false);



	// ------------------ Upload to server to merge images --------

	upload_button.addEventListener('click', function(ev) {

	// ---FRONT BUTTONS ---
	erase_button_div.style.display = 'none';
	upload_button_div.style.display = 'none';
	streamVideo();

	// --- SEND TO BACK ---
	var request = new XMLHttpRequest();

	// ctx.drawImage(video, 0, 0, width, height);
	draw(video, ctx, width, height);

	var img = canvas.toDataURL("image/png");
  
	if (document.getElementById('radio_1').childNodes[0].checked) {
	  var filter_src = document.getElementById('radio_1').childNodes[1].src;
	}
	else if (document.getElementById('radio_2').childNodes[0].checked) {
	  var filter_src = document.getElementById('radio_2').childNodes[1].src;
	}
	else if (document.getElementById('radio_3').childNodes[0].checked) {
	  var filter_src = document.getElementById('radio_3').childNodes[1].src;
	}
	request.open('Post', 'index.php?action=upload', true);
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	postRequest = "filterX=" + currentX + "&filterY=" + currentY + "&filter=" + filter_src + "&img=" + img;
	console.log(postRequest);
	request.send(postRequest);
	// window.location = "index.php?action=picture";
	// console.log(request.response);
	// return function (request) {
	//   console.log(request);
	// } (request);
	// console.log(request.responseText);
  
  });

})();




// ------------------ draw the upload file -----------------
// var upload_file_button = document.getElementById('upload_file_button');
// var upload_file = document.getElementById('upload_file');

// upload_file.addEventListener('change', function (ev) {
//   var img = new Image();
//   img.onerror = function() {
//     alert("Only images and gifs are allowed for upload");
//   }
//   img.onload = draw;
//   img.src = URL.createObjectURL(this.files[0]);
// }, false);

// function draw() {
//   width = this.width;
//   height = this.height;
//   canvas.style.top = 0;
//   canvas.width = width;
//   canvas.height = height;
//   video.style.display = "none";
//   erase_button_div.style.display = "flex";
//   upload_button_div.style.display = "flex";
//   canvas.getContext('2d').drawImage(this, 0,0);
//   canvas.style.width = "100%";
//   videoWrapper.appendChild(canvas);
//   canvas.style.display = "inline-flex";
// }

// upload_file_button.addEventListener('click', function(ev) {
//   upload_file.click();
// }, false);

// ------------------ Get the selected filter and display it --------






// var wrapper = document.getElementById('close_wrapper');

// // ------------------ change its position on the image and records it --------

// var moving = false;
// preview.addEventListener("click", initialClick, false);
// // initialClick();
// // var rect_video = wrapper.getBoundingClientRect();
// // var rect_filter = preview.getBoundingClientRect();
// // var limit_right = wrapper.offsetWidth + rect_video.top;

// function move(e){
//   // e.relatedTarget = document.getElementById('close_wrapper');
//   wrapper = e.target;
//   console.log(e.EventTarget);
//  var newX = e.clientX - 100;
//  var newY = e.clientY - 350;

//  moveAt(event.pageX, event.pageY);

//  function moveAt(pageX, pageY) {
//   image.style.left = pageX - image.offsetWidth / 2 + 'px';
//   image.style.top = pageY - image.offsetHeight / 2 + 'px';
// }

//  image.style.left = newX + "px";
//  image.style.top = newY + "px";
// }


// function initialClick(e) {
//   // console.log(wrapper);
//  if (moving) {
//    document.removeEventListener("mousemove", move);
//    moving = !moving;
//    return;
//  }

//  moving = !moving;
//  image = preview;

//  document.addEventListener("mousemove", move, false);
//  wrapper.addEventListener("mouseout", function () {
//   console.log("mouseout");
//  }, false);
// }





// // ------------------ Sets the value of the upload form to the image --------

// // function add_my_gallery(pic_id) {
// //   console.log(pic_id);
// //   if (isset(pic_id)) {
// //     console.log(pic_id);
// //     my_gallery = document.getElementById('my_gallery');
// //     new_pic = document.getElementById("pic_src_gallery;".concat(pic_id));
// //     console.log(new_pic);
// //     my_gallery.appendChild(new_pic);
// //   }
// // }

// // ------------------ Sets the value of the upload form to the image --------