<?php

namespace App\Controller;

class SkillsController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Skills/skills.html.twig');
    }
}
