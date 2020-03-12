<?php
namespace RouterTest\Services;

use \Exception;

Class Service {
    public function __construct(){}
    
    public function testGet(Array $payload) {
        var_dump($payload);
        return ["data" => "Hello Welcome Test Get"];
    }

    public function testPost(Array $payload) {
        return ["data" => "Hello Welcome Test post", "payload" => $payload];
    }

    public function testPut(Array $payload) {
        return ["data" => "Hello Welcome Test put", "payload" => $payload];
    }

    public function middleWareOne(Array $args) {
        return ['data' => "this is a middle ware"];
    }

    public function middleWareTwo(Array $args) {
        return ['data' => "this is a middle ware"];
    }
}