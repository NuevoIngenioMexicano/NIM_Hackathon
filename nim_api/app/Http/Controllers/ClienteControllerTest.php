<?php
namespace Tests\App\Http\Controllers;
use TestCase;

class ClienteControllerTest extends TestCase {
    
    /** @test **/
    public function index_status_code_should_be_200(){ 
        $this->visit('/books')->seeStatusCode(200);
    }
}