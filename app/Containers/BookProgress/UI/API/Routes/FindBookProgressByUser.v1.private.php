<?php

/**
 * @apiGroup           BookProgress
 * @apiName            findBookProgressByUser
 *
 * @api                {GET} /v1/bookprogresses/by-book/:book_id Endpoint title here..
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
$router->get('bookprogresses/by-book/{book_id}', [
    'as' => 'api_bookprogress_find_book_progress_by_user',
    'uses'  => 'Controller@findBookProgressByUser',
    'middleware' => [
      'auth:api',
    ],
]);
