<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('partials/menu'); ?>

		<h1>Form Artikel Saya</h1>
		<form action="<?php echo site_url('artikel/process'); ?>" method="POST" enctype="multipart/form-data">
			<?php // echo validation_errors(); ?>

			<div class="form-group">
				<label for="judul_artikel">Judul Artikel</label>
				<input type="text" class="form-control" name="judul_artikel" placeholder="judul_artikel" value="<?php echo isset($artikel_data) ? $artikel_data['judul_artikel'] : ''; ?><?php echo set_value('judul_artikel'); ?>">

				<span class="text-danger"><?php echo form_error('judul_artikel');?></span>
			</div>

			<div class="form-group">
				<label for="isi_artikel">Isi Artikel</label>
				<textarea class="form-control" name="isi_artikel"><?php echo isset($artikel_data) ? $artikel_data['isi_artikel'] : ''; ?><?php echo set_value('isi_artikel'); ?></textarea>

				<span class="text-danger"><?php echo form_error('isi_artikel');?></span>
			</div>

			<div class="form-group">
				<label for="author_artikel">Author Artikel</label>
				<input class="form-control" type="text" name="author_artikel" placeholder="author_artikel" value="<?php echo isset($artikel_data) ? $artikel_data['author_artikel'] : ''; ?><?php echo set_value('author_artikel'); ?>">

				<span class="text-danger"><?php echo form_error('author_artikel');?></span>
			</div>

			<div class="form-group">
				<label for="gambar_artikel">Gambar Artikel</label>
				<input class="form-control" type="file" name="gambar_artikel" placeholder="gambar_artikel">

				<?php if(isset($artikel_data)): ?>

					<img src="<?php echo base_url('uploads/'.$artikel_data['gambar_artikel']); ?>" width="100%">

				<?php endif; ?>
			</div>

			<div class="form-group">
				<label for="author_artikel">ID Kategori</label>
				<select class="form-control" name="id_kategori">
					<option value="">-- Pilih Kategori --</option>
					<?php
						foreach($kategori_data as $kategori){
							
							//set id_kategori
							if(set_value('id_kategori')){
								$id_kategori = set_value('id_kategori');
							}else{
								$id_kategori = isset($artikel_data['id_kategori']) ? $artikel_data['id_kategori'] : '';
							}

							//kondisi selected
							if($id_kategori == $kategori['id_kategori']){
								$selected = 'selected';
							}else{
								$selected = '';
							}

							?>
							<option value="<?php echo $kategori['id_kategori']?>" <?php echo $selected; ?>>
								<?php echo $kategori['nama_kategori']?>
							</option>
							<?php
						}
					?>
				</select>

				<span class="text-danger"><?php echo form_error('id_kategori');?></span>
			</div>

			<input type="hidden" name="id_artikel" value="<?php echo isset($artikel_data) ? $artikel_data['id_artikel'] : ''; ?>">
						
			<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
			<a href="<?php echo site_url('artikel'); ?>">Kembali</a>

		</form>
	</div>

	<?php $this->load->view('partials/foot'); ?>
</body>
</html>