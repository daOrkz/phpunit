<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */


use Testo\Model\User\User as User;


 /**
* @covers Testo\Model\User\User
* @covers Testo\Model\aUser
* @covers Testo\Controllers\User\User::__construct
* @group UserModel
*/
class UserTest extends \PHPUnit\Framework\TestCase
{
    
    private $user;
    
    protected function setUp(): void
    {
        $this->user = new User('Tom', 20);
    }
    
   
    public function testGetAge(): void
    {
        $this->assertEquals(20, $this->user->getAge());
    }
    
  
    public function testGetName(): void
    {
        $this->assertEquals('Tom', $this->user->getName());
    }
    
    public function testGetInfo()
    {
//        $this->assertSame('name: Tom; age: 20' ,$this->user->getInfo());
        $this->assertIsString($this->user->getInfo());
    }
    
    public function testGetOne()
    {
        $this->assertEquals(1, $this->user->getOne());
    }
    
    public function testMock()
    {
        $mock = $this->createMock(User::class);
        
        $mock->expects($this->once())
             ->method('getOne')
             ->will($this->returnValue(1))
            ;
        
        $this->assertEquals(1, $mock->getOne());
    }
    
    public function testMockBuilder()
    {
        $mock = $this->getMockBuilder(User::class)
                     ->setConstructorArgs(['Tom', 20])
                     ->getMock();
        
        $user = $this->createMock(User::class, array('Lisa', 90));
        
        $user->expects($this->any())->method('getName')->willReturn('Lisa'); 
        
        
        $this->assertSame('Lisa', $user->getName());
    }
    
    
    protected function tearDown(): void
    {
        
    }
}
