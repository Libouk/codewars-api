<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MumblingController extends Controller
{
    function accum($s) 
    {
    $computedArr = [];
    $stringArr = str_split($s);
    foreach($stringArr as $key => $value) {
        array_push($computedArr, ucfirst(strtolower(str_repeat($value, ++$key))));
    }
    $resultStr = implode('-', $computedArr);
    return $resultStr;
    }

    function MumblingDemo($characters) 
    {
        $response = new Response();
        $date = new \DateTime();

        $resultString = self::accum($characters);

        $response->setContent(json_encode([
            'resultString' => $resultString,
            'time' => $date->format("Y-m-d")
        ]));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
        return $response;
    }
}