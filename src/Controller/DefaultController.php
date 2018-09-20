<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController 
{
    public function home()
    {
        $homePageMessage = 'Home page';

        return new Response(
            '<html><body>'.$homePageMessage.'</body></html>'
        );
    }
}