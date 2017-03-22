<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package jokes
 */
use odannyc\router\Router;

require_once 'vendor/autoload.php';

// Load the routes
Router::loadRoutes();

// Handle this current request
Router::handle($_SERVER['REQUEST_URI']);
