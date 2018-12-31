<?php

/**
 * @apiGroup           BookProgress
 * @apiName            bookInProgress
 *
 * @api                {POST} /v1/bookprogresses/by-book/:book_id/pages/:page_id Endpoint title here..
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
$router->post('bookprogresses/by-book/{book_id}/pages/{page_id}', [
    'as' => 'api_bookprogress_book_in_progress',
    'uses'  => 'Controller@bookInProgress',
    'middleware' => [
      'auth:api',
    ],
]);
