<?php

/**
 * Description of GameResult
 *
 * @author Joe
 */
class GameResult {
    public $timestamp;
    public $points;
    public $outcome;
    
    function __construct($time, $pts, $otcme) {
        $this->timestamp = $time;
        $this->points = $pts;
        $this->outcome = $otcme;      
    }
}
