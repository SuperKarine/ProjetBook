<?php

namespace App\Controller;

use App\Repository\CategoryRepository;

class PageController extends Controller
{
    public function accueil(): void
    {

        $categoryRepository = new CategoryRepository();

        $categories =$categoryRepository->findAll();

        $this->render'"page/accueil", [
            "categories => $categories,
        ]);
    
    }
    public function apropos():void
    {
        $this->render("page/apropos");
    }

}