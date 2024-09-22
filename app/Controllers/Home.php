<?php

namespace App\Controllers;

use App\Models\RaceModel;
use App\Models\RaceYearModel;

class Home extends BaseController
{
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
}