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

class JsonTransporter implements TransporterInterface
{

    /**
     * Function to set the appropriate headers on a request object
     * to facilitate a JSON transport
     *
     * @param \Guzzle\Http\Message\Request $request
     */
    public function setHeaderOnRequest(\Guzzle\Http\Message\Request &$request)
    {
        $request->setHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);
    }

    /**
     * Function to convert a response object into an associative
     * array of data
     * 
     * @param  \Guzzle\Http\Message\Response $response
     * @return array
     */
    public function parseResponseToData(\Guzzle\Http\Message\Response $response)
    {
        return $response->json();
    }

    /**
     * Function to parse the response string into an object
     * specific to JSON
     * 
     * @param  \Guzzle\Http\Message\Response $response
     * @return stdClass
     */
    public function parseResponseStringToObject(\Guzzle\Http\Message\Response $response)
    {
        return json_decode($response->getBody(true));
    }
}
