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
		<?php $this->load->view($folder_themes . '/partials/slider')
		?>
		<?php $this->load->view($folder_themes . '/partials/headline')
		?>
		<?php //$this->load->view($folder_themes . '/partials/practice_mini')
		?>

		<?php $this->load->view($folder_themes . '/partials/statistic_front')
		?>
				<?php $this->load->view($folder_themes . '/partials/practice_area')
		?>

		<?php $this->load->view($folder_themes . '/partials/aboutus_front')
		?>
		<?php //$this->load->view($folder_themes . '/partials/stared_front')
		?>
		<?php $this->load->view($folder_themes . '/partials/team_front')
		?>
		<?php $this->load->view($folder_themes . '/partials/form_advice')
		?>
		<?php $this->load->view($folder_themes . '/partials/testimony')
		?>
		<?php $this->load->view($folder_themes . '/partials/article_front')
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