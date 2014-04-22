<?php

/**
 * This file is part of Trucker
 *
 * (c) Brian Webb <bwebb@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Trucker\Requests;

use Illuminate\Container\Container;
use Trucker\Finders\Conditions\QueryConditionInterface;
use Trucker\Finders\Conditions\QueryResultOrderInterface;
use Trucker\Requests\Auth\AuthenticationInterface;
use Trucker\Resource\Model;

/**
 * Interface to dictate management of query conditions for a request
 */
interface RequestableInterface
{

    /**
     * @param \Guzzle\Http\Client $client
     *
     * @return void
     */
    public function __construct(Container $app, $client = null);

    /**
     * @return \Guzzle\Http\Client
     */
    public function &getClient();

    /**
     * @param string $path
     * @param string $httpMethodParam
     */
    public function createRequest($baseUri, $path, $httpMethod = 'GET', $requestHeaders = array(), $httpMethodParam = null);

    /**
     * @return void
     */
    public function setHeaders($requestHeaders = array());

    /**
     * @return void
     */
    public function setBody($body, $contentType = null);

    /**
     * @return void
     */
    public function setPostParameters($params = array());

    /**
     * @return void
     */
    public function setGetParameters($params = array());

    /**
     * @return void
     */
    public function setFileParameters($params = array());

    /**
     * @return void
     */
    public function setModelProperties(Model $model);

    /**
     * @return void
     */
    public function setTransportLanguage();

    /**
     * @return void
     */
    public function addErrorHandler($httpStatus, \Closure $func, $stopPropagation = true);

    /**
     * @return void
     */
    public function addQueryCondition(QueryConditionInterface $condition);

    /**
     * @return void
     */
    public function addQueryResultOrder(QueryResultOrderInterface $resultOrder);

    /**
     * @return void
     */
    public function authenticate(AuthenticationInterface $auth);

    public function sendRequest();
}
