<?php

$route = [
    '/' => ["GET" => "user/LoginController@showLoginPage"],
    '/login' => ["GET" => "user/LoginController@showLoginPage"],
    '/registration' => ["GET" => "user/RegistrationController@showRegistrationPage"],
    '/home' => ["GET" => "user/HomePageController@showHomePage"],
    '/search' => ["GET" => "search/SearchPageController@showSearchPage"],
    '/watchlist' => ["GET" => "watchlist/WatchListPageController@showWatchListPage"],
    '/manage-film' => ["GET" => "film/FilmController@showManageFilmPage"],
    '/manage-user' => ["GET" => "user/ManageUserController@showManageUserPage"],
    '/user-detail/:username' => ["GET" => "user/UserDetailController@showUserDetailPage"],
    '/watch/:id' => ["GET" => "film/FilmController@showWatchFilmPage"],
    '/detail-film/:id' => ["GET" => "film/FilmController@showDetailFilmPage"],
    
    '/register/register' => ["POST" => "user/RegistrationController@register"],
    '/login/login' => ["POST" => "user/LoginController@login"],
    '/check/username/:username' => ["GET" => "user/manageUserController@checkUsername"],
    '/logout' => ["GET" => "user/LoginController@logout"],
    
    '/add-film' => ["GET" => "film/FilmController@showAddFilmPage"],
    '/add-film/add-film' => ["POST" => "film/FilmController@addFilm"],

    'edit-film/:id' => ["GET" => "film/FilmController@showEditFilmPage"],
    '/edit-film/:id' => ["PUT" => "film/FilmController@editFilm"],
    '/edit-film/delete-film' => ["DELETE" => "film/FilmController@deleteFilm"],

    '/page-not-found' => ["GET" => "conditional/NotFoundController@showNotFoundPage"],
    '/restrict' => ["GET" => "conditional/RestrictedController@showRestrictedPage"],
    '/restrictAdmin' => ["GET" => "conditional/RestrictedController@showAdminModePage"],
];