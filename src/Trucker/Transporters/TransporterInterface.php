<?php

/**
 * This file is part of Trucker
 *
 * (c) Brian Webb <bwebb@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Trucker\Transporters;

interface TransporterInterface
{

    /**
     * Function to set the appropriate headers on a request object
     * to facilitate a particular transport language
     * 
     * @param \Guzzle\Http\Message\Request $request
     * @return void
     */
    public function setHeaderOnRequest(\Guzzle\Http\Message\Request &$request);

    /**
     * Function to convert a response object into an associative
     * array of data
     * 
     * @param  \Guzzle\Http\Message\Response $response
     * @return array
     */
    public function parseResponseToData(\Guzzle\Http\Message\Response $response);

    /**
     * Function to parse the response string into an object
     * specific to the type of transport mechanism used i.e. json, xml etc
     * 
     * @param  \Guzzle\Http\Message\Response $response
     * @return stdClass
     */
    public function parseResponseStringToObject(\Guzzle\Http\Message\Response $response);
}
