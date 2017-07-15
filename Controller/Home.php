<?php

namespace oreadblog\Controller;

class Home extends Blog
{

     // Homepage
    public function index()
    {
        if(isset($_SESSION['id']))
        $this->oUtil->oPosts = $this->oModel->getAllUsersPost($_SESSION['id']);
         foreach ($this->oUtil->oPosts as $key => $value) {
           
            $value->post_elapsed_time = $this->get_timeago(strtotime($value->post_date));
        }
        // $this->oUtil->oLikes = $this->oModel->getAllUserLikes($_SESSION['id']);
       // print_r($this->oUtil->oLikes);
        $this->oUtil->getView('home');

    }
}