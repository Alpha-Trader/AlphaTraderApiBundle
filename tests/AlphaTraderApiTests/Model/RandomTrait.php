<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 01:56
 */
namespace Tests\Model;

/**
 * Class RandomTrait
 * @author ljbergmann
 */
trait RandomTrait
{

    /**
     * @param int $min
     * @param int $max
     *
     * @return mixed
     */
    protected function getRandomFloat($min = 1, $max = 50000000)
    {
        return mt_rand($min, $max) + (rand() / mt_getrandmax());
    }

    /**
     * @param int $min
     * @param int $max
     *
     * @return mixed
     */
    protected function getRandomInteger($min = 1, $max = 50000000)
    {
        return (int)$this->getRandomFloat($min, $max);
    }

    /*
    * @param int $length
    * @return string
    */
    protected function getRandomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        return $str;
    }
}
