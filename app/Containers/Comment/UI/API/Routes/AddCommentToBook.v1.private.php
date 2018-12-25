<?php

/**
 * @apiGroup           Comment
 * @apiName            addCommentToBook
 *
 * @api                {POST} /v1/books/book_id/add-comment Endpoint title here..
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
$router->post('books/{book_id}/add-comment', [
    'as' => 'api_comment_add_comment_to_book',
    'uses'  => 'Controller@addCommentToBook',
    'middleware' => [
      'auth:api',
    ],
]);
