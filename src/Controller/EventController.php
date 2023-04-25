<?php

namespace App\Controller;

use App\Model\EventManager;

class EventController extends AbstractController
{
    public function index(): string
    {
        $eventManager = new EventManager();
        return $this->twig->render('Home/index.html.twig',
        ['events' => $eventManager->selectAll()]);
    }
}
