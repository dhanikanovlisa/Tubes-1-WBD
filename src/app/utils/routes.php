<?php

$route = [
    '/' => ["GET" => "home/HomePageController@showHomePage"],
    '/login' => ["GET" => "user/LoginController@showLoginPage"],
    '/registration' => ["GET" => "user/RegistrationController@showRegistrationPage"],
    '/home' => ["GET" => "home/HomePageController@showHomePage"],
    '/search' => ["GET" => "search/SearchPageController@showSearchPage"],
    '/watchlist' => ["GET" => "watchlist/WatchListPageController@showWatchListPage"],
    '/manage-film' => ["GET" => "film/FilmController@showManageFilmPage"],
    '/manage-user' => ["GET" => "user/ManageUserController@showManageUserPage"],
    '/user-detail/:username' => ["GET" => "user/UserDetailController@showUserDetailPage"],
    '/watch/:id' => ["GET" => "film/FilmController@showWatchFilmPage"],
    '/detail-film/:id' => ["GET" => "film/FilmController@showDetailFilmPage"],
    
    '/public/user/register' => ["POST" => "user/RegistrationController@register"],
    '/public/user/login' => ["POST" => "user/LoginController@login"],
    '/public/user/check/:username' => ["GET" => "user/manageUserController@checkUsername"],
    '/public/user/logout' => ["GET" => "user/LoginController@logout"],
    
    '/add-film' => ["GET" => "film/FilmController@showAddFilmPage"],
    '/add-film/add-film' => ["POST" => "film/FilmController@addFilm"],

    'edit-film/:id' => ["GET" => "film/FilmController@showEditFilmPage"],
    '/edit-film/:id' => ["POST" => "film/FilmController@editFilm"],
];