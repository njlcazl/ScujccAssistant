<?php

/**
 * This is a lib to crawl the Academic Network Systems.
 * You can easely achieve the querying of grade/schedule/cet/free classroom ...
 * 
 * @author Ning Luo <luoning@Luoning.me>
 * @link https://github.com/lndj/Lcrawl
 * @license  MIT
 */ 

namespace Lndj\Traits;

use Symfony\Component\DomCrawler\Crawler;

/**
 * This is trait to parser data from HTML.
 */
trait  Parser {
    /**
     * Paser the schedule data.
     * 
     * @param Object $body 
     * @return Array
     */
    public function parserSchedule($body)
    {
        $crawler = new Crawler((string)$body);
        $crawler = $crawler->filter('#Table1');
        $schedule = $crawler->children();
        $data_line = [];
        $Null_string = $schedule->eq(1)->children()->eq(1)->html();
        //loop the row
        for ($i=2; $i <= 10; $i++) {
            $cnt = $schedule->eq($i)->children()->count();
            for($j = 2; $j < $cnt;$j++) {
                $schedule_info = trim($schedule->eq($i)->children()->eq($j)->html());
                if(strcmp($schedule_info, $Null_string) != 0 ) {
                    array_push($data_line, $schedule_info);
                }
            }
        }
        //Formate the data array.
        return $data_line;
    }

    /**
     * Parser the common table, like grade, cet, chooseClass, etc.
     * 
     * @param type|Object $body 
     * @param type|string $selector 
     * @return array
     */
    public function parserCommonTable($body, $selector)
    {
        $crawler = new Crawler((string)$body);
        $crawler = $crawler->filter($selector);
        $tmp_crawler = $crawler->children();
        $data = $tmp_crawler->each(function (Crawler $node, $i) {
            return $node->children()->each(function (Crawler $node, $j) {
                return $node->text();
            });
        });
        //Unset the title.
        unset($data[0]);
        return $data;
    }

    /**
     * Parser the hidden value of HTML form.
     * 
     * @param type $body 
     * @return type
     */
    public function parserHiddenValue($body)
    {
        $crawler = new Crawler((string)$body);
        return $crawler->filterXPath('//input[@name="__VIEWSTATE"]')->attr('value');
    }
}