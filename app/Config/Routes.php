<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'login']); // Hlavní stránka (karty závodů)
$routes->get('race/(:num)', 'Home::race/$1', ['filter' => 'login']); // Stránka závodu (tabulka ročníků)
$routes->get('profile', 'Home::profile', ['filter' => 'login']); // Profil přihlášeného uživatele
$routes->post('register', 'Home::register'); // Registrace nového uživatele
$routes->get('register', 'Home::registerForm'); // Registrační formulář
$routes->post('login', 'Home::login'); // Přihlášení uživatele
$routes->get('login', 'Home::loginForm'); // Přihlašovací formulář