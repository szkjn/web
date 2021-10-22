<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use KubAT\PhpSimple\HtmlDomParser;

class Scraper extends Model
{
    use HasFactory;

    // public function __construct()
    // {
    //     var_dump('scraper hello');
    // }

    public function scrape($url) {

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
            // dd($dom);

            $picture = $dom->find('meta[name="twitter:image"]', 0);
            dd($picture);
            
            $src = $picture->getAttribute('content');
            // dd($src);

            return $src;
        } 
    }
}
