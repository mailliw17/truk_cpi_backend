<!DOCTYPE html>
<html>

<head>
	<title>Scanner Barcode</title>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/instascan.min.js"></script>
</head>

<body>
	<?php if ($this->session->flashdata('gagal')) : ?>
		<audio controls autoplay hidden>
			<source src="<?= base_url() ?>assets/gagal.mp3" type="audio/mpeg">
		</audio>
	<?php endif; ?>



	<video id="preview" height="100%" width="100%"></video>
	<input type="hidden" id="data">
	<!-- <div style="width: 100%;height: 100%;text-align: center;">
		<div class="qrscanner" id="scanner" style="">
		</div>
	</div> -->
	<script>
		// let scanner = new Instascan.Scanner({
		// 	video: document.getElementById('preview')
		// });

		let scanner = new Instascan.Scanner({
			video: document.getElementById('preview'),
			mirror: false
		}); // prevents the video to be mirrored });

		scanner.addListener('scan', function(content) {

			// window.location = " https://localhost/truk_cpi_backend/C_scan/formscan/" + content;
			window.location = "<?= base_url() ?>C_scan/formscan/" + content;
		});
		Instascan.Camera.getCameras().then(cameras => {
			if (cameras.length > 0) {
				//sengaja diubah ke 1 agar bisa akses kamera belakang... kalau di browser memang error
				scanner.start(cameras[0]);
			} else {
				console.error("Camera dan barcode error!");
			}
		});
	</script>

</body>

</html>