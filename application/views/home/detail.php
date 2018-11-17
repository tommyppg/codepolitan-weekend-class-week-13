<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
</head>
<body>
	<div class="container">
		<h2><?php echo $artikel_data['judul_artikel']; ?></h2>
		<p><?php echo $artikel_data['tanggal_artikel']; ?></p>

		<p>
			<?php echo $artikel_data['isi_artikel']; ?>
		</p>
	</div>

	<?php $this->load->view('partials/foot'); ?>
</body>
</html>