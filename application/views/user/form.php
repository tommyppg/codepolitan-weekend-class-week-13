<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('partials/menu'); ?>

		<h1>Form User Saya</h1>
		<form id="form_user" action="<?php echo site_url('user/process'); ?>" method="POST">
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

			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" placeholder="password" value="<?php echo isset($user_data) ? $user_data['password'] : ''; ?><?php echo set_value('password'); ?>">

				<span class="text-danger"><?php echo form_error('password');?></span>
			</div>

			<div class="form-group">
				<label for="id_role">ID Role</label>
				<select class="form-control" name="id_role">
					<option value="">-- Pilih Role --</option>
					<?php
						foreach($role_data as $role){
							
							//set id_role
							if(set_value('id_role')){
								$id_role = set_value('id_role');
							}else{
								$id_role = isset($user_data['id_role']) ? $user_data['id_role'] : '';
							}

							//kondisi selected
							if($id_role == $role['id_role']){
								$selected = 'selected';
							}else{
								$selected = '';
							}

							?>
							<option value="<?php echo $role['id_role']?>" <?php echo $selected; ?>>
								<?php echo $role['nama_role']?>
							</option>
							<?php
						}
					?>
				</select>

				<span class="text-danger"><?php echo form_error('id_role');?></span>
			</div>

			<input type="hidden" name="id_user" value="<?php echo isset($user_data) ? $user_data['id_user'] : ''; ?>">
			
			<button class="btn btn-primary" type="submit" id="btn_submit">Simpan</button>
<!-- 			<input class="btn btn-primary" type="submit" name="submit" value="Simpan"> -->
			<a href="<?php echo site_url('user'); ?>">Kembali</a>
		</form>
	</div>

	<?php $this->load->view('partials/foot'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/form_user.js');?>"></script>
</body>
</html>