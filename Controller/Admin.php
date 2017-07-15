<?php

namespace oreadblog\Controller;

class Admin extends Blog
{

    public function login()
    {
        if ($this->isLogged())
            header('Location: ' . ROOT_URL . '?p=blog&a=all');

        if (isset($_POST['email'], $_POST['password']))
        {
            $this->oUtil->getModel('Admin');
            $this->oModel = new \oreadblog\Model\Admin;

            if ($this->oModel->login($_POST['email'], $_POST['password']))
            {
                $_SESSION['is_logged'] = 1; // Admin is logged now
                header('Location: ' . ROOT_URL . '?p=blog&a=all');
                exit;
            }
            else
                $this->oUtil->sErrMsg = 'Incorrect Login!';
        }

        $this->oUtil->getView('login');
    }

    public function logout()
    {
        if (!$this->isLogged()) exit;

        // If there is a session, destroy it to disconnect the admin
        if (!empty($_SESSION))
        {
            $_SESSION = array();
            session_unset();
            session_destroy();
        }

        // Redirect to the homepage
        header('Location: ' . ROOT_URL);
        exit;
    }

}
