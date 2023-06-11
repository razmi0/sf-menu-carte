<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ItemRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu', methods: ['HEAD','GET'])]
    public function index(ItemRepository $itemRepository, CategoryRepository $categoryRepository, MenuRepository $menuRepository): Response
    {
        //MenuMidi
        //--

        //MenuSoir
        //--

        //MenuEnfant
        //--

        //Menu A la carte
        //--

        
        // dd($menus);
        $items = $itemRepository->findAll();
        $categories = $categoryRepository->findAll();
        $menus = $menuRepository->findAll();
        dump($menus);

        // Je veux acceder aux items de chaque menu
       


       

        return $this->render('menu/index.html.twig', [
            'items' => $items,
            'categories' => $categories,
            'menus' => $menus,
        ]);
    }
}
