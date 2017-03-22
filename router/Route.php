<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package jokes
 */
namespace odannyc\router;

class Route
{
    /**
     * The route URI
     *
     * @var string
     */
    public $uri = '';

    /**
     * What handles this route
     *
     * @var string
     */
    protected $handler = '';

    /**
     * Route constructor.
     *
     * @param $uri string
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Sets the handler
     *
     * @param $handler string
     */
    public function isHandledBy($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Returns the class of the handler
     *
     * @return mixed
     */
    public function class()
    {
        return explode('@', $this->handler)[0];
    }

    /**
     * Returns the method of the handler
     *
     * @return mixed
     */
    public function method()
    {
        return explode('@', $this->handler)[1];
    }
}
