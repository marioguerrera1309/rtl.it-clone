<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\Account;
use App\Models\Nazioni;
class LoginController extends BaseController {
    public function login() {
        return view('login');
    }
    public function do_login() {
        if(Session::has('email')){
            return redirect('home');
        }
        $errors=array();
        if(!empty(Request::post('email')) && !empty(Request::post('password'))) {
            $account = Account::where('email', Request::post('email'))->first();
            if($account) {
                if(password_verify(Request::post('password'), $account->password)) {
                    Session::put('email', $account->email);
                    return redirect('home');
                } else {
                    return redirect('login')->withInput()->withErrors(['errors' => 'Email o password errati']);
                }
            }
            else {
                return redirect('login')->withInput()->withErrors(['errors' => 'Account inesistente']);
            }
        } else {
            return redirect('login')->withInput()->withErrors(['errors' => 'Compilare tutti i campi']);
        }
    }
    public function registration() {
        return view('registration');
    }
    public function do_registration() {
        if(Session::has('email')){
            return redirect('home');
        }
        if(!empty(Request::get("email")) && !empty(Request::get("nome")) && !empty(Request::get("cognome")) && !empty(Request::get("prefisso")) && !empty(Request::get("telefono")) && !empty(Request::get("date")) && !empty(Request::get("genere")) && !empty(Request::get("comune")) && !empty(Request::get("nazione")) && !empty(Request::get("password")) && !empty(Request::get("consenso"))){
            $error = array();
            if (!filter_var(Request::get("email"), FILTER_VALIDATE_EMAIL)) {
                $error[] = "Email non valida";
            } else {
                if (Account::where('email', Request::get('email'))->first()) {
                    $error[] = "Email già utilizzata";
                }
            }
            if (strlen(Request::get("password")) < 8) {
                $error[] = "Caratteri password insufficienti";
            }
            if(!(strpos(Request::get("password"), Request::get("nome")) === false && strpos(Request::get("password"), Request::get("email"))=== false && strlen(Request::get("email"))>0 && strlen(Request::get("nome"))>0)) {
                $error[] = "La password non deve includere nome o email"; 
            }
            $Data = "/^(0?[1-9]|[1-2][0-9]|3[0-1])\/(0?[1-9]|1[0-2])\/(19[0-9][0-9]|20[0-2][0-4])$/";
            if(strtotime(Request::get("date")) > strtotime("today") && !preg_match($Data, Request::get("date"))) {
                $error[] = "Data di nascita non valida";
            }
            if (count($error) == 0) {
                $nome = Request::get("nome");
                $cognome = Request::get("cognome");
                $email = Request::get("email");
                $prefisso = Request::get("prefisso");
                $telefono = Request::get("telefono");
                $date= Request::get("date");
                $genere= Request::get("genere");
                $comune = Request::get("comune");
                $nazione=Request::get("nazione");
                $password = Request::get("password");
                $password = password_hash($password, PASSWORD_BCRYPT);
                if(!empty(Request::get("newsletter"))) {
                    $newsletter = Request::get("newsletter");
                } else {
                    $newsletter = "si";
                }
                $consenso=Request::get("consenso");
                if(Request::hasFile('image')) {
                    $immagine = Request::file('image');
                    $image = file_get_contents($immagine->getRealPath());
                } else {
                    $image = "";
                }
                $account = new Account;
                $account->nome = $nome;
                $account->cognome = $cognome;
                $account->email = $email;
                $account->prefisso = $prefisso;
                $account->telefono = $telefono;
                $account->date = $date;
                $account->genere = $genere;
                $account->comune = $comune;
                $account->nazione = $nazione;
                $account->password = $password;
                $account->newsletter = $newsletter;
                $account->consenso = $consenso;
                $account->image = $image;
                $account->save();
                Session::put('email', $email);
                return redirect('home');
            } else {
                return redirect('registration')->withInput()->withErrors(['errors' => $error]);
            }
        }
    }
    public function passwordDimenticata() {
        if(!Session::has('email')){
            return view('passwordDimenticata');
        } else {
            return redirect('home');
        }
    }
}