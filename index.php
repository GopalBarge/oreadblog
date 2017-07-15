<?php

// Note, the script requires PHP 5.5 or higher
namespace oreadblog;
use oreadblog\Engine as E;

if (version_compare(PHP_VERSION, '5.5.0', '<'))
    exit('Your PHP version is ' . PHP_VERSION . '. The script requires PHP 5.5 or higher.');
if (!extension_loaded('mbstring'))
    exit('The script requires "mbstring" PHP extension. Please install it.');


// Set constants (root server path + root URL)
define('PROT', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
define('ROOT_URL', PROT . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/'); // Remove backslashes for Windows compatibility
define('ROOT_PATH', __DIR__ . '/');
define('ROOT_REL_PATH', '/oreadblog/');
try
{


    require ROOT_PATH . 'Engine/Loader.php';
    E\Loader::getInstance()->init(); // Load necessary classes

    $request = parse_url($_SERVER['REQUEST_URI']);
    $path = $request["path"];
    $result = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME'] .'/oreadblog'), '', $path), '/');

    $parts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

    // Start the session
    session_start();
	   

    //print_r($_SESSION);   
if(empty($parts[2])){
    $_SERVER['PREV_URI'] = $_SERVER['REQUEST_URI'];
    $aParams = ['ctrl' => 'blog',
     'act' => 'index'];
}else{
    $ctrl  = $parts[2];
    
    if(isset($_SESSION['is_logged'])){

      if($_SESSION['registration_status'] == 0 ){
        
        if(empty($parts[3]) || ($parts[3] != 'follow_step')){
         header('Location: ' . ROOT_REL_PATH.'user/follow_step' );  
       }
      }
    }else{
      if($ctrl == 'home' || $ctrl == 'settings' || $ctrl == 'profile' || $ctrl == 'explore'  ){
       header('Location: ' . ROOT_REL_PATH );    
      }
      if($ctrl == 'blog' && !empty($parts[3]) && $parts[3] != 'post'){
        header('Location: ' . ROOT_REL_PATH );
      }
    }
  



    if($ctrl == 'user'){
    $aParams = ['ctrl' => (!empty($parts[2]) ? $parts[2] : 'blog'),
     'act' => (!empty($parts[3]) ? $parts[3] : 'index'),
      'link' =>  (!empty($parts[4]) ? $parts[4] : '')]; // I use the new PHP 5.4 short array syntax
    }else  if($ctrl == 'category'){
        $_SERVER['PREV_URI'] = $_SERVER['REQUEST_URI'];
        $aParams = ['ctrl' => 'category',  'act' => 'index']; // I use the new PHP 5.4 short array syntax
     // $_GET['title'] = (!empty($parts[4]) ? $parts[4] : '') ;
    } else {
       $_SERVER['PREV_URI'] = $_SERVER['REQUEST_URI'];
        $aParams = ['ctrl' => (!empty($parts[2]) ? $parts[2] : 'blog'),
     'act' => (!empty($parts[3]) ? $parts[3] : 'index'),
      'link' =>  (!empty($parts[4]) ? $parts[4] : '')]; // I use the new PHP 5.4 short array syntax
      $_GET['title'] = (!empty($parts[4]) ? $parts[4] : '') ;
    }
}

    E\Router::run($aParams);
}
catch (\Exception $oE)
{
    echo "error by: ". $oE->getMessage();
}
