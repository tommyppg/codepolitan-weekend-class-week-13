<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('partials/menu'); ?>

		<h1>Form User Saya</h1>
		<form action="<?php echo site_url('user/process'); ?>" method="POST">
			<div class="form-group">
				<label for="nama_depan">Nama Depan</label>
				<input class="form-control" type="text" name="nama_depan" placeholder="nama_depan" value="<?php echo isset($user_data) ? $user_data['nama_depan'] : ''; ?><?php echo set_value('nama_depan'); ?>">

				<span class="text-danger"><?php echo form_error('nama_depan');?></span>
			</div>

			<div class="form-group">
				<label for="nama_belakang">Nama Belakang</label>
				<input class="form-control" type="text" name="nama_belakang" placeholder="nama_belakang" value="<?php echo isset($user_data) ? $user_data['nama_belakang'] : ''; ?><?php echo set_value('nama_belakang'); ?>">

				<span class="text-danger"><?php echo form_error('nama_belakang');?></span>
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="username" placeholder="username" value="<?php echo isset($user_data) ? $user_data['username'] : ''; ?><?php echo set_value('username'); ?>">

				<span class="text-danger"><?php echo form_error('username');?></span>
			</div>

			<input type="hidden" name="id_user" value="<?php echo isset($user_data) ? $user_data['id_user'] : ''; ?>">
						
			<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
			<a href="<?php echo site_url('user'); ?>">Kembali</a>
		</form>
	</div>

	<?php $this->load->view('partials/foot'); ?>
</body>
</html>