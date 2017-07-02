<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<?php if ( !empty( $includeCss ) && count( $includeCss ) > 0 ): ?>

			<?php foreach ( $includeCss as $css ): ?>

				<link type="text/css" rel="stylesheet" href="<?= $css ?>"  media="screen,projection"/>

			<?php endforeach; ?>

		<?php endif; ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>

		<div class="container">

			<div class="row">
				
				<!-- full-width header row -->
				<div class="col s12">
				</div>

			</div>

			<div class="row">

				<!-- sidebar -->
				<div class="col s3">

					<?php if ( !empty( $sidebar ) ): ?>

						<?php echo $sidebar; ?>

					<?php endif; ?>

				</div>

				<!-- main content -->
				<div class="col s9">

					<?php echo $main_content; ?>

				</div>

			</div>

		</div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>

		<script>var SITE_URL = '<?= SITE_ROOT_URL ?>';</script>

		<?php if ( !empty( $includeJs ) && count( $includeJs ) > 0 ): ?>

			<?php foreach ( $includeJs as $js ): ?>

				<script src="<?= SITE_ROOT_URL . $js ?>"></script>

			<?php endforeach; ?>

		<?php endif; ?>

	</body>
</html>

