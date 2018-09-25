<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/buildtower")
 */
class BuildTowerController extends Controller
{
    function TowerBuilder(int $n): array 
    {
        $arr = [];
        for($i=1; $i<=$n; $i++) {
            $arr[] = str_pad(str_repeat('*', $i + ($i - 1)), $n + ($n -1), " ", STR_PAD_BOTH);
        }
        return $arr;
    }

    public function show(int $rows): Response
    {
        $response = new Response();
        $date = new \DateTime();
        $tower = self::TowerBuilder($rows);
        $response->setContent(json_encode([
            'tower' => $tower,
            'time' => $date->format('Y-m-d')
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