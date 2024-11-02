<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\Account;
class HomeController extends BaseController {
    public function home() {
        if(Session::has('email')){
            return view('home');
        }
        else {
            return redirect('login');
        }
    }
    public function profilo() {
        if(!Session::has('email')){
            $info="Errore: sessione non attiva";
            echo json_encode($info);
        } else {
            $email = Session::get('email');
            $row = Account::where('email', $email)->first();
            $info[] = array('nome' => $row['nome'],
                            'cognome' => $row['cognome'],
                            'email' => $row['email'],
                            'image' => base64_encode($row['image']));
            echo json_encode($info);
        }
    }
    public function logout() {
        Session::flush();
        return redirect('login');
    }
    public function modifiche() {
        if(!Session::has('email')){
            return redirect('login');   
        } else {
            return view('modifiche');
        }
    }
    public function cerca() {
        if(!Session::has('email')){
            return redirect('login');   
        } else {
            return view('cerca');
        }
    }
    public function musica() {
        if(!Session::has('email')){
            return redirect('login');   
        } else {
            return view('musica');
        }
    }
}