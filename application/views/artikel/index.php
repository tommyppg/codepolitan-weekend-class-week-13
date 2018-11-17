<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('partials/menu'); ?>

		<h1>Daftar Artikel Saya</h1>
		<a href="<?php echo site_url('artikel/add'); ?>">Tambah Artikel</a><br/><br/>
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Author</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(count($artikel_data) > 0){
						foreach($artikel_data as $key => $artikel){
							?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $artikel['judul_artikel']; ?></td>
								<td><?php echo $artikel['author_artikel']; ?></td>
								<td>
									<a href="<?php echo site_url('artikel/update/'.$artikel['id_artikel']); ?>">Update</a> |
									<a href="<?php echo site_url('artikel/delete/'.$artikel['id_artikel']); ?>">Delete</a>
								</td>
							</tr>
							<?php
						}
					}else{
						?>
						<tr>
							<td colspan="4">Tidak ada artikel.</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<?php $this->load->view('partials/foot'); ?>
</body>
</html>