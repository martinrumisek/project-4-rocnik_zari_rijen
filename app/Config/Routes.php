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
$routes->get('export', 'Home::export',['filter' => 'login']); // export do tabulky excel
$routes->get('dashboard', 'Home::dashboard',['filter' => 'login']); // Dashboard admina
$routes->get('race/new', 'Home::showNewRaceForm',['filter' => 'login']); // Formulář pro přidání závodu
$routes->post('race/add', 'Home::addRace',['filter' => 'login']); // Zpracování přidání závodu
$routes->get('race/edit/(:num)', 'Home::editRace/$1',['filter' => 'login']); // Formulář pro editaci závodu
$routes->post('race/edit/(:num)', 'Home::saveRace/$1',['filter' => 'login']); // Editace závodu
$routes->get('race/delete/(:num)', 'Home::deleteRace/$1',['filter' => 'login']); // Odstranění závodu
$routes->get('graphs', 'Home::graphs',['filter' => 'login']);