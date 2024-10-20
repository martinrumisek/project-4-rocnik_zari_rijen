<?php

namespace App\Controllers;

use App\Models\RaceModel;
use App\Models\RaceYearModel;
use App\Models\UserModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $data['races'] = $raceModel->paginate(15);
        $data['pager'] = $raceModel->pager;
        $userId = $this->session->get('idUser');
        $data['user'] = $userId;
        return view('main_page', $data);
    }
    public function filter()
{
    $raceModel = new RaceModel();
    $filter = $this->request->getGet('filter');
    $sort = $this->request->getGet('sort');

    // Filtrování
    if ($filter) {
        $raceModel->like('default_name', $filter);
    }

    // Řazení
    if ($sort) {
        $sortOptions = explode(',', $sort); // Rozdělení na jednotlivé možnosti řazení
        foreach ($sortOptions as $option) {
            switch ($option) {
                case 'default_name_asc':
                    $raceModel->orderBy('default_name', 'ASC');
                    break;
                case 'default_name_desc':
                    $raceModel->orderBy('default_name', 'DESC');
                    break;
                case 'date_asc':
                    $raceModel->orderBy('date', 'ASC');
                    break;
                case 'date_desc':
                    $raceModel->orderBy('date', 'DESC');
                    break;
            }
        }
    }

    $data['races'] = $raceModel->paginate(18);
    $data['pager'] = $raceModel->pager; // Přidejte pager do dat
    return view('race_cards', $data);
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
    public function profile($idUser)
    {
        $user = $this->session->get('idUser');
        if($user == $idUser){
            $userModel = new UserModel();
            $data['user'] = $userModel->find($idUser);
            $data['interests'] = isset($data['user']->interests) ? json_decode($data['user']->interests, true) : [];
            return view('profile', $data);   
        }else{
            return redirect()->to('/')->with('error', 'Nemáte oprávnění');
        }
    }
    public function saveDescription($idUser){
        $description = $this->request->getPost('description');
        $interests = $this->request->getPost('interests'); // Get selected interests
        $interestsJson = json_encode($interests); // Convert to JSON string

        $userModel = new UserModel();
        $userModel->save([
            'id' => $idUser, 
            'description' => $description,
            'interests' => $interestsJson // Save interests as JSON
        ]);

        return redirect()->to('profile/'.$idUser);
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

        $this->session->set('idUser', $user->id);
        $this->session->set('username', $username);
        //$this->session->set('password', password_hash($password, PASSWORD_DEFAULT)); //Heslo by se nemělo ukládat do session, protože je to riziko.
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

    // Generování PDF souborů
    public function generate_pdf($raceId){
        $options = new Options();
        $options->set('defaultFont','DejaVu Sans');
        $dompdf = new Dompdf($options);
        $raceModel = new RaceModel();
        $dataRace = $raceModel->find($raceId);
        $nameRace = $dataRace->default_name;
        $raceYearModel = new RaceYearModel();
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->set_option('defaultFont', 'DejaVu Sans');
        $dataRaceYears= $raceYearModel->where('id_race', $raceId)->findAll();
        if(!empty($dataRaceYears)){
            $firstLogo = $dataRaceYears[0];
            $logoName = $firstLogo->logo;
        }else{
            $logoName = "";
        }
        $html = '
        <!DOCTYPE html>
        <html lang="cs">
        <head>
            <meta charset="UTF-8">
            <title>PDF</title>
            <style>
                    body { font-family: DejaVu Sans; font-size: 12px; }
            </style>
        </head>
        <body>
            <div style="text-align: center;">
                <img src="' . base_url('img/logos/' . $logoName) . '" alt="' . htmlspecialchars($logoName, ENT_QUOTES, 'UTF-8') . '" style="max-height: 50px; max-width: 100%;"><br>
                <h1>' . htmlspecialchars($nameRace, ENT_QUOTES, 'UTF-8') . '</h1>
            </div>
            
            <table border="1" cellspacing="0" cellpadding="5" width="100%">
                <thead>
                    <tr>
                        <th>Zkratka země</th>
                        <th>Skutečný název</th>
                        <th>Rok</th>
                        <th>Zahajení</th>
                        <th>Ukončení</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach($dataRaceYears as $race_year) {
            $html .= '
                <tr>
                    <td>' . htmlspecialchars($race_year->country, ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($race_year->real_name, ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($race_year->year, ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($race_year->start_date, ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($race_year->end_date, ENT_QUOTES, 'UTF-8') . '</td>
                </tr>';
        }
    
        $html .= '
                </tbody>
            </table>
        </body>
        </html>';
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $this->response->setHeader('Content-Type', 'application/pdf')->setBody($dompdf->output())->send();
    }

    public function export(){
        $raceModel = new RaceModel();
        $races = $raceModel->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Název závodu');
        $sheet->setCellValue('C1', 'Zkratka země');
        $sheet->setCellValue('D1', 'Typ závodu');
        $sheet->setCellValue('E1', 'Odkaz na závod');

        $row = 2;
        foreach ($races as $race) {
            $sheet->setCellValue('A' . $row, $race->id);
            $sheet->setCellValue('B' . $row, $race->default_name);
            $sheet->setCellValue('C' . $row, $race->country);
            $sheet->setCellValue('D' . $row, $race->type);
            $sheet->setCellValue('E' . $row, $race->link);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'races_export.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

    public function dashboard()
    {
        $raceModel = new RaceModel();
        $data['races'] = $raceModel->paginate(100);
        $data['pager'] = $raceModel->pager;
        return view('dashboard', $data);  
    }

    public function addRace()
    {
        $name = $this->request->getVar('name');
        $link = $this->request->getVar('link');
        $country = $this->request->getVar('country');
        $type = $this->request->getVar('type');
        $newRace = [
            'default_name' => $name,
            'link' => $link,
            'country' => $country,
            'type' => $type
        ];
        $raceModel = new RaceModel();
        $raceModel->insert((object)$newRace);
        return redirect()->to('dashboard');
    }

    public function showNewRaceForm()
    {
        return view('race_form');
    }

    public function deleteRace($id)
    {
        $raceModel = new RaceModel();
        $raceModel->delete($id);
        return redirect()->to('dashboard');
    }

    public function editRace($id)
    {
        $raceModel = new RaceModel();
        $data['race'] = $raceModel->find($id);
        return view('race_form', $data);
    }

    public function saveRace($id)
    {
        $raceModel = new RaceModel();
        $name = $this->request->getVar('name');
        $link = $this->request->getVar('link');
        $country = $this->request->getVar('country');
        $type = $this->request->getVar('type');
        $newRace = [
            'default_name' => $name,
            'link' => $link,
            'country' => $country,
            'type' => $type,
            'id' => $id
        ];
        $raceModel->save($newRace);
        return redirect()->to('dashboard');
    }

    public function graphs()
    {
        $raceYearModel = new RaceYearModel();

        $firstYear = $raceYearModel->orderBy('year', 'asc')->first()->year;
        $lastYear = $raceYearModel->orderBy('year', 'desc')->first()->year;

        for($i = $firstYear; $i < $lastYear; $i++)
        {
            $races[$i] = count($raceYearModel->where('year', $i)->findAll());
        }
        $data['races'] = $races;

        $data['menRaces'] = $raceYearModel->where('sex', 'M')->countAllResults();
        $data['womenRaces'] = $raceYearModel->where('sex', 'W')->countAllResults();
        return view('graph', $data);
    }
}
