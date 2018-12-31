<?php

/**
 * @apiGroup           ReadingList
 * @apiName            addBookToReadingList
 *
 * @api                {POST} /v1/readinglists/:id/books/:book_id Endpoint title here..
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
$router->post('readinglists/{id}/books/{book_id}', [
    'as' => 'api_readinglist_add_book_to_reading_list',
    'uses'  => 'Controller@addBookToReadingList',
    'middleware' => [
      'auth:api',
    ],
]);
