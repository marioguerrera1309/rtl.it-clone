<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\Contest;
use App\Models\ContestSalvati;
use App\Models\DateContest;
use App\Models\DomandeContest;
use App\Models\RisposteContest;
use App\Models\RisposteContestSalvate;
use App\Models\Eventi;
use App\Models\EventiSalvati;
use App\Models\DateEventi;
class EventiContestController extends BaseController {
    public function eventi_contest_php() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $ris=Eventi::all();
        $eventi=array();
        foreach($ris as $row) {
            $eventi[] = array(
                'id' => $row->id,
                'titolo' => $row->titolo,
                'artista' => $row->artista,
                'image' => base64_encode($row->image)
            );
        }
        $ris=Contest::all();
        $contest=array();
        foreach($ris as $row) {
            $contest[] = array(
                'id' => $row->id,
                'titolo' => $row->titolo,
                'artista' => $row->artista,
                'image' => base64_encode($row->image)
            );
        }
        $info=array('eventi' => $eventi, 'contest' => $contest);
        echo json_encode($info);
    }
    public function eventi_contest_partecipazioni() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $ris = Eventi::join('eventi_salvati', 'eventi_salvati.id_evento', '=', 'eventi.id')->where('eventi_salvati.email', $email)->get(['eventi.id', 'eventi.titolo', 'eventi.artista', 'eventi.image', 'eventi_salvati.data']);
        $eventi=array();
        foreach($ris as $row) {
            $eventi[] = array(
                'id' => $row->id,
                'titolo' => $row->titolo,
                'artista' => $row->artista,
                'image' => base64_encode($row->image),
                'data' => $row->data
            );
        }
        $ris = Contest::join('contest_salvati', 'contest_salvati.id_contest', '=', 'contest.id')->where('contest_salvati.email', $email)->get(['contest.id', 'contest.titolo', 'contest.artista', 'contest.image', 'contest_salvati.data']);
        $contest=array();
        foreach($ris as $row) {
            $contest[] = array(
                'id' => $row->id,
                'titolo' => $row->titolo,
                'artista' => $row->artista,
                'image' => base64_encode($row->image),
                'data' => $row->data
            );
        }
        $info=array('eventi' => $eventi, 'contest' => $contest);
        echo json_encode($info);
    }
    public function eliminaPartecipazioneEvento() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $id = Request::post('id');
        EventiSalvati::where('email', $email)->where('id_evento', $id)->delete();
        echo json_encode(array('ok' => true));
    }
    public function eliminaPartecipazioneContest() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $id = Request::post('id');
        RisposteContestSalvate::where('email', $email)->join('risposte_contest', 'risposte_contest_salvate.id_risposta', '=', 'risposte_contest.id')->join('domande_contest', 'risposte_contest.id_domanda', '=', 'domande_contest.id')->where('domande_contest.contest', $id)->delete();
        ContestSalvati::where('email', $email)->where('id_contest', $id)->delete();
        echo json_encode(array('ok' => true));
    }
    public function contest() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $ris=Contest::where('id', Request::get('id'))->first();
        $contest=array();
        $contest['info'] = array(
            'id' => $ris->id,
            'titolo' => $ris->titolo,
            'artista' => $ris->artista,
            'image' => base64_encode($ris->image)
        );
        $ris=DomandeContest::where('contest', Request::get('id'))->get();
        $risposte=array();
        foreach($ris as $row) {
            $ris1=RisposteContest::where('id_domanda', $row->id)->get();
            $risposte=array();
            foreach($ris1 as $row1) {
                $risposte[] = array(
                    'id_risposta' => $row1->id,
                    'risposta' => $row1->risposta
                );
            }
            $contest['domande'][] = array(
                'id_domanda' => $row->id,
                'domanda' => $row->domanda,
                'risposte' => $risposte
            );
        }
        $ris = DateContest::where('id_contest', Request::get('id'))->get();
        foreach($ris as $row) {
            $contest['date'][] = array(
                'id_contest' => $row->id_contest,
                'data' => $row->data
            );
        }
        echo json_encode($contest);
    }
    public function evento() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $ris=Eventi::where('id', Request::get('id'))->first();
        $evento=array();
        $evento['info']=array(
            'id' => $ris->id,
            'titolo' => $ris->titolo,
            'artista' => $ris->artista,
            'image' => base64_encode($ris->image)
        );
        $ris = DateEventi::where('id_evento', Request::get('id'))->get();
        foreach($ris as $row) {
            $evento['date'][] = array(
                'id_evento' => $row->id_evento,
                'data' => $row->data
            );
        }
        echo json_encode($evento);
    }
    public function salvaEvento() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $ris = EventiSalvati::where('email', $email)->where('id_evento', Request::post('id_evento'))->get();
        if (count($ris) > 0){
            $ris=array('esito' => "Puoi partecipare una sola volta all' evento!");
        } else {
            $evento_salvato = new EventiSalvati;
            $evento_salvato->email = $email;
            $evento_salvato->id_evento = Request::post('id_evento');
            $evento_salvato->data = Request::post('data');
            $ris = $evento_salvato->save();
            if (!$ris) {
                die("Errore nella query");
            }
            $ris=array('esito' => 'Partecipazione registrata!');
        }
        echo json_encode($ris);
    }
    public function salvaRisposte() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $ris = ContestSalvati::where('email', $email)->where('id_contest', Request::post('id_contest'))->get();
        $keys=array_keys(Request::post());
        if (count($ris) > 0){
            $ris=array('esito' => 'Puoi partecipare una sola volta al contest!');
        } else if(count($keys)<5) {
            $ris=array('esito' => 'Devi rispondere a tutte le domande');
        } else {
            $contest_salvato = new ContestSalvati;
            $contest_salvato->email = $email;
            $contest_salvato->id_contest = Request::post('id_contest');
            $contest_salvato->data = Request::post('data');
            $ris = $contest_salvato->save();
            if (!$ris) {
                die("Errore nella query");
            }
            for($i=0; $i<(count($keys)-2); $i++) {
                $risposte_salvate = new RisposteContestSalvate;
                $risposte_salvate->email = $email;
                $risposte_salvate->id_risposta = Request::post($keys[$i]);
                $ris = $risposte_salvate->save();
                if (!$ris) {
                    die("Errore nella query");
                }
            }
            $ris=array('esito' => 'Partecipazione registrata!');
        }
        echo json_encode($ris);
    }
    public function aggiungiEventoDb() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $evento = new Eventi;
        $evento->titolo = Request::post('titolo');
        $evento->artista = Request::post('artista');
        if(Request::hasFile('image')) {
            $immagine = Request::file('image');
            $image = file_get_contents($immagine->getRealPath());
        } else {
            $image = "";
        }
        $evento->image = $image;
        $ris = $evento->save();
        if (!$ris) {
            die("Errore nella query");
        }
        $n=Request::post('n_date');
        for($i=1; $i<=$n; $i++) {
            $date = new DateEventi;
            $date->id_evento = $evento->id;
            $date->data = Request::post('data_'.$i."_evento");
            $ris = $date->save();
            if (!$ris) {
                die("Errore nella query");
            }
        }
        echo json_encode(array('esito' => 'Evento aggiunto correttamente'));
    }
    public function aggiungiContestDb() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $contest = new Contest;
        $contest->titolo = Request::post('titolo');
        $contest->artista = Request::post('artista');
        if(Request::hasFile('image')) {
            $immagine = Request::file('image');
            $image = file_get_contents($immagine->getRealPath());
        } else {
            $image = "";
        }
        $contest->image = $image;
        $ris = $contest->save();
        if (!$ris) {
            die("Errore nella query");
        }
        $n=Request::post('n_date');
        for($i=1; $i<=$n; $i++) {
            $date = new DateContest;
            $date->id_contest = $contest->id;
            $date->data = Request::post('data_'.$i."_contest");
            $ris = $date->save();
            if (!$ris) {
                die("Errore nella query");
            }
        }
        for($i=1; $i<=3; $i++) {
            $domanda = new DomandeContest;
            $domanda->contest = $contest->id;
            $domanda->domanda = Request::post('domanda'.$i);
            $ris = $domanda->save();
            if (!$ris) {
                die("Errore nella query");
            }
            for($j=1; $j<=3; $j++) {
                $risposta = new RisposteContest;
                $risposta->id_domanda = $domanda->id;
                $risposta->risposta = Request::post('risposta'.$j.$i);
                $ris = $risposta->save();
                if (!$ris) {
                    die("Errore nella query");
                }
            }
        }
        echo json_encode(array('esito' => 'Contest aggiunto correttamente'));
    }
    public function eliminaEvento() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $id = Request::post('id');
        EventiSalvati::where('id_evento', $id)->delete();
        DateEventi::where('id_evento', $id)->delete();
        Eventi::where('id', $id)->delete();
        echo json_encode(array('esito' => 'Evento eliminato correttamente'));
    }
    public function eliminaContest() {
        if(!Session::has('email')) {
            return redirect('login');
        }
        $email = Session::get('email');
        $id = Request::post('id');
        ContestSalvati::where('id_contest', $id)->delete();
        DateContest::where('id_contest', $id)->delete();
        RisposteContestSalvate::join('risposte_contest', 'risposte_contest_salvate.id_risposta', '=', 'risposte_contest.id')->join('domande_contest', 'risposte_contest.id_domanda', '=', 'domande_contest.id')->where('domande_contest.contest', $id)->delete();
        RisposteContest::join('domande_contest', 'risposte_contest.id_domanda', '=', 'domande_contest.id')->where('domande_contest.contest', $id)->delete();
        DomandeContest::where('contest', $id)->delete();
        Contest::where('id', $id)->delete();
        echo json_encode(array('esito' => 'Contest eliminato correttamente'));
    }
}