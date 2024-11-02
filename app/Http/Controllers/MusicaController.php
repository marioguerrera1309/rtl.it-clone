<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\Preferiti;
class MusicaController extends BaseController {
    public function musica() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $client_id = env('SPOTIFY_CLIENT_ID');
        $client_secret = env('SPOTIFY_CLIENT_SECRET');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);    
        $url = 'https://api.spotify.com/v1/browse/new-releases';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
        $res=curl_exec($ch);
        curl_close($ch);
        echo $res;
    }
    public function preferiti() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $preferito = Preferiti::where('email', Session::get('email'))->get(['id', 'content']);
        $ris = array();
        foreach($preferito as $p) {
            $ris[] = array('id' => $p->id, 'content' => json_decode($p->content));
        }
        echo json_encode($ris);
    }
    public function aggiungiPreferiti() {
        $ris=array();
        if(!Session::has('email')) {
            return redirect('index');
        }
        $id = Request::post('id');
        $nome = Request::post('nome');
        $immagine = Request::post('immagine');
        $artisti=array();
        $i=0;
        while(!empty(Request::post('artista_'.$i))) {
            $artisti[]=Request::post('artista_'.$i);
            $i++;
        }
        $release_date = Request::post('release_date');
        $tracce = Request::post('tracce');
        if(Preferiti::where('email', Session::get('email'))->where('id', $id)->first()){
            $ris=array('esito' => 'preferito già aggiunto!');
            echo json_encode($ris);
            exit;
        } else {
            $content = json_encode(array(
                'nome' => $nome,
                'immagine' => $immagine,
                'artisti' => $artisti,
                'release_date' => $release_date,
                'tracce' => $tracce
            ), JSON_UNESCAPED_UNICODE);
            $preferito = new Preferiti;
            $preferito->email = Session::get('email');
            $preferito->id = $id;
            $preferito->content = $content;
            $preferito->save();
            $ris=array('esito' => 'preferito aggiunto!', 'id' => $id);
        }
        echo json_encode($ris);
    }
    public function rimuoviPreferiti() {
        if(!Session::has('email')) {
            return redirect('index');
        }
        $preferito=Preferiti::where('email', Session::get('email'))->where('id', Request::post('id'))->first();
        if($preferito){
            $preferito->delete();
            $ris=array('esito' => 'preferito rimosso!',
                        'id' => Request::post('id'));
            echo json_encode($ris);
        }
    }
}