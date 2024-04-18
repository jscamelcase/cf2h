<?php

$router->get('/', "UserController@login",);
$router->post('/auth/login', "UserController@authenticate",);
$router->get('/success', "SuccessController@success",);
$router->get('/logout', "UserController@logout",);
