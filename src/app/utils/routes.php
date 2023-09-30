<?php

$route = [
    '/' => ["GET" => "home/HomePageController@showHomePage"],
    '/login' => ["GET" => "user/LoginController@showLoginPage"],
    '/registration' => ["GET" => "user/RegistrationController@showRegistrationPage"],
    '/home' => ["GET" => "home/HomePageController@showHomePage"],
    '/search' => ["GET" => "search/SearchPageController@showSearchPage"],
    '/watchlist' => ["GET" => "watchlist/WatchListPageController@showWatchListPage"],
    '/manage-film' => ["GET" => "film/ManageFilmController@showManageFilmPage"],
    '/manage-user' => ["GET" => "user/ManageUserController@showManageUserPage"],
    '/user-detail/:username' => ["GET" => "user/UserDetailController@showUserDetailPage"],
    '/watch/:id' => ["GET" => "film/DetailFilmController@showDetailFilmPage"],

    '/public/user/register' => ["POST" => "user/RegistrationController@register"],
    '/public/user/login' => ["POST" => "user/LoginController@login"],
    '/public/user/check/:username' => ["GET" => "user/manageUserController@checkUsername"]
    
];