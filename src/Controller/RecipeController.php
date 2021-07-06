<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Entity\Step;
use App\Form\RecipeType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    /**
     * @Route("/", name="recipe")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, CategoryRepository $categoryRepository): Response
    {
        $recipe = new Recipe();
        for ($i = 0 ; $i < 4; $i++) {
            $step = new Step();
            $recipe->addStep($step);
        }

        $form = $this->createForm(RecipeType::class,$recipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categoryRecorded = $recipe->getCategory();
            $category = $categoryRepository->findOneByTitle($categoryRecorded->getTitle());
            if ($category) {
                $recipe->setCategory($category);
            }
            $entityManager->persist($recipe);
            $entityManager->flush();
        }
        return $this->render('recipe/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
