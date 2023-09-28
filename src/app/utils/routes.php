<?php

$route = [
    '/' => ["GET" => "/"],
    '/login' => ["GET" => "LoginController@showLoginPage"],
    '/registation' => ["GET" => "RegistrationController@showRegistrationPage"],
    '/home' => ["GET" => "HomePageController@showHomePage"],
    '/search' => ["GET" => "SearchPageController@showSearchPage"],
    '/watchlist' => ["GET" => "WatchListPageController@showWatchListPage"],
    '/manage-film' => ["GET" => "ManageFilmController@showManageFilmPage"],
    '/manage-user' => ["GET" => "ManageUserController@showManageUserPage"],
];
