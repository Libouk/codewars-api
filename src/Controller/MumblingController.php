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

        // $resultStr = self::accum($characters);

        $response->setContent(json_encode([
            'resultString' => self::accum($characters),
            'time' => $date->format("Y-m-d")
        ]));

        $response->headers->set('Content-Type', 'application/json');
        // Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
        // Or a predefined website
        //$response->headers->set('Access-Control-Allow-Origin', 'https://jsfiddle.net/');
        // You can set the allowed methods too, if you want    //$response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, PATCH, OPTIONS');    
        return $response;
    }
}