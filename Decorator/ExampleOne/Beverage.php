<?php
/**
 * Created by PhpStorm.
 * User: Khalafouy
 * Date: 2017-11-11
 * Time: 6:23 PM
 */

/*
 * The Problem Here if Price Changed
 * new added condiments
 * new Beverage added - if they don't use some beverage like tea / juice
 * We need to apply open/close principle - open for extension but closed for modification
 *
 */

interface IBeverage
{
    public function cost();

}


class Beverage implements IBeverage
{
    private $cost = 0;
    private $description;
    private $hasMilk;
    private $hasSoy;
    private $mocha;
    private $whip;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getHasMilk()
    {
        return $this->hasMilk;
    }

    /**
     * @param mixed $hasMilk
     */
    public function setHasMilk($hasMilk)
    {
        $this->hasMilk = $hasMilk;
    }

    /**
     * @return mixed
     */
    public function getHasSoy()
    {
        return $this->hasSoy;
    }

    /**
     * @param mixed $hasSoy
     */
    public function setHasSoy($hasSoy)
    {
        $this->hasSoy = $hasSoy;
    }

    /**
     * @return mixed
     */
    public function getMocha()
    {
        return $this->mocha;
    }

    /**
     * @param mixed $mocha
     */
    public function setMocha($mocha)
    {
        $this->mocha = $mocha;
    }

    /**
     * @return mixed
     */
    public function getWhip()
    {
        return $this->whip;
    }

    /**
     * @param mixed $whip
     */
    public function setWhip($whip)
    {
        $this->whip = $whip;
    }



    public function cost()
    {

    }
}


class DarkCoffee extends Beverage
{

    /**
     * DarkCoffee constructor.
     */
    public function __construct()
    {
        $this->setDescription("Dark Coffee");
    }

    public function cost()
    {
        return '5 EGP';
    }
}


class FrenchCoffee extends Beverage
{

    /**
     * DarkCoffee constructor.
     */
    public function __construct()
    {
        $this->setDescription("Milk Coffee");
    }

    public function cost()
    {
        return '10 EGP';
    }
}


class EspressoCoffee extends Beverage
{

    /**
     * DarkCoffee constructor.
     */
    public function __construct()
    {
        $this->setDescription("Espresso Coffee");
    }

    public function cost()
    {
        return '24 EGP';
    }
}




$frenchCoffee = new FrenchCoffee();
echo $frenchCoffee->cost();

$darkCoffee = new DarkCoffee();
echo $darkCoffee->cost();