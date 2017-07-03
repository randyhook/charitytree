<?php
session_start();
define( 'SITE_ROOT_URL', 'http://localhost/charitytree/' );

require 'vendor/autoload.php';
Flight::path( 'classes' );
Flight::register( 'Data', 'Data' );
Flight::register( 'Result', 'Result' );

/***********************
 *
 * Routes
 *
 */

Flight::route('/', function() {
	Flight::render('home.php');
});

Flight::route('/client-app', function() {
	Flight::render('client-app-sidebar', null, 'sidebar');
	Flight::render('client-app', null, 'main_content');
	Flight::render('layout', array(
		'includeCss' => array(
			'css/client-app.css'
		),
		'includeJs' => array(
			'js/client-app.js'
		)
	));
});

Flight::route('/client-dashboard', function() {
	Flight::render('client-dashboard', null, 'main_content');
	Flight::render('layout', array(
		'includeJs' => array(
			'js/client-dashboard.js'
		)
	));
});

Flight::route('/install', function() {
	Flight::register( 'Admin', 'Admin' );
	$installCheckResult = Admin::installCheck();

	Flight::render('install', array(
		'checkResult' => $installCheckResult,
		'includeJs' => array(
			'js/form-functions.js',
			'js/install.js'
		)
	), 'main_content');
	Flight::render('layout');
});

Flight::route('/login', function() {
	Flight::render('login', null, 'main_content');
	Flight::render('layout', array(
		'includeJs' => array(
			'js/login.js'
		)
	));
});

Flight::route('/manager-dashboard', function() {
	Flight::render('manager-sidebar', null, 'sidebar');
	Flight::render('manager-dashboard', null, 'main_content');
	Flight::render('layout', array(
		'includeJs' => array(
			'vendor/nnnick/chartjs/dist/Chart.min.js',
			'js/manager-dashboard.js'
		)
	));
});

Flight::route('/ajax/start-install', function() {
	Flight::register( 'Admin', 'Admin' );
	echo json_encode( Admin::install( $_POST ) );
});

Flight::start();
?>
