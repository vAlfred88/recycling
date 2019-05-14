<?php

namespace App\Classes;

use App\MetalCost;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class LmeParseService
{
    private function getContent()
    {
        $client = new Client();
        $html = $client->request('GET', 'https://www.lme.com/');
        return $html->getBody()->getContents();
    }

    private function parseDom()
    {
        $crawler = new Crawler($this->getContent());
        $crawler = $crawler->filter("tbody > tr");
        $nodeValues = $crawler->each(
            function (Crawler $node, $i) {
                $first = $node->children()->first()->text();
                $last = $node->children()->last()->text();
                return [$first, preg_replace('%[^0-9.]%', '', $last)];
            }
        );
        return $nodeValues;
    }

    public function fillDb()
    {
        foreach ($this->parseDom() as $info)
        {
            $metal = new MetalCost();
            $metal->metal = trim(strstr($info[0],' '));
            $metal->cost = $info[1];
            $metal->save();
        }
    }

    public static function deleteOldRecords()
    {
        MetalCost::where('created_at','<',Carbon::now()->addDays(-31))->delete();
    }
}
