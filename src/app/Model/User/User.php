<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Testo\Model\User;

use Testo\Model\aUser as aUser;

/**
 * Description of User
 *
 * @author fillipp
 */
class User extends aUser
{
       
    public function getInfo(): string
    {
        return "name: {$this->name}; age: {$this->age}";
    }

    public function getOne()
    {
        return 1;
    }
}
