<?php
namespace RouterTest;

use \Exception;
use RouterTest\Services\Service;
use Symfony\Component\Yaml\Yaml;

Class App {
    public static $instance;

    public function __construct() {
        $this->bootApp();
    }
    
    private function bootApp() {
        $app = [];
        $app['testServe'] = function() use($app) {
            return new Service($app);
        };

        $router = sprintf("%s/Config/router.yaml", __DIR__);
        $app['routes'] = function() use($router) {
            return Yaml::parseFile($router);
        };

        $this->app = function($key) use($app) {
            if (array_key_exists($key, $app) === false) {
                throw new Exception("$key.does.not.exist");
            }

            return call_user_func($app[$key], '');
        };
    }

    public function get(String $key) {
        return call_user_func($this->app, $key);
    }
}