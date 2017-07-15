<?php

namespace oreadblog\Controller;

class Blog
{

    protected $oUtil, $oModel;
    private $_iId;



    public function __construct()
    {


        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();

        $this->oUtil = new \oreadblog\Engine\Util;

        /** Get the Model class in all the controller class **/
        $this->oUtil->getModel('Blog');
        $this->oModel = new \oreadblog\Model\Blog;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
        $this->_iTitle = !empty($_GET['title']) ? $_GET['title'] : '';

    }


    /***** Front end *****/




    // Homepage
    public function index()
    {
       if (empty($_SESSION))
       {
        $this->oUtil->oPosts = $this->oModel->getAll();
        
        foreach ($this->oUtil->oPosts as $key => $value) {

            $value->post_elapsed_time = $this->get_timeago(strtotime($value->post_date));
        }

        $this->oUtil->getView('index');
    }else{
        header('Location: ' . ROOT_REL_PATH.'home' );
    }

}

public function post()
{

    if(isset($_POST['add_comment']))
    {

     $cData = array('comment_post_ID' => $_POST['postId'], 'comment_content' =>$_POST['comment'], 'user_id' => $_SESSION['id']);

     $id = $this->oModel->add_comment($cData);

     $this->oModel->updatePostCommentCount($_POST['postId']); 
     $this->oUtil->oId = $id;
     return $id;

 }else{

    $userId = null;
    if(isset($_SESSION['id'])){
        $userId = $_SESSION['id'];
    }
            $this->oUtil->oPost = $this->oModel->getByTitle($userId,$this->_iTitle); // Get the data of the post
            $this->oUtil->oPost->post_elapsed_time = $this->get_timeago(strtotime($this->oUtil->oPost->post_date));
        $this->oUtil->oComments = $this->oModel->getPostComments($this->oUtil->oPost->ID); // Get the 

        foreach ($this->oUtil->oComments as $key => $value) {

            $value->comment_elapsed_time = $this->get_timeago(strtotime($value->comment_date));
        }

        $this->oUtil->getView('post'); 
    }
}

public function like(){
    if($_POST['text'] == 'like'){
       $this->oModel->addUserLikedPost($_SESSION['id'], $_POST['id']);
        $this->oModel->updatePostLikeCount($_POST['id']);
   }else  if($_POST['text'] == 'unlike'){
       $this->oModel->removeUserLikedPost($_SESSION['id'], $_POST['id']);
        $this->oModel->updatePostLikeCount($_POST['id']);
   }
   else  if($_POST['text'] == 'follow'){
       $this->oModel->addUserLikedCategory($_SESSION['id'], $_POST['id']);      
   }  else  if($_POST['text'] == 'unfollow'){
       $this->oModel->removeUserLikedCategory($_SESSION['id'], $_POST['id']);     
   }
  
}

public function notFound()
{
    $this->oUtil->getView('not_found');
}


/***** For Admin (Back end) *****/
public function all()
{
    if (!$this->isLogged()) exit;

    $this->oUtil->oPosts = $this->oModel->getAll();

    $this->oUtil->getView('index');
}


public function add()
{
    if (!$this->isLogged()) exit;

    if (!empty($_POST['add_submit'])) 
    {
            if (isset($_POST['category'], $_POST['title'], $_POST['body']) && mb_strlen($_POST['title']) <= 250) // Allow a maximum of 250 characters
            {
              
               
               if (filter_var($_POST['title'], FILTER_VALIDATE_URL) === FALSE) {
      $post_name = $this->create_permalink($_POST['title']);
        $aData = array('post_author' => $_SESSION['id'], 'post_title' => $_POST['title'], 'post_name' => $post_name, 'post_content' => $_POST['body'], 'post_status' => $_POST['post_status'],'category_id' => $_POST['category'],'post_type' => 'post', 'guide' => '', 'image_url' => '');
          $post_id = $this->oModel->add($aData);
           header('Location: ' . ROOT_URL );
                

    }else{
     $graph = OpenGraph::fetch($_POST['title']);
     /*$aData = array('post_author' => $_SESSION['id'], 'post_title' => $graph->title .'', 'post_name' => $_POST['title'], 'post_content' => $graph->description .'', 'post_status' => $_POST['post_status'],'category_id' => $_POST['category'],'post_type' => 'link', 'guide' => $graph->image .'');*/
     $aData = array('post_author' => $_SESSION['id'], 'post_title' => $graph->title .'', 'post_name' => $this->create_permalink($graph->title), 'post_content' => $graph->description .'', 'post_status' => $_POST['post_status'],'category_id' => $_POST['category'],'post_type' => 'link', 'guide' => $_POST['title'], 'image_url' => $graph->image .'');
    
 $post_id = $this->oModel->add($aData);
               header('Location: ' . ROOT_URL );

    }

         }     

               
           
        }else{
            $this->oUtil->getView('add_post');
        }
        
    }

    public function edit()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['category'], $_POST['title'], $_POST['body']) && mb_strlen($_POST['title']) <= 250) // Allow a maximum of 250 characters
            {
                $aData = array('ID' => $_POST['edit_submit'], 'post_title' => $_POST['title'], 'post_content' => $_POST['body'],'post_status' => $_POST['post_status'], 'category_id' => $_POST['category']);

                $this->oModel->update($aData);

            }
            else
            {
                $this->oUtil->sErrMsg = 'All fields are required and the title cannot exceed 250 characters.';
            }
        }

        /* Get the data of the post */
        $this->oUtil->oPost = $this->oModel->getByTitle($_SESSION['id'], $this->_iTitle);
//print_r($this->oUtil->oPost);
        $this->oUtil->getView('edit_post');

    }

    public function delete()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL);
        else
            exit('Whoops! Post cannot be deleted.');
    }

    protected function isLogged()
    {
        return (!empty($_SESSION['is_logged']) && ($_SESSION['is_logged'] == 1));
    }
    public function  create_permalink($string){ 

       $replace = '-';         
       $string=strtolower($string);     
       $string=trim($string);
   //remove query string     
       if(preg_match("#^http(s)?://[a-z0-9-_.]+\.[a-z]{2,4}#i",$string)){         
         $parsed_url = parse_url($string);         
         $string = $parsed_url['host'].' '.$parsed_url['path'];         
         //if want to add scheme eg. http, https than uncomment next line         
         //$string = $parsed_url['scheme'].' '.$string;     
     }      
   //replace / and . with white space     
     $string = preg_replace("/[\/\.]/", " ", $string);     
     $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
   //remove multiple dashes or whitespaces     
     $string = preg_replace("/[\s-]+/", " ", $string);     
   //convert whitespaces and underscore to $replace     
     $string = preg_replace("/[\s_]/", $replace, $string);     
   //limit the slug size     
     $string = substr($string, 0, 100);     
   //slug is generated     
     return  $string;

 } 
 function get_timeago( $ptime )
 {
    $estimate_time = time() - $ptime;
    // print_r('****time: '. date('Y-m-d h:i:sa', time()));
     // print_r('-***ptime: '.date('Y-m-d h:i:sa', $ptime));
   // print_r('--****expression: '.$estimate_time);
    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array( 
        12 * 30 * 24 * 60 * 60  =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
        );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
}
