<?php

namespace oreadblog\Model;

class Blog
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \oreadblog\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM oread_posts ORDER BY post_modified DESC LIMIT :offset, :limit');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllUsersPost($userId)
    {

        $sql = "SELECT user.display_name as user_name, user.user_login as user_login, cat_terms.name as cat_name, cat_terms.term_id as cat_id, posts.*, 
        (select distinct 1 from oread_user_likes where user_id = $userId and post_id = posts.id) as likedPost,
        (select distinct 1 from oread_comments where user_id = $userId and comment_post_id = posts.ID) as postCommented
        FROM oread_posts AS posts 
        INNER JOIN oread_terms AS cat_terms ON posts.category_id = cat_terms.term_id 

        INNER JOIN oread_users as user on posts.post_author = user.id 

        WHERE posts.post_author = $userId or posts.category_id in (SELECT category_id from oread_user_likes WHERE user_id = $userId)
        ORDER BY posts.post_date desc ";

        $oStmt = $this->oDb->query($sql);
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
    public function getUsersPost($userId)
    {
        $sql = "SELECT user.display_name as user_name,  user.user_login as user_login, cat_terms.name as cat_name, cat_terms.term_id as cat_id, posts.*,
        (select distinct 1 from oread_user_likes where user_id = $userId and post_id = posts.id) as likedPost,

        (select distinct 1 from oread_comments where user_id = $userId and comment_post_id = posts.ID) as postCommented FROM oread_posts AS posts INNER JOIN oread_terms AS cat_terms ON posts.category_id = cat_terms.term_id INNER JOIN oread_users as user on posts.post_author = user.id WHERE posts.post_author = $userId ORDER BY posts.post_date desc ";

        $oStmt = $this->oDb->query($sql);
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function getAll()
    {

        $sql = "SELECT user.display_name as user_name,  user.user_login as user_login, cat_terms.name as cat_name,  cat_terms.term_id as cat_id, posts.* FROM oread_posts AS posts INNER JOIN oread_terms AS cat_terms ON posts.category_id = cat_terms.term_id  INNER JOIN oread_users as user on posts.post_author = user.id WHERE  posts.id in(SELECT substring_index(GROUP_CONCAT(id order by comment_count desc),',',1) FROM oread_posts WHERE post_status = 'publish' group BY category_id)";
        $oStmt = $this->oDb->query($sql);
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO oread_posts (post_author, post_title, post_name, post_content,post_status,category_id,post_type,guide,image_url) VALUES(:post_author, :post_title, :post_name, :post_content, :post_status, :category_id,:post_type,:guide,:image_url)');
       //mysqli_real_escape_string($this->oDb, $aData['post_content']);
        $oStmt->execute($aData);

        return $this->oDb->lastInsertId();

    }

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM oread_posts WHERE id = :postId LIMIT 1');
        $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
    public function getByTitle($userId, $title)
    {
        if($userId){
         $sql = "SELECT user.display_name as user_name,  user.user_login as user_login, cat_terms.name as cat_name, cat_terms.term_id as cat_id, posts.*,
        (select distinct 1 from oread_user_likes where user_id = $userId and post_id = posts.id) as likedPost,
        (select distinct 1 from oread_comments where user_id = $userId and comment_post_id = posts.ID) as postCommented FROM oread_posts as posts INNER JOIN oread_terms AS cat_terms ON posts.category_id = cat_terms.term_id INNER JOIN oread_users as user on posts.post_author = user.id WHERE posts.post_name = :title LIMIT 1";
        }else{
             $sql = "SELECT user.display_name as user_name,  user.user_login as user_login, cat_terms.name as cat_name, posts.* FROM oread_posts as posts INNER JOIN oread_terms AS cat_terms ON posts.category_id = cat_terms.term_id INNER JOIN oread_users as user on posts.post_author = user.id WHERE posts.post_name = :title LIMIT 1";
        }
       
        $oStmt = $this->oDb->prepare($sql);
        $oStmt->bindParam(':title', $title);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function addUserLikedPost($userId, $postId){
     $sql = "INSERT INTO oread_user_likes (user_id, post_id) VALUES (:user_id, :post_id)";
     $oStmt = $this->oDb->prepare($sql);
     $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':post_id', $postId, \PDO::PARAM_INT);
     $oStmt->execute($cData);  
 }
 public function removeUserLikedPost($userId, $postId){
     $sql = "DELETE FROM oread_user_likes WHERE user_id = :user_id and post_id = :post_id LIMIT 1";
     $oStmt = $this->oDb->prepare($sql);     
     $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':post_id', $postId, \PDO::PARAM_INT);
     return $oStmt->execute();
 }
  public function addUserLikedCategory($userId, $catId){
     $sql = "INSERT INTO oread_user_likes (user_id, category_id) VALUES (:user_id, :category_id)";
     $oStmt = $this->oDb->prepare($sql);
     $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':category_id', $catId, \PDO::PARAM_INT);
     $oStmt->execute($cData);  
 }
  public function removeUserLikedCategory($userId, $catId){
     $sql = "DELETE FROM oread_user_likes WHERE user_id = :user_id and category_id = :category_id LIMIT 1";
     $oStmt = $this->oDb->prepare($sql);     
     $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':category_id', $catId, \PDO::PARAM_INT);
     return $oStmt->execute();
 }
 public function add_comment(array $cData)
 {

     $oStmt = $this->oDb->prepare('INSERT INTO oread_comments (comment_post_ID, comment_content,comment_parent, user_id) VALUES(:comment_post_ID, :comment_content, :comment_parent, :user_id)');
     $oStmt->execute($cData);        
     return $this->oDb->lastInsertId();
 }

 public function getPostComments($id)
 {
    $oStmt = $this->oDb->prepare('SELECT user.display_name as user_name,  user.user_login as user_login, comment.* FROM oread_comments comment INNER JOIN oread_users as user on comment.user_id = user.id WHERE comment_post_ID = :post_id  ORDER BY comment_date ASC ');
    $oStmt->bindParam(':post_id', $id, \PDO::PARAM_INT);
    $oStmt->execute();
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
}

public function update(array $aData)
{
    $oStmt = $this->oDb->prepare('UPDATE oread_posts SET post_title = :title, post_content = :body, post_status = :post_status ,  post_modified = now() WHERE id = :postId LIMIT 1');
    $oStmt->bindValue(':postId', $aData['ID'], \PDO::PARAM_INT);
    $oStmt->bindValue(':title', $aData['post_title']);
    $oStmt->bindValue(':body', $aData['post_content']);
    $oStmt->bindValue(':post_status', $aData['post_status']);
    return $oStmt->execute();
}

public function delete($iId)
{
    $oStmt = $this->oDb->prepare('DELETE FROM Posts WHERE id = :postId LIMIT 1');
    $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
    return $oStmt->execute();
}


public function getAllCategories(){
 $sql = "SELECT * FROM oread_terms  ORDER BY name desc ";

 $oStmt = $this->oDb->query($sql);
 return $oStmt->fetchAll(\PDO::FETCH_OBJ);
}

public function getPostsByCategory($userId, $id){
    $sql = "SELECT user.display_name as user_name,  user.user_login as user_login, cat_terms.name as cat_name, cat_terms.term_id as cat_id, posts.* ";
       if($userId) {
       $sql = $sql . " ,(select distinct 1 from oread_user_likes where user_id = $userId and post_id = posts.id) as likedPost,     (select distinct 1 from oread_comments where user_id = $userId and comment_post_id = posts.ID) as postCommented ";
    }

        $sql = $sql . "FROM oread_posts AS posts INNER JOIN oread_terms AS cat_terms ON posts.category_id = cat_terms.term_id   INNER JOIN oread_users as user on posts.post_author = user.id WHERE posts.post_status = 'publish' and posts.category_id= $id ORDER BY posts.post_date desc ";

    $oStmt = $this->oDb->query($sql);
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
}

public function getCategoryFollower($userId, $catId){
    $sql = "SELECT $catId as category_id, cat_terms.name as cat_name, count(1) as followers";
   
   if($userId) {
    $sql = $sql . " ,(select distinct 1 from `oread_user_likes` where category_id = $catId and user_id = $userId) as isFollow ";
   }
    

    $sql = $sql . " FROM `oread_user_likes` as likes INNER JOIN oread_terms AS cat_terms ON likes.category_id = cat_terms.term_id where category_id = $catId";
    $oStmt = $this->oDb->query($sql);
    return $oStmt->fetch(\PDO::FETCH_OBJ);
}

public function updatePostCommentCount($postId){
    $oStmt = $this->oDb->prepare('UPDATE oread_posts SET comment_count = (comment_count + 1) WHERE id = :postId LIMIT 1');
    $oStmt->bindParam(':postId', $postId, \PDO::PARAM_INT);
    return $oStmt->execute();
}
public function updatePostLikeCount($postId){

    $oStmt = $this->oDb->prepare('UPDATE oread_posts SET like_count = (SELECT count(1) FROM oread_user_likes where post_id=:postId) WHERE id = :postId LIMIT 1');
    $oStmt->bindParam(':postId', $postId, \PDO::PARAM_INT);
    return $oStmt->execute();
}


  public function getUserProfileData($userId)
    {
        $sql = "select user.display_name as name, user.user_login, user.id,
        (SELECT COUNT(distinct id) FROM `oread_posts` WHERE post_author = user.ID) topics,
        (SELECT COUNT(distinct post_id)  from oread_user_likes where user_id = user.ID) following,
        (SELECT COUNT(distinct user_id)  from oread_user_likes where post_id in (SELECT id as topics FROM `oread_posts` WHERE post_author = user.ID)) followers from oread_users as user where ID =   $userId LIMIT 1";
    $oStmt = $this->oDb->query($sql);
    return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

 public function getFollowings($userId)
    {
        $sql = "select user.display_name as name, user.user_login, user.id from oread_users user where id in (select follow_id from oread_follow where user_id  =   $userId)";
    $oStmt = $this->oDb->query($sql);
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getFollows($userId)
    {
        $sql = "select user.display_name as name, user.user_login, user.id from oread_users user where id in (select user_id from oread_follow where follow_id = $userId)";
        $oStmt = $this->oDb->query($sql);
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getUserProfileDataByUserName($userName)
    {
        $sql = "select user.display_name as name, user.user_login, user.id,
        (SELECT COUNT(distinct id) FROM `oread_posts` WHERE post_author = user.ID) topics,
        (SELECT COUNT(distinct post_id)  from oread_user_likes where user_id = user.ID) following,
        (SELECT COUNT(distinct user_id)  from oread_user_likes where post_id in (SELECT id as topics FROM `oread_posts` WHERE post_author = user.ID)) followers from oread_users as user where user.user_login =   '$userName' LIMIT 1";
    $oStmt = $this->oDb->query($sql);
    return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function setFollow($userId, $follow_user_id)
    {
        $sql = "INSERT INTO oread_follow (user_id, follow_id) VALUES (:user_id, :follow_id)";
     $oStmt = $this->oDb->prepare($sql);
     $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':follow_id', $follow_user_id, \PDO::PARAM_INT);
     $oStmt->execute(); 
    }

    public function isFollow($userId, $follow_user_id)
    {     
     $oStmt = $this->oDb->prepare('SELECT 1 FROM oread_follow WHERE user_id = :user_id and follow_id = :follow_id LIMIT 1');
        $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':follow_id', $follow_user_id, \PDO::PARAM_INT);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);      
        return $oRow?1:0;
    }

     public function removeFollow($userId, $follow_user_id){
     $sql = "DELETE FROM oread_follow WHERE user_id = :user_id and follow_id = :follow_id LIMIT 1";
     $oStmt = $this->oDb->prepare($sql);     
     $oStmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
     $oStmt->bindParam(':follow_id', $follow_user_id, \PDO::PARAM_INT);
     return $oStmt->execute();
 }
}
