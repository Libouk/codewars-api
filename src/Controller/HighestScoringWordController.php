<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/highestscoringword")
 */
class HighestScoringWordController extends Controller
{
    function High($x) {
        //explode the incoming string into an array of words
        $arrExplodedSentence = explode(' ', $x);
        $arrWordScore = [];
        
        foreach($arrExplodedSentence as $word) {
            $wordScore = 0;
            // split each word into an array of characters
            $splitWord = str_split($word);
            foreach($splitWord as $character) {
                //get each character's score by searchning for it in an alphabetic array then sum it in a wordScore
                if(array_search($character, range('a', 'z'))) {
                    $wordScore += 1 + array_search($character, range('a', 'z'))  ;
                }
            }
            $arrWordScore[] = $wordScore;
        }
        // sort the word scores in descending order
        arsort($arrWordScore);
        return $arrExplodedSentence[key($arrWordScore)];
    }

    public function show(string $strToSort): Response
    {
        $response = new Response();
        $date = new \DateTime();
        $HighestScoringWord = self::High($strToSort);
        $response->setContent(json_encode([
            'highestScoreWord' => $HighestScoringWord,
            'time' => $date->format('Y-m-d')
        ]));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
        return $response;
    }
}