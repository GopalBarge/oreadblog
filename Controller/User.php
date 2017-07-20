<?php

namespace oreadblog\Controller;

class User extends Blog
{

public function index()
{
 $parts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
   if(!empty($parts[3])){
    $this->username = trim($parts[3]);
  
        $this->oUtil->oProfileData = $this->oModel->getUserProfileDataByUserName($this->username);
         if($this->oUtil->oProfileData){
         $this->oUtil->oPosts = $this->oModel->getUsersPost($this->oUtil->oProfileData->id);
         foreach ($this->oUtil->oPosts as $key => $value) {
           
            $value->post_elapsed_time = $this->get_timeago(strtotime($value->post_date));
        }
        $this->oUtil->getView('profile');
    }else{
        $this->oUtil->getView('not_found');
    }
   }
   
}
public function follow_step()

{
     $this->oUtil->getModel('User');
            $this->oModel = new \oreadblog\Model\User;

  if (isset($_POST['user_cat']))
        {
            
        $selCategories = explode(',', $_POST['user_cat']);
      
            $this->oModel->addUserLikedCategories($_SESSION['id'], $selCategories);
            $_SESSION['registration_status'] = 1; 
            header('Location: ' . ROOT_REL_PATH.'home' );
        }else{
  if(!isset($_SESSION['id']) ||  (isset($_SESSION['id']) && isset($_SESSION['registration_status']) && $_SESSION['registration_status'] == 1)){
header('Location: ' . ROOT_REL_PATH);
  }
  $this->oUtil->categories = $this->oModel->getAllCategories();
  $this->oUtil->liked_categories = $this->oModel->getAllCategories();
  $this->oUtil->getView('follow-step');
}

}
   public function register()
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['password']))
        {
            $this->oUtil->getModel('User');
            $this->oModel = new \oreadblog\Model\User;

if( $this->oModel->isEmailRegistered($_POST['email']) == 0){

$this->username = $this->create_permalink($_POST['name']);
    $this->count = 1;
    while(true){
         if($this->oModel->isUserNameExist($this->username . '-'. $this->count) == 0){
            $this->username = $this->username . '-'. $this->count;
            break;
         } else{
           $this->count++;
         }       
    }

 $userId = $this->oModel->register($_POST['name'], $_POST['email'], $_POST['password'],$this->username);
        
            $this->oModel = new \oreadblog\Model\User;
            $user  = $this->oModel->login($_POST['email'], $_POST['password']);
            
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['is_logged'] = 1; // Admin is logged now
             echo json_encode(array('status' => 'success','redirect'=>  ROOT_REL_PATH .'user/follow_step'));
}else{
   echo json_encode(array('status' => 'error','message'=>  'Already registered with this email id, try login instead'));
    return;
}  
        }
      
    }

    public function login()
    {    
          
        //if ($this->isLogged())
         //   header('Location: ' . ROOT_REL_PATH .'home');

        if (isset($_POST['email'], $_POST['password']))
        {
            $this->oUtil->getModel('User');
            $this->oModel = new \oreadblog\Model\User;
            $user  = $this->oModel->login($_POST['email'], $_POST['password']);
            
            if ($user != "")
            {
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['is_logged'] = 1; 
              $_SESSION['registration_status'] = $user['registration_status']; 
               if($_SESSION['registration_status'] == 1){
                
                echo json_encode(array('status' => 'success','redirect'=> ''. ROOT_REL_PATH .'home'));
                // header('Location: ' . ROOT_REL_PATH .'home');
             }else{
                echo json_encode(array('status' => 'success','redirect'=>  ''.ROOT_REL_PATH .'user/follow_step'));
              //  header('Location: ' . ROOT_REL_PATH .'user/follow_step');
             }
               
               
            }
            else
              echo json_encode(array('status' => 'error','message'=>  'Invalid User/Password'));
        }
 //echo json_encode(array('status' => 'error','message'=>  'required User/Password'));
       // $this->oUtil->getView('login');
    }

    public function logout()
    {
        //if (!$this->isLogged()) exit;

        // If there is a session, destroy it to disconnect the admin
        if (!empty($_SESSION))
        {
            $_SESSION = array();
            session_unset();
            session_destroy();
        }

        // Redirect to the homepage
        header('Location: ' . ROOT_REL_PATH);
        exit;
    }

}
