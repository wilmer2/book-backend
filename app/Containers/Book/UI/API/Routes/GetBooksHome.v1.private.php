<?php

/**
 * @apiGroup           Book
 * @apiName            getBookHome
 *
 * @api                {GET} /v1/books/home Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('/', [
    'as' => 'api_book_get_book_home',
    'uses'  => 'Controller@getBooksToHome',
]);
