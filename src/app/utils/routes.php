<?php

$route = [
    '/' => ["GET" => "home/HomePageController@showHomePage"],
    '/login' => ["GET" => "login/LoginController@showLoginPage"],
    '/registration' => ["GET" => "registration/RegistrationController@showRegistrationPage"],
    '/home' => ["GET" => "home/HomePageController@showHomePage"],
    '/search' => ["GET" => "search/SearchPageController@showSearchPage"],
    '/watchlist' => ["GET" => "watchlist/WatchListPageController@showWatchListPage"],
    '/manage-film' => ["GET" => "film/ManageFilmController@showManageFilmPage"],
    '/manage-user' => ["GET" => "user/ManageUserController@showManageUserPage"],
    '/user-detail/:username' => ["GET" => "user/UserDetailController@showUserDetailPage"],
    '/watch/:id' => ["GET" => "film/DetailFilmController@showDetailFilmPage"],
];