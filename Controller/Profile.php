<?php

namespace oreadblog\Controller;

class Profile extends Blog
{

    public function index()
    {
        if(isset($_SESSION['id'])){
        
         $this->oUtil->oFollows = $this->oModel->getFollows($_SESSION['id']);
         $this->oUtil->oFollowings = $this->oModel->getFollowings($_SESSION['id']);
        $this->oUtil->oPosts = $this->oModel->getUsersPost($_SESSION['id']);
        $this->oUtil->oProfileData = $this->oModel->getUserProfileData($_SESSION['id']);
         foreach ($this->oUtil->oPosts as $key => $value) {
           
            $value->post_elapsed_time = $this->get_timeago(strtotime($value->post_date));
        }
        $this->oUtil->getView('profile');

    }
    }

    public function follow()
    {
        if(isset($_SESSION['id'])){
       $this->isFollow =  $this->oModel->isFollow($_SESSION['id'],$_POST['follow_user_id']);
       if($this->isFollow == 0){           
        $this->oModel->setFollow($_SESSION['id'], $_POST['follow_user_id']);
       }else{
         $this->unFollow();  
       }
        }
        
    }
    public function unFollow()
    {
        if(isset($_SESSION['id'])){
       $this->oModel->removeFollow($_SESSION['id'],$_POST['follow_user_id']);
        }
    }
}
