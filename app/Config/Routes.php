<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Hlavní stránka (karty závodů)
$routes->get('race/(:num)', 'Home::race/$1'); // Stránka závodu (tabulka ročníků)
$routes->get('profile', 'Home::profile'); // Profil přihlášeného uživatele