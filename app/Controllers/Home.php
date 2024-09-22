<?php

namespace App\Controllers;

use App\Models\RaceModel;
use App\Models\RaceYearModel;
use App\Models\UserModel;

class Home extends BaseController
{
    private $session;

    // Konstruktor controlleru
    public function __construct()
    {
        $this->session = session();
    }

    // Metoda zobrazující hlavní stránku
    public function index()
    {
        $raceModel = new RaceModel();
        $data['races'] = $raceModel->paginate(18);
        $data['pager'] = $raceModel->pager;
        return view('main_page', $data);
    }

    // Metoda zobrazující stránku závodu
    public function race($raceId)
    {
        $raceModel = new RaceModel();
        $data['race'] = $raceModel->find($raceId);
        
        $raceYearModel = new RaceYearModel();
        $data['race_years'] = $raceYearModel->where('id_race', $raceId)->findAll();
        return view('race_page', $data);
    }

    // Metoda zobrazující profil přihlášeného uživatele
    public function profile()
    {
        // Chybí: data přihlášeného uživatele (jméno, e-mail)
        return view('profile');
    }

    // Registrace nového uživatele
    public function register()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $password2 = $this->request->getVar('password2');

        if ($password != $password2)
        {
            $this->session->setFlashdata('register_message', 'Passwords not matching!');
            return redirect()->to('register');
        }

        $userModel = new UserModel();
        $newUser = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $userModel->insert((object)$newUser);
        return redirect()->to('login');
    }

    // Přihlášení uživatele
    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();

        $user = $userModel->where('username', $username)->first();

        if (empty($user))
        {
            $this->session->setFlashdata('login_message', 'User not found!');
            return redirect()->to('login');
        }

        if (!password_verify($password, $user->password))
        {
            $this->session->setFlashdata('login_message', 'Password not correct!');
            return redirect()->to('login');
        }

        $this->session->set('username', $username);
        $this->session->set('password', password_hash($password, PASSWORD_DEFAULT));
        return redirect()->to('/');
    }

    // Registrační formulář
    public function registerForm()
    {
        $data = ['message' => $this->session->getFlashdata('register_message')];
        return view('register', $data);
    }

    // Přihlašovací formulář
    public function loginForm()
    {
        $data = ['message' => $this->session->getFlashdata('login_message')];
        return view('login', $data);
    }
}
