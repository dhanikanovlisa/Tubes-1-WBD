<?php

$route = [
    '/' => ["GET" => "home/HomePageController@showHomePage"],
    '/login' => ["GET" => "login/LoginController@showLoginPage"],
    '/registation' => ["GET" => "registration/RegistrationController@showRegistrationPage"],
    '/home' => ["GET" => "home/HomePageController@showHomePage"],
    '/search' => ["GET" => "search/SearchPageController@showSearchPage"],
    '/watchlist' => ["GET" => "watchlist/WatchListPageController@showWatchListPage"],
    '/manage-film' => ["GET" => "film/FilmController@showManageFilmPage"],
    '/manage-user' => ["GET" => "user/ManageUserController@showManageUserPage"],
    '/user-detail/:username' => ["GET" => "user/UserDetailController@showUserDetailPage"],
    '/watch/:id' => ["GET" => "film/FilmController@showWatchFilmPage"],
    '/add-film' => ["GET" => "film/FilmController@showAddFilmPage"],
    '/detail-film/:id' => ["GET" => "film/FilmController@showDetailFilmPage"],
    'edit-film/:id' => ["GET" => "film/FilmController@showEditFilmPage"],
];