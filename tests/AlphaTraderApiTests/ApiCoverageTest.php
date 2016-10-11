<?php
/**
 * User: ljbergmann
 * Date: 11.10.16 02:34
 */

namespace Tests;

use PHPUnit\Framework\TestCase;

class ApiCoverageTest extends TestCase
{

    public function test()
    {
        $data = $this->getApiDefination();
        $controller = $this->getController($data['tags']);
        
        $coverage = $this->getMethodsPerController($data['paths']);
        $coverageComplete = ['should'=>0,'have'=>0];
        foreach ($controller as $class) {

            $methods = count(get_class_methods('Alphatrader\ApiBundle\Api\Methods\\'.$class));
            $methods = ($methods > 11) ? $methods-11 : 0;

            $coverage[$class]['have']   = $methods;
            $coverage[$class]['coverage'] = $coverage[$class]['have']/$coverage[$class]['should'];

            $coverageComplete['have']   += $methods;
            $coverageComplete['should'] += $coverage[$class]['should'];
        }
        echo "Es werden ".$coverageComplete['have']." von ".$coverageComplete['should']." ( ".(round($coverageComplete['have']/$coverageComplete['should'],4)*100)." %) API Methoden abgedeckt.\n";
        echo "Following Controller havent been implemented yet:\n";
        foreach($coverage as $key=>$cc){
            if($cc['have'] == 0) {
                echo $key,"\n";
            }
        }
    }

    private function getApiDefination()
    {
        $json = json_decode(file_get_contents("http://stable.alpha-trader.com/v2/api-docs"), true);
        return $json;
    }

    private function getController($tags)
    {
        $controller = [];
        foreach ($tags as $key => $tag) {
            $controller[] = $this->toCamelCase($tag['name']);
        }
        array_multisort($controller);

        return $controller;
    }

    private function getMethodsPerController($paths)
    {
        $methods = [];

        foreach ($paths as $path) {
            if (isset($path['get'])) {
                @$methods[$this->toCamelCase($path['get']['tags'])]['should'] += 1;
            }

            if (isset($path['post'])) {
                @$methods[$this->toCamelCase($path['post']['tags'])]['should'] += 1;
            }
            if (isset($path['put'])) {
                @$methods[$this->toCamelCase($path['put']['tags'])]['should'] += 1;
            }

            if (isset($path['delete'])) {
                @$methods[$this->toCamelCase($path['delete']['tags'])]['should'] += 1;
            }
        }

        return $methods;
    }

    private function toCamelCase($string)
    {
        $replace = preg_replace_callback(
            "/-(.)/",
            function ($m) {
                return strtoupper($m[1]);
            },
            $string
        );

        if (is_array($replace)) {
            return ucfirst($replace[0]);
        } else {
            return ucfirst($replace);
        }
    }
}
