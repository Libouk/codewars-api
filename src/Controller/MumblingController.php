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
        $resultStr = self::accum($characters);

        return $this->render('challenges/mumbling.html.twig', ['transformation' => $resultStr]);
    }
}