<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Form\ReservaType;
use App\Repository\ReservaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reservas')]
final class ReservaController extends AbstractController
{
    #[Route(name: 'app_reserva_index', methods: ['GET'])]
    public function index(ReservaRepository $reservaRepository): Response
    {
        return $this->render('reserva/index.html.twig', [
            'reservas' => $reservaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reserva_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reserva = new Reserva();
        $form = $this->createForm(ReservaType::class, $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Asignamos el usuario autenticado a la reserva, no lo pedimos en el formulario
            $reserva->setUser($this->getUser());
            $entityManager->persist($reserva);
            $entityManager->flush();

            //obtenemos el id de la nueva reserva
            $id = $reserva->getId();
            //Redirigimos a la página de detalle de la reserva
            return $this->redirectToRoute('app_reserva_show', ['id'=>$id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reserva/new.html.twig', [
            'reserva' => $reserva,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reserva_show', methods: ['GET'])]
    public function show(Reserva $reserva): Response
    {
        return $this->render('reserva/show.html.twig', [
            'reserva' => $reserva,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reserva_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reserva $reserva, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservaType::class, $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reserva_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reserva/edit.html.twig', [
            'reserva' => $reserva,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reserva_delete', methods: ['POST'])]
    public function delete(Request $request, Reserva $reserva, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reserva->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reserva);
            $entityManager->flush();
        }
        //redirigimos a la ruta raiz
        return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
    }
}
