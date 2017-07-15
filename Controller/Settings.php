<?php

namespace oreadblog\Controller;

class Home extends Blog
{

     // Homepage
    public function index()
    {
        if(isset($_SESSION['id']))
        $this->oUtil->oPosts = $this->oModel->getAllUsersPost($_SESSION['id']);
        
        $this->oUtil->getView('user_post');

    }
}