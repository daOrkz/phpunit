<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Testo\Controllers\User;

use Testo\Controllers\iController as iController;
use Testo\Model\User\User as mUser;

/**
 * Description of User
 *
 * @author fillipp
 */
class User implements iController
{
    public function __construct(mUser $user)
    {
        $this->user = $user;
    }

    public function checkAge(): bool
    {
        if ($this->user->age < 18){
            return false;
        }
        
        return true;
    }

    public function check()
    {
        if (!$this->checkAge()) {
            return $this->user->getInfo() . ' < 18';
        } else {
            return 'Ok!';
        }
        
    }

}
