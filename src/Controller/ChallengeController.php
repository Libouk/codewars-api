<?php

namespace App\Controller;

use App\Entity\Challenge;
use App\Form\ChallengeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/challenge")
 */
class ChallengeController extends Controller
{
    /**
     * @Route("/", name="challenge_index", methods="GET")
     */
    public function index(): Response
    {
        $challenges = $this->getDoctrine()
            ->getRepository(Challenge::class)
            ->findAll();

        return $this->render('challenge/index.html.twig', ['challenges' => $challenges]);
    }

    /**
     * @Route("/new", name="challenge_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $challenge = new Challenge();
        $form = $this->createForm(ChallengeType::class, $challenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($challenge);
            $em->flush();

            return $this->redirectToRoute('challenge_index');
        }

        return $this->render('challenge/new.html.twig', [
            'challenge' => $challenge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="challenge_show", methods="GET")
     */
    public function show(Challenge $challenge): Response
    {
        $response = new Response();
        $date = new \DateTime();
        $response->setContent(json_encode([
            'challenge' => $challenge,
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

    /**
     * @Route("/{id}/edit", name="challenge_edit", methods="GET|POST")
     */
    public function edit(Request $request, Challenge $challenge): Response
    {
        $form = $this->createForm(ChallengeType::class, $challenge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('challenge_edit', ['id' => $challenge->getId()]);
        }

        return $this->render('challenge/edit.html.twig', [
            'challenge' => $challenge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="challenge_delete", methods="DELETE")
     */
    public function delete(Request $request, Challenge $challenge): Response
    {
        if ($this->isCsrfTokenValid('delete'.$challenge->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($challenge);
            $em->flush();
        }

        return $this->redirectToRoute('challenge_index');
    }
}
