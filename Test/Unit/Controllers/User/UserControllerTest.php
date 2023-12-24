<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
/**
 * Description of UserTest
 *
 * @author fillipp
 */
/**
 * @covers Testo\Controllers\User\User::checkAge
 * @covers Testo\Controllers\User\User::check
 * @covers Testo\Controllers\User\User::__construct
 * 
 * @covers Testo\Model\User\User::__construct
 * @covers Testo\Model\User\User::getInfo
 * @group UserController
 */
class UserControllerTest extends \PHPUnit\Framework\TestCase
{
    private $user;

    protected function setUp(): void
    {
        
    }

    public function testCheckAgeMore18()
    {
        $user = new Testo\Model\User\User('Tom', 20);
        $this->user = new Testo\Controllers\User\User($user);
        $this->assertTrue($this->user->checkAge());
    }

    public function testCheckAgeLower18()
    {
        $user = new Testo\Model\User\User('Tom', 10);
        $this->user = new Testo\Controllers\User\User($user);
        $this->assertFalse($this->user->checkAge());
    }

    public function testCheckLower18()
    {
        $userModel = new Testo\Model\User\User('Tom', 10);
        $userController = new Testo\Controllers\User\User($userModel);
        $this->assertSame('name: Tom; age: 10 < 18', $userController->check());
    }

    public function testCheckMore18()
    {
        $userModel = new Testo\Model\User\User('Tom', 20);
        $userController = new Testo\Controllers\User\User($userModel);
        $this->assertSame('Ok!', $userController->check());
    }
    
    /**
     * 
     * @dataProvider lower18
     * 
     */
    public function testCheckAgeFalse($age)
    {
        $user = new Testo\Model\User\User('Tom', $age);
        $this->user = new Testo\Controllers\User\User($user);
        $this->assertFalse($this->user->checkAge());
    }

    public function lower18()
    {
        return [
          '5' => [5],
          '10' => [10],
          '17' => [17],
        ];
    }
    
    /**
     * 
     * @dataProvider more18
     * 
     */
    public function testCheckAgeTrue($age)
    {
        $user = new Testo\Model\User\User('Tom', $age);
        $this->user = new Testo\Controllers\User\User($user);
        $this->assertTrue($this->user->checkAge());
    }

    public function more18()
    {
        return [
          [18],
          [100],
          [190],
        ];
    }
    
    /**
     * 
     * @dataProvider arrayAge
     * 
     */
    public function testCheckAgeArray($age, $res)
    {
        $user = new Testo\Model\User\User('Tom', $age);
        $this->user = new Testo\Controllers\User\User($user);
        $this->assertEquals($res, $this->user->checkAge());
    }

    public function arrayAge()
    {
        return [
          [10, false],
          [100, true],
          [190, true],
          [18, true],
        ];
    }
}
