<!DOCTYPE HTML>
<html>

<head>
	<?php $this->load->view($folder_themes . '/reff/head')
	?>
	<?php $this->load->view($folder_themes . '/reff/css') ?>
</head>

<body>
	<?php $this->load->view($folder_themes . '/reff/loader')
	?>

	<div id="page">
		<?php $this->load->view($folder_themes . '/reff/nav')
		?>
		<?php $this->load->view($folder_themes . '/partials/article_single')
		?>
		<?php $this->load->view($folder_themes . '/partials/intro_footer')
		?>
		<?php $this->load->view($folder_themes . '/reff/footer')
		?>
	</div>

	<?php $this->load->view($folder_themes . '/reff/gototop')
	?>
	<?php $this->load->view($folder_themes . '/reff/js')
	?>
	<?php $this->load->view($folder_themes . '/reff/ga')
	?>

</body>

</html>