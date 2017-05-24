<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

        $this->visit('cadastrar')
         ->type('Someone User', 'name')
         ->type('someoneuser@example.com', 'email')
         ->type('123456', 'password')
         ->type('123456', 'password_confirmation')
         ->press('Cadastrar')
         ->seePageIs('/home');
    }
}
