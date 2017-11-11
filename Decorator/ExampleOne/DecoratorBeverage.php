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
    private $description = 'unknown beverage';

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


    public function cost()
    {

    }

    public function getCurrency()
    {
        return 'EGP';
    }


}


class CondimentDecorator extends Beverage
{

}

class Espresso extends Beverage
{

    /**
     * Espresso constructor.
     */
    public function __construct()
    {
        $this->setDescription('Espresso');
    }

    public function cost()
    {
        return '24';
    }

}


class DarkCoffee extends Beverage
{

    /**
     * Espresso constructor.
     */
    public function __construct()
    {
        $this->setDescription('DarkCoffee');
    }

    public function cost()
    {
        return 12;
    }

}

class Milk extends CondimentDecorator
{
    private $beverage;

    /**
     * Milk constructor.
     * @param $beverage
     */
    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription()
    {
        return $this->beverage->getDescription()." + Milk";
    }

    public function cost()
    {
        return $this->beverage->cost() + 5;
    }

}

class Sugar extends CondimentDecorator
{
    private $beverage;

    /**
     * Milk constructor.
     * @param $beverage
     */
    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription()
    {
        return $this->beverage->getDescription()." + Sugar";
    }

    public function cost()
    {
        return $this->beverage->cost() + .25;
    }

}

class Whip extends CondimentDecorator
{
    private $beverage;

    /**
     * Milk constructor.
     * @param $beverage
     */
    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription()
    {
        return $this->beverage->getDescription()." + Whip";
    }

    public function cost()
    {
        return $this->beverage->cost() + 3;
    }

}

$beverage = new DarkCoffee();
$beverage = new Milk($beverage);
$beverage = new Milk($beverage);
print_r($beverage->getDescription());
print_r("</br>");
print_r($beverage->cost()." ".$beverage->getCurrency());