<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
// use GuzzleHttp\Client as GuzzleClient;

class GoutteController extends Controller
{
    private $results = array();

    public function scraper() {

        $client = new Client();
        // $guzzleClient = new GuzzleClient(array('timeout' => 60,));
        $page = $client->request('GET', $url);

        // echo "<pre>";
        // print_r($page);

        $page->filter('src')->text();

        return view('scraper');
    }
}
