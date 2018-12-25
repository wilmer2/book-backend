<?php

/**
 * @apiGroup           Book
 * @apiName            getAllBooksByUser
 *
 * @api                {GET} /v1/books/by-user/:user_id Endpoint title here..
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
$router->get('books/by-user/{user_id}', [
    'as' => 'api_book_get_all_books_by_user',
    'uses'  => 'Controller@getAllBooksByUser',
]);
