<?php

// Init app instance
$app = require "./core/app.php";

// Get all users from DB, eager load all fields using '*'
$users = User::findAllOrderedByCreatedAt($app->db);

// Render view 'views/index.php' and pass users variable there
$app->renderView('index', array(
	'users' => $users
));
