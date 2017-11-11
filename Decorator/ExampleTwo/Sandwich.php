<?php
/**
 * Created by PhpStorm.
 * User: Khalafouy
 * Date: 2017-11-11
 * Time: 7:42 PM
 */


class Sandwich
{
    private $description = '';
    private $cost = 0;
    private $currency = 'EGP';

    /**
     * @return string
     */
    public function setDescription($description)
    {
      $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    public function getCost()
    {
        return (double)$this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
    }










}


class Batats extends Sandwich
{

    /**
     * Fool constructor.
     */
    public function __construct()
    {
        $this->setDescription('Sandwich Batats');
        $this->setCost(10);

    }




}



class DecoratorExtra extends Sandwich
{

}



class GabnaRomy extends DecoratorExtra
{

    private $sandwich;
    /**
     * Salad constructor.
     */
    public function __construct(Sandwich $sandwich)
    {
        $this->sandwich = $sandwich;
    }

    public function getCost()
    {
        return $this->sandwich->getCost() + 2;
    }

    public function getDescription()
    {
        return $this->sandwich->getDescription()." + gabna rommy";
    }
}

class Salad extends DecoratorExtra
{

    private $sandwich;
    /**
     * Salad constructor.
     */
    public function __construct(Sandwich $sandwich)
    {
        $this->sandwich = $sandwich;
    }

    public function getCost()
    {
        return $this->sandwich->getCost() + .25;
    }

    public function getDescription()
    {
        return $this->sandwich->getDescription()." + salad";
    }
}

$sandwich = new Batats();

$sandwich = new GabnaRomy($sandwich);
$sandwich = new Salad($sandwich);


var_dump($sandwich->getDescription());
var_dump($sandwich->getCost());


