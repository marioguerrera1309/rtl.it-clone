<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;

class ApiController extends BaseController {
    public function NyTimes() {
        $apikey = env('NYTIMES_API_KEY');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.nytimes.com/svc/topstories/v2/world.json?api-key='.$apikey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res=curl_exec($ch);
        curl_close($ch);
        echo $res;
    }
    public function Gnews() {
        $apikey = env('GNEWS_API_KEY');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://gnews.io/api/v4/search?q=musica&apikey='.$apikey.'&lang=it&country=it&max=10');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res=curl_exec($ch);
        curl_close($ch);
        echo $res;
    }
}