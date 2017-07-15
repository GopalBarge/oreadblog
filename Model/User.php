<?php

namespace oreadblog\Model;

class User extends Blog
{

    public function addUserLikedCategories($userId, $arrCategories)
    {
        $likedCategories = $this->getUsersLikedCategories($userId);
        $count = sizeof($likedCategories);
       if($count){
        $arr =  array();
         foreach ($likedCategories as $key => $value) {
          array_push($arr, $value->category_id);
        }
       }      
       
        $sql = "INSERT INTO oread_user_likes (user_id, category_id) VALUES (:user_id, :category_id)";
        $oStmt = $this->oDb->prepare($sql);
        foreach ($arrCategories as $category){
           if($count && in_array($category, $arr)){
            }else{
               $a = array (':user_id'=>$userId,
                            ':category_id'=>$category);
                 $oStmt->execute($a);
         }
       }
       

        $oStmt = $this->oDb->prepare('UPDATE oread_users SET registration_status = 1 WHERE id = :user_id ');
    $oStmt->bindValue(':user_id', $userId, \PDO::PARAM_INT);
   
    return $oStmt->execute(); 
    }

    public function getUsersLikedCategories($userId)
    {
        $sql = "SELECT category_id from oread_user_likes WHERE user_id = $userId";

            $oStmt = $this->oDb->query($sql);
            return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function register($name ,$sEmail, $sPassword, $userName)
    {
        
        $sql = "INSERT INTO oread_users (user_login, user_pass, user_nicename, user_email, display_name) VALUES (:user_login, :user_pass, :user_nicename, :user_email, :display_name)";
	 $oStmt = $this->oDb->prepare($sql);
	 $md5Pass = md5($sPassword);
	 $oStmt->bindParam(':user_login', $userName);
	 $oStmt->bindParam(':user_pass', $md5Pass);
	 $oStmt->bindParam(':user_nicename', $name);
	 $oStmt->bindParam(':user_email', $sEmail);
	 $oStmt->bindParam(':display_name', $name);
       $oStmt->execute();
         return $this->oDb->lastInsertId();
    // return  $this->login($sEmail, $sPassword);
       
    }
  public function login($sEmail, $sPassword)
    {
        $oStmt = $this->oDb->prepare('SELECT id, user_login,  user_email, user_pass, registration_status FROM oread_users WHERE user_email = :email LIMIT 1');
        $oStmt->bindValue(':email', $sEmail, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);
		$user = "";

         if(md5($sPassword) == @$oRow->user_pass){         	
         	 $user = array('id' => @$oRow->id, 'fullname' => $oRow->user_login, 'email' => $oRow->user_email, 'registration_status' => $oRow->registration_status );
         } // Use the PHP 5.5 password function
        
        return $user;
    }

     public function isEmailRegistered($sEmail)
    {
        $oStmt = $this->oDb->prepare('SELECT 1 FROM oread_users WHERE user_email = :email LIMIT 1');
        $oStmt->bindValue(':email', $sEmail, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);       
       
       
        return $oRow?1:0;
    }

    function isUserNameExist($userName){
        $oStmt = $this->oDb->prepare('SELECT 1 FROM oread_users WHERE user_login = :user_login LIMIT 1');
        $oStmt->bindValue(':user_login', $userName, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);       
        return $oRow?1:0;
    }
}
