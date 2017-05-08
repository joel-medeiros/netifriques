<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \Illuminate\Support\Facades\Artisan;

class PeopleTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
        Artisan::call('db:seed');
    }


    public function testCreate()
    {
        $headers = $this->getAuth();
        $name = 'Jozeca Pagodinho';
        $see = ['name' => $name];
        $endPoint = $this->getApiVersion() . 'add';

        $this->post($endPoint, ['name' => $name , 'email' => 'jozecapagodinho@pagodinho.com.br'], $headers);
        $this->seeStatusCode(200);
        $this->seeJson($see);
        $this->seeInDatabase('people', $see);
    }

    public function testUpdate()
    {
        $person = factory(\App\People::class)->create();
        $headers = $this->getAuth();

        $name = 'Jozeca Pagodinho';
        $see = ['name' => $name];
        $endPoint = $this->getApiVersion() . 'update/' . $person->id;

        $this->put($endPoint, ['name'  => $name, 'email' => 'jozecapagodinho@pagodinho.com.br'], $headers);

        $this->seeStatusCode(200);
        $this->seeJson();
        $this->seeInDatabase('people', $see);
    }

    public function testDelete()
    {
        $person = factory(\App\People::class)->create();
        $headers = $this->getAuth();
        $endPoint = $this->getApiVersion() . 'delete/' . $person->id;

        $this->delete($endPoint, [], $headers);

        $this->seeStatusCode(200);
        $this->seeJson();
    }


    public function testShow()
    {
        $person = factory(\App\People::class)->create();

        $headers = $this->getAuth();

        $endPoint = $this->getApiVersion() . $person->id;
        $this->get($endPoint, $headers);

        $this->seeStatusCode(200);
        $this->seeJson(['id' => $person->id]);
    }

    public function testList()
    {
        $headers = $this->getAuth();
        $endPoint = $this->getApiVersion();

        $this->get($endPoint, $headers);
        $this->seeStatusCode(200);
    }

    private function getApiVersion($v = 'v1')
    {
        return "/api/{$v}/";
    }
}
