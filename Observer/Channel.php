<?php
/**
 * Created by PhpStorm.
 * User: Khalafouy
 * Date: 2017-11-10
 * Time: 7:47 PM
 */
interface Observer
{
    public function updateMovies($movie);

}

class User implements Observer
{
    private $movies =[];

    /**
     * @return mixed
     */
    public function getMovies()
    {
        return $this->movies;
    }



    public function updateMovies($movie)
    {
        $this->movies[]=$movie;
    }

}



interface IChannel
{
    public function subscribe(Observer $observer);

    public function unSubscribe(Observer $observer);

    public function notify($movie);
}

class Channel implements IChannel
{
    private $observers;

    public function getObservers(){
        return $this->observers;
    }

    public function subscribe(Observer $observer)
    {
        $this->observers[]=$observer;
    }

    public function unSubscribe(Observer $observer)
    {
        foreach($this->observers as $observerKey => $observerValue) {
            if ($observerValue === $observer) {
                unset($this->observers[$observerKey]);
            }
        }
    }

    public function notify($movie)
    {
        foreach ($this->observers as $observer)
        {
            $observer->updateMovies($movie);
        }
    }

}

$channel = new Channel();

$userOne = new User();

$userTwo = new User();

$channel->subscribe($userOne);
$channel->subscribe($userTwo);
$channel->notify('Cast away');
$channel->notify('Terminal');
echo 'User one & two subscribe to movies channel';
echo "<br/>";
var_dump($channel->getObservers());
//var_dump($userOne->getMovies());
//var_dump($userTwo->getMovies());

echo 'User two un subscribe to movies channel';
echo "<br/>";
var_dump($channel->getObservers());
//var_dump($userOne->getMovies());
//var_dump($userTwo->getMovies());

echo 'User one & two  movies channel';
echo "<br/>";
$channel->unSubscribe($userTwo);

$channel->notify('Angels and daemons');
$channel->notify('You have got mail');
var_dump($channel->getObservers());
//var_dump($userOne->getMovies());
//var_dump($userTwo->getMovies());