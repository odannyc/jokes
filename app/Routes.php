<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package jokes
 */
use odannyc\router\Router;

// This is where we register the routes
Router::to('/')->isHandledBy('JokeHandler@index');
Router::to('/api/jokes')->isHandledBy('JokeHandler@api');