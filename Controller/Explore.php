<?php

namespace oreadblog\Controller;

class Explore extends Blog
{

    public function index()
    {
        if(isset($_SESSION['id']))
        $this->oUtil->categories = $this->oModel->getAllCategories();
       
        $this->oUtil->getView('explore');

    }
}