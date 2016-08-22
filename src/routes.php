<?php

// index page
$app->get('/', 'LoginController:index');

// check user and password
$app->post('/', 'LoginController:checkUser');