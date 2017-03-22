<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package jokes
 */
namespace odannyc\router;

/**
 * Class Router.
 * Acts as a factory class and singleton for all routes.
 *
 * To register a route: Router::to('/route')->isHandledBy('RouteHandler');
 */
class Router
{
    /**
     * The router instance, there can only be 1
     *
     * @var null
     */
    private static $instance = null;

    /**
     * All the registered routes by the Routes.php file
     *
     * @var array
     */
    private $routes = [];

    /**
     * Router constructor. Private!
     */
    private function __construct()
    {
        // Don't allow new Routers since only 1 can exist
    }

    /**
     * Returns the instance of the router, again.. Only 1 instance can exist
     *
     * @return null|Router
     */
    public static function instance()
    {
        if (is_null(static::$instance)) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    /**
     * This method is used to register the routes,
     * it takes in a URI and passes a Route object along
     *
     * @param $uri string
     *
     * @return Route
     */
    public static function to($uri)
    {
        $router = self::instance();

        $route = new Route($uri);
        $router->routes[] = $route;

        return $route;
    }

    /**
     * This is what handles the current request coming in.
     * It finds the corresponding route and routes that that.
     *
     * @param $request string
     *
     * @return mixed
     */
    public static function handle($request)
    {
        $router = self::instance();

        // Parse request
        $requestRoute = explode('?', $request)[0];

        if (isset(explode('?', $request)[1])) {
            $requestParams = explode('&', explode('?', $request)[1]);

            $requestParams = array_reduce($requestParams, function ($carry, $item) {
                $carry[explode('=', $item)[0]] = explode('=', $item)[1];
                return $carry;
            });
        } else {
            $requestParams = [];
        }

        // Check if the the route exists
        foreach ($router->routes as $route) {
            if ($requestRoute == $route->uri) {
                $class = 'app\handlers\\' . $route->class();
                $method = $route->method();

                $handler = new $class;

                return empty($requestParams) ? $handler->$method() : $handler->$method($requestParams);
            }
        }

        // If the route doesn't exist, return a 404
        http_response_code(404);
        include dirname(__FILE__).'/../app/views/404.html';
    }

    /**
     * This loads the routes from the routes file
     */
    public static function loadRoutes()
    {
        require_once dirname(__FILE__).'/../app/Routes.php';
    }
}
