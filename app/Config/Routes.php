<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'login']); // Hlavní stránka (karty závodů)
$routes->get('filter', 'Home::filter');
$routes->get('race/(:num)', 'Home::race/$1', ['filter' => 'login']); // Stránka závodu (tabulka ročníků)
$routes->get('profile', 'Home::profile', ['filter' => 'login']); // Profil přihlášeného uživatele
$routes->post('register', 'Home::register'); // Registrace nového uživatele
$routes->get('register', 'Home::registerForm'); // Registrační formulář
$routes->post('login', 'Home::login'); // Přihlášení uživatele
$routes->get('login', 'Home::loginForm'); // Přihlašovací formulář
$routes->get('generate-pdf/(:num)', 'Home::generate_pdf/$1', ['filter' => 'login']); //generovaní PDF