
<html>
	<body>
		<img src="public/img/filters/new_afro.png" alt="" id="preview">
		<video autoplay="true" id="videoElement"></video>
		<script>
			console.log("ic");
			preview.onmousedown =  function (event) {
			// (2) prepare to moving: make absolute and on top by z-index
			// preview.style.position = 'absolute';
			preview.style.zIndex = 1000;
			// move it out of any current parents directly into body
			// to make it positioned relative to the body
			// document.body.append(preview);
			// ...and put that absolutely positioned preview under the cursor

			moveAt(event.pageX, event.pageY);

			// centers the preview at (pageX, pageY) coordinates
			function moveAt(pageX, pageY) {
				preview.style.left = pageX - preview.offsetWidth / 2 + 'px';
				preview.style.top = pageY - preview.offsetHeight / 2 + 'px';
			}

			function onMouseMove(event) {
				moveAt(event.pageX, event.pageY);
			}

			// (3) move the preview on mousemove
			wrapper.addEventListener('mousemove', onMouseMove);

			// (4) drop the preview, remove unneeded handlers
			preview.onmouseup = function() {
				wrapper.removeEventListener('mousemove', onMouseMove);
				preview.onmouseup = null;
			};
			};
		</script>
	</body>
</html>
