<?php

namespace App\Controller;

use App\Model\TestimonialManager;

class AdminTestimonialController extends AbstractController
{
    public function index(): string
    {
        $testimonialManager = new TestimonialManager();
        $testimonials = $testimonialManager->selectAll();

        return $this->twig->render('Admin/testimonial/index.html.twig', [
            'testimonials' => $testimonials,
        ]);
    }

    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $testimonial = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $testimonialManager = new TestimonialManager();
            $testimonial = $testimonialManager->insert($testimonial);

            header('Location:/testimonial/index');
            return null;
        }

        return $this->twig->render('Admin/testimonial/add.html.twig');
    }

    public function edit(int $id): ?string
    {
        $testimonialManager = new TestimonialManager();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $event = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $testimonialManager->update($event);

            header('Location: /testimonial/index');

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render('Admin/testimonial/edit.html.twig', [
            'testimonial' => $testimonialManager->selectOneById($id)
        ]);
    }

    public function delete(int $id): void
    {

        $eventManager = new TestimonialManager();
        $eventManager->delete((int)$id);

        header('Location:/testimonial/index');
    }
}
