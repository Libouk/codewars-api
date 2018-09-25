<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/camelcase")
 */
class CamelCaseController extends Controller
{
    function CamelCase(string $strToCamelCase): string {
        $arrCCedString = [];
        $arrExplodedString = explode(' ', $strToCamelCase);
        foreach($arrExplodedString as $wrdToCamelCase) {
            array_push($arrCCedString, ucfirst(strtolower($wrdToCamelCase)));
        }
        $ccedStr = implode('', $arrCCedString);
        return $ccedStr;
    }

    public function show(string $strToCamelCase): Response
    {
        $response = new Response();
        $date = new \DateTime();
        $camelcase = self::CamelCase($strToCamelCase);
        $response->setContent(json_encode([
            'ccedString' => $camelcase,
            'time' => $date->format('Y-m-d')
        ]));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
        return $response;
    }
}