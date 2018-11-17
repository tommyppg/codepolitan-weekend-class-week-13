<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('partials/head'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css'); ?>">
</head>
<body>
	<div class="container">

		<form class="form-signin" action="<?php echo site_url('login/process'); ?>" method="POST">
            <h2 class="form-signin-heading">Silakan Log In</h2>

            <span class="text-danger"><?php echo validation_errors(); ?></span>
            <span class="text-danger"><?php echo $this->session->flashdata('message'); ?></span>

            <label for="username" class="sr-only">username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" required autofocus>

            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

        </form>

	</div>

	<?php $this->load->view('partials/foot'); ?>
</body>
</html>