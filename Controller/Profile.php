<?php

namespace oreadblog\Controller;

class Profile extends Blog
{

    public function index()
    {
        if(isset($_SESSION['id']))
        $this->oUtil->oPosts = $this->oModel->getUsersPost($_SESSION['id']);
        $this->oUtil->oProfileData = $this->oModel->getUserProfileData($_SESSION['id']);
         foreach ($this->oUtil->oPosts as $key => $value) {
           
            $value->post_elapsed_time = $this->get_timeago(strtotime($value->post_date));
        }
        $this->oUtil->getView('profile');

    }
}
