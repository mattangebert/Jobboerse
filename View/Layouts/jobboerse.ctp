<?php
$siteDescription = 'Jobbörse';
$siteVersion = 'Siteversion: 1.0 made by MattanGebert';
$siteServer = 'Server hosted by SimonGebert'
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $siteDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>
				<?php echo $this->Html->link(
						$siteDescription,
						'/jobs',
    					array('class' => 'button')
					); 
				?>
            </h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p>
				<?php echo $siteVersion; ?>                
			</p>
            <p>
				<?php echo $siteServer; ?>                
			</p>
		</div>
	</div>
</body>
</html>
