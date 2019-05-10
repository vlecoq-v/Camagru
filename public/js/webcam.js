var video = document.querySelector("#videoElement");
var pic_button  = document.querySelector('#pic_button');
var canvas       = document.querySelector('#canvas');
var photo        = document.querySelector('#photo');
var width = document.getElementById('videoElement').clientWidth;
var height = document.getElementById('videoElement').clientHeight;
var download = document.getElementById('download');


// var width = 320;
// var height = 0;


if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}

pic_button.addEventListener('click', function(ev){
  takepicture();
ev.preventDefault();
}, false);

download.addEventListener('click', function(ev){
  // window.alert("ok");
  var img    = canvas.toDataURL("image/png");
  var a = $("<a>")
    .attr("href", img)
    .attr("download", "img.png")
    .appendTo("body");

a[0].click();

a.remove();
  // window.alert(img);
  // window.open(img);
  // img.download();

  // document.write('<img src="'+img+'"/>');
  // download();
ev.preventDefault();
}, false);

function takepicture() {
  var element = document.createElement('a');

  canvas.width = width;
  canvas.height = height;
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
  // element.setAttribute("download", canvas);
  // element.style.display = 'none';
  // document.body.appendChild(element);
  // canvas.download();

  // element.click();

  // document.body.removeChild(element);
  // var data = canvas.toDataURL('image/png');
  // document.write(data);
  // photo.setAttribute('src', canvas);
};

function download() {
  // window.alert("ok");
  var canvas = getElementById("canvas");
  var img    = canvas.toDataURL("image/png");

  window.alert(img);
  window.open(img);
  document.write('<img src="'+img+'"/>');
}