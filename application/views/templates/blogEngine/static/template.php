<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Responsive Web Mobile Layout Templates - Blog Posts</title>

   <!-- Included Bootstrap CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url().'public/'.$this->config->item('template')?>/css/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url().'public/'.$this->config->item('template')?>/css/bootstrap/bootstrap-responsive.min.css" />

	<!-- Included Bootstrap Customization CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url().'public/'.$this->config->item('template')?>/css/bootstrap-extension.css" />

	<link rel="stylesheet" href="<?php echo base_url().'public/'.$this->config->item('template')?>/css/style.css" />

</head>
<body>

	<div class="navbar navbar-inverse navbar-static-top mbottom20">
		<?php $this->load->view($this->config->item('template').'/static/menu'); ?>
	</div>

	<div class="vspace40">
		<div class="container marketing">
			<div class="row">
				<div class="span8">
					<?php $this->load->view('templates/blogEngine/pages/'.$page); ?>
				</div>

				<div class="span4">
					<?php   $this->load->language('sidebar','english');
                            //$this->load->view('templates/blogEngine/sidebar/'); ?>
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header"><h3>Categories</h3></li>
							<li><a href="#">category 1</a></li>
							<li><a href="#">category 2</a></li>
							<li><a href="#">category 3</a></li>
							<li><a href="#">category 4</a></li>
							<li><a href="#">category 5</a></li>
							<li><a href="#">category 6</a></li>
							<li><a href="#">category 7</a></li>
							<li><a href="#">category 8</a></li>
							<li><a href="#">category 9</a></li>
							<li><a href="#">category 10</a></li>
						</ul>
					</div>

					<ul class="tagcloud">
						<li><a href="#" class="tag3">markup</a></li>
						<li><a href="#" class="tag2">tools</a></li>
						<li><a href="#" class="tag4">seo</a></li>
						<li><a href="#" class="tag10">css3</a></li>
						<li><a href="#" class="tag3">microformats</a></li>
						<li><a href="#" class="tag2">w3c</a></li>
						<li><a href="#" class="tag5">jQuery</a></li>
						<li><a href="#" class="tag10">twitter bootstrap</a></li>
						<li><a href="#" class="tag2">semantic</a></li>
						<li><a href="#" class="tag7">layout</a></li>
						<li><a href="#" class="tag4">design</a></li>
						<li><a href="#" class="tag6">mobile</a></li>
						<li><a href="#" class="tag1">php</a></li>
						<li><a href="#" class="tag2">tips</a></li>
						<li><a href="#" class="tag8">mysql</a></li>
						<li><a href="#" class="tag1">menu</a></li>
						<li><a href="#" class="tag3">icons</a></li>
						<li><a href="#" class="tag5">grid</a></li>
						<li><a href="#" class="tag2">templates</a></li>
						<li><a href="#" class="tag5">javascript</a></li>
						<li><a href="#" class="tag9">html5</a></li>
						<li><a href="#" class="tag4">trends</a></li>
						<li><a href="#" class="tag2">tutorials</a></li>
					</ul>

					<hr />

					<div class="well">
						<form class="form login-form">
							<h2>Sign in</h2>
							<div>
								<label>Username</label>
								<input id="Username" name="Username" type="text" />

								<label>Password</label>
								<input id="Password" name="Password" type="password" />

								<label class="checkbox inline">
									<input type="checkbox" id="RememberMe" value="option1"> Remember me
								</label>

								<br /><br />

								<button type="submit" class="btn btn-success">Login</button>
							</div>
							<br />
							<a href="#">register</a>&nbsp;&#124;&nbsp;<a href="#">forgot password?</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="footer" class="vspace20">
		<?php $this->load->language("sidebar","english"); ?>
		<?php $this->load->view('templates/blogEngine/static/footer'); ?>
	</footer>


	<script src="<?php echo base_url().'public/'.$this->config->item('template')?>/js/jquery-1.10.0.min.js"></script>
	<script src="<?php echo base_url().'public/'.$this->config->item('template')?>/js/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url().'public/'.$this->config->item('template')?>/js/holder.js"></script>
	<script src="<?php echo base_url().'public/'.$this->config->item('template')?>/js/script.js"></script>
</body>
</html>
