<?php

namespace oreadblog\Controller;

class Category extends Blog
{

    public function index()
    {
        if(isset($_GET['id'])){
        	
        $this->oUtil->oCatFollow = $this->oModel->getCategoryFollower(empty($_SESSION['id'])?null:$_SESSION['id'],$_GET['id']);
        
        $this->oUtil->oPosts = $this->oModel->getPostsByCategory(empty($_SESSION['id'])?null:$_SESSION['id'],$_GET['id']);
        foreach ($this->oUtil->oPosts as $key => $value) {           
            $value->post_elapsed_time = $this->get_timeago(strtotime($value->post_date));
        }       
      
        $this->oUtil->getView('category');
}
    }
}