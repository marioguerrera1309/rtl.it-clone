<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\Account;
use App\Models\ContestSalvati;
use App\Models\RisposteContestSalvate;
use App\Models\EventiSalvati;
use App\Models\Preferiti;
class ModificheController extends BaseController {
    public function informazioni_personali() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        return view('informazioni_personali');
    }
    public function datiUtente() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $row=Account::where('email', $email)->first();
        $info=array();
        if(Request::get('nome') != $row['nome']) {
            Account::where('email', $email)->update(['nome' => Request::get('nome')]);
            $info[]='Nome modificato con successo';
        }
        if(Request::get('cognome') != $row['cognome']) {
            Account::where('email', $email)->update(['cognome' => Request::get('cognome')]);
            $info[]='Cognome modificato con successo';
        }
        if(Request::get('data') != $row['date']) {
            Account::where('email', $email)->update(['date' => Request::get('data')]);
            $info[]='Data di nascita modificata con successo';
        }
        if(Request::get('genere') != $row['genere']) {
            Account::where('email', $email)->update(['genere' => Request::get('genere')]);
            $info[]='Genere modificato con successo';
        }
        if((Request::get('newsletter'))) {
            $x = "no";
        } else {
            $x = "si";
        }
        if($x != $row['newsletter']) {
            Account::where('email', $email)->update(['newsletter' => $x]);
            $info[]='Newsletter modificata con successo';
        }
        if(Request::get('consenso') != $row['consenso']) {
            Account::where('email', $email)->update(['consenso' => Request::get('consenso')]);
            $info[]='Consenso modificato con successo';
        }
        echo json_encode($info);
    }
    public function dati() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $info=array();
        $row=Account::where('email', $email)->first();
        $info[] = array('nome' => $row['nome'],
                        'cognome' => $row['cognome'],
                        'data' => $row['date'],
                        'genere' => $row['genere'],
                        'newsletter' => $row['newsletter'],
                        'consenso' => $row['consenso']);
        echo json_encode($info);
    }
    public function upload_img() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $info=array();
        if(Request::hasFile('image')) {
            $immagine = Request::file('image');
            $image = file_get_contents($immagine->getRealPath());
        } else {
            $image = "";
        }
        $ris=Account::where('email', $email)->update(['image' => $image]);
        $row=Account::where('email', $email)->first();
        $info[] = array('nome' => $row['nome'],
                        'cognome' => $row['cognome'],
                        'email' => $row['email'],
                        'image' => base64_encode($row['image']));
        echo json_encode($info);
    }
    public function delete() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $info=array();
        $ris=ContestSalvati::where('email', $email)->delete();
        $ris=RisposteContestSalvate::where('email', $email)->delete();
        $ris=EventiSalvati::where('email', $email)->delete();
        $ris=Preferiti::where('email', $email)->delete();
        $ris=Account::where('email', $email)->delete();
        $info[]='Account eliminato con successo';
        Session::forget('email');
        Session::flush();
        echo json_encode($info);
    }
    public function contatti() {
        $account=Account::where('email', Session::get('email'))->first();
        return view('contatti')->with('account', $account);
    }
    public function compila() {
        $account=Account::where('email', Session::get('email'))->first();
        echo json_encode(array('prefisso' => $account['prefisso'], 'nazione'=> $account['nazione'], 'messaggi'=>array()));
    }
    public function contattiUtente() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $info=array();
        $row=Account::where('email', $email)->first();
        if(Request::get('prefisso') != $row['prefisso']) {
            Account::where('email', $email)->update(['prefisso' => Request::get('prefisso')]);
            $info[]='Prefisso modificato con successo';
        }
        if(Request::get('nazioni') != $row['nazione']) {
            Account::where('email', $email)->update(['nazione' => Request::get('nazioni')]);
            $info[]='Nazione modificata con successo';
        }
        if(Request::get('comune')!= $row['comune']) {
            Account::where('email', $email)->update(['comune' => Request::get('comune')]);
            $info[]='Comune modificato con successo';
        }
        if(Request::get('telefono') != $row['telefono']) {
            Account::where('email', $email)->update(['telefono' => Request::get('telefono')]);
            $info[]='Telefono modificato con successo';
        }
        if(Request::get('email')!= $row['email']) {
            if(Account::where('email', Request::get('email'))->exists()) {
                $info[]='Email già esistente';
            } else if(!filter_var(Request::get("email"), FILTER_VALIDATE_EMAIL)) {
                $info[]='Email non valida';
            } else {
                DB::transaction(function() use ($row) {
                    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                    $risposte_contest_salvate=RisposteContestSalvate::where('email', $row['email'])->get();
                    foreach($risposte_contest_salvate as $risposta) {
                        $risposta->email=Request::get('email');
                        $risposta->save();
                    }
                    $contest_salvati=ContestSalvati::where('email', $row['email'])->get();
                    foreach($contest_salvati as $contest) {
                        $contest->email=Request::get('email');
                        $contest->save();
                    }
                    $eventi_salvati=EventiSalvati::where('email', $row['email'])->get();
                    foreach($eventi_salvati as $evento) {
                        $evento->email=Request::get('email');
                        $evento->save();
                    }
                    $preferiti=Preferiti::where('email', $row['email'])->get();
                    foreach($preferiti as $preferito) {
                        $preferito->email=Request::get('email');
                        $preferito->save();
                    }
                    Account::where('email', $row['email'])->update(['email' => Request::get('email')]);
                    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                });
                $info[]='Email modificata con successo';
                Session::forget('email');
                Session::flush();
                Session::put('email', Request::get('email'));
            }
        }
        $account=Account::where('email', Session::get('email'))->first();
        $esito=array('prefisso' => $account['prefisso'], 'nazione'=> $account['nazione'], 'messaggi'=>$info);
        echo json_encode($esito);
    }
    public function password() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $account=Account::where('email', Session::get('email'))->first();
        return view('password')->with('account', $account);
    }
    public function aggiornaPassword() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $info=array();
        $row=Account::where('email', $email)->first();
        if(password_verify(Request::get('password_a'), $row['password'])){
            Account::where('email', $email)->update(['password' => password_hash(Request::get('password_n'), PASSWORD_BCRYPT)]);
            $info[]='Password modificata con successo';
        } else {
            $info[]='Password errata';
        }       
        echo json_encode($info);
    }
}