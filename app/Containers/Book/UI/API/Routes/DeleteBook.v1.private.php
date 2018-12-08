<?php

/**
 * @apiGroup           Book
 * @apiName            deleteBook
 *
 * @api                {DELETE} /v1/books/:id Endpoint title here..
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
$router->delete('books/{id}', [
    'as' => 'api_book_delete_book',
    'uses'  => 'Controller@deleteBook',
    'middleware' => [
      'auth:api',
    ],
]);
