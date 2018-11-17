<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
</head>
<body>
	<div class="container">
		<h2>Event click</h2>
		<button type="button" class="btn btn-primary" id="btn_click">Test click</button>

		<h2>Event double click</h2>
		<button type="button" class="btn btn-primary" id="btn_double_click">Test double click</button>

		<h2>Event change</h2>
		<select name="gender">
			<option value="">-- Select Gender --</option>
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
		<div id="motor_input" style="display: none;">
			Motor Favorit
			<input type="text" name="motor_favorit">
		</div>
		<div id="makeup_input" style="display: none;">
			Makeup Favorit
			<input type="text" name="makeup_favorit">
		</div>

		<h2>Modal Bootstrap</h2>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			Launch demo modal
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Contoh Modal</h4>
					</div>
					<div class="modal-body">
						Hai, saya adalah Modal!
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<h2>Modal Bootstrap dengan trigger jQuery</h2>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-lg" id="btn_modal_jquery">
			Launch demo modal from jQuery
		</button>

		<!-- Modal -->
		<div class="modal fade" id="modal_jquery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Contoh Modal</h4>
					</div>
					<div class="modal-body">
						Hai, saya adalah Modal!
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<h2>Contoh Caousel</h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="https://www.w3schools.com/bootstrap/la.jpg" alt="Los Angeles">
				</div>

				<div class="item">
					<img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Chicago">
				</div>

				<div class="item">
					<img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="New York">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<?php $this->load->view('partials/foot'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/latihan_jquery_bootstrap.js'); ?>"></script>
</body>
</html>