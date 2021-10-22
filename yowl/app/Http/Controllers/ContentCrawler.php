<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Exception;

class ContentCrawler extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'timeout'   => 10,
            'verify'    => false
        ]);
    }

    public function getCrawlerContent()
    {
        try {
            $response = $this->client->get('https://www.adidas.fr/stan-smith-w/H03941.html?cm_sp=SLOT-9.4-_-HOME_%3F_%3F_HOME_PRODUCT_SHOWCASE-_-PRODUCTSELECTIONCAROUSEL-PRODUCT-CARD-_-494442'); // URL, where you want to fetch the content
            // get content and pass to the crawler
            $content = $response->getBody()->getContents();
            $crawler = new Crawler($content);

            $_this = $this;
            $data = $crawler->filter('div.card--post')
                ->each(
                    function (Crawler $node, $i) use ($_this) {
                        return $_this->getNodeContent($node);
                    }
                );
            dump($data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function hasContent($node)
    {
        return $node->count() > 0 ? true : false;
    }

    private function getNodeContent($node)
    {
        $array = [
            'title' => $this->hasContent($node->filter('.post__content h2')) != false ? $node->filter('.post__content h2')->text() : '',
            'content' => $this->hasContent($node->filter('.post__content p')) != false ? $node->filter('.post__content p')->text() : '',
            'author' => $this->hasContent($node->filter('.author__content h4 a')) != false ? $node->filter('.author__content h4 a')->text() : '',
            'featured_image' => $this->hasContent($node->filter('.post__image a img')) != false ? $node->filter('.post__image a img')->eq(0)->attr('src') : ''
        ];
        return $array;
    }
}
