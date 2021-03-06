<?php 

/**
 * This file is part of Trucker
 *
 * (c) Brian Webb <bwebb@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Trucker\Responses;

/**
 * Result class returned from Trucker when
 * a raw request is initiated
 *
 * @author Brian Webb <bwebb@indatus.com>
 */
class RawResponse
{
    /**
     * Response object
     *
     * @var Trucker\Response
     */
    private $response = null;

    /**
     * Var to hold any errors returned
     * 
     * @var array
     */
    private $errors = array();

    /**
     * Var to tell if the request was successful
     * 
     * @var boolean
     */
    public $success = false;

    /**
     * Constructor
     * 
     * @param boolean                     $successful 
     * @param Trucker\Responses\Response  $response  
     * @param array                       $errors     
     */
    public function __construct($successful = false, \Trucker\Responses\Response $response = null, array $errors = array())
    {
        $this->success = $successful;
        $this->response = $response;
        $this->errors = $errors;
    }

    /**
     * Magic function to pass methods not found
     * on this class down to the Trucker\Responses\Response
     * object that is being wrapped
     *
     * @param  string $method name of called method
     * @param  array  $args   arguments to the method
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (!method_exists($this, $method)) {
            return call_user_func_array(
                array($this->response, $method),
                $args
            );
        }
    // @codeCoverageIgnoreStart
    }// @codeCoverageIgnoreEnd

    /**
     * Getter for errors
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Getter for response
     */
    public function response()
    {
        return $this->response->parseResponseStringToObject();
    }

    public function getResponse()
    {
        return $this->response;
    }
}
