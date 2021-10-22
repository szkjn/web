<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use KubAT\PhpSimple\HtmlDomParser;

class ScrapingController extends Controller
{
    public function scrape(Request $request) {

        // get url param for scraping
        $url = $request->get('url');

        // init guzzle
        $client = new Client();
    
        //get request
        $response = $client->request(
            'GET',
            $url
        );

        $response_status_code = $response->getStatusCode();
        $html = $response->getBody()->getContents();

        if($response_status_code == 200) {

            // get the whole hmtl of the page
            // dd($html);

            // get the parsed nodes
            $dom = HtmlDomParser::str_get_html($html);
            dd($dom);

            // $picture = $dom->find('meta[name="twitter:image"]', 0);
            // dd($picture);
            
            // $src = $picture->getAttribute('content');
            // return $src;
        } 
    }
}
