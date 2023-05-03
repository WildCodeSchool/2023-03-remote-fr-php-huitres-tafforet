<?php

namespace App\Controller;

use App\Model\EventManager;

class AdminEventController extends AbstractController
{
    public function index(): string
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();

        return $this->twig->render('Admin/Event/index.html.twig', [
            'events' => $events,
        ]);
    }
    // private function validate(array $event)
    // {

    //     if (!empty($event['text']) && strlen($event['text']) < 10) {
    //         $errors[] = 'The title should be less than 255 characters';
    //     }

    //     return $errors ?? [];
    // }

    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $event = array_map('trim', $_POST);

            $errors = [];

            // TODO validations (length, format...)
            if (strlen($event['text']) < 10) {
                $errors[] = 'Un événement a besoin de plus de 10 caractères.';
            }

            if (empty($event['text'])) {
                $errors[] = 'Le champ texte est vide.';
            }

            if (!empty($errors)) {
                return $this->twig->render('Admin/Event/add.html.twig', [
                    'errors' => $errors]);
            }

            // if validation is ok, insert and redirection
            if (empty($errors)) {
                $eventManager = new EventManager();
                $event = $eventManager->insert($event);

                header('Location:/event/index');
                return null;
            }
        }

        return $this->twig->render('Admin/Event/add.html.twig');
    }

    public function edit(int $id): ?string
    {
        $eventManager = new EventManager();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $event = array_map('trim', $_POST);

            $errors = [];
            // TODO validations (length, format...)
            if (strlen($event['text']) < 10) {
                $errors[] = 'Un événement a besoin de plus de 10 caractères.';
            }

            if (empty($event['text'])) {
                $errors[] = 'Le champ texte est vide.';
            }

            if (!empty($errors)) {
                return $this->twig->render('Admin/event/edit.html.twig', [
                    'errors' => $errors, 'event' => $event]);
            }

            // if validation is ok, update and redirection
            if (empty($errors)) {
                $eventManager->update($event);
                header('Location: /event/index');

                // we are redirecting so we don't want any content rendered
                return null;
            }
        }

        return $this->twig->render('Admin/event/edit.html.twig', [
            'event' => $eventManager->selectOneById($id)
        ]);
    }

    public function delete(int $id): void
    {

        $eventManager = new EventManager();
        $eventManager->delete((int)$id);

        header('Location:/event/index');
    }
}
