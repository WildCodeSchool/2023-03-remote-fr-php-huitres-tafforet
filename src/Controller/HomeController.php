<?php

namespace App\Controller;

use App\Model\EventManager;
use App\Model\TestimonialManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $eventManager = new EventManager();
        $testimonialManager = new TestimonialManager();
        return $this->twig->render('Home/index.html.twig', [
            'events' => $eventManager->selectAll(), 'testimonials' => $testimonialManager->selectAll()
        ]);

    }
}
