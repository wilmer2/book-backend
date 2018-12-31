<?php

/**
 * @apiGroup           BookProgress
 * @apiName            findBookProgressById
 *
 * @api                {GET} /v1/bookprogresses/:id Endpoint title here..
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
$router->get('bookprogresses/{id}', [
    'as' => 'api_bookprogress_find_book_progress_by_id',
    'uses'  => 'Controller@findBookProgressById',
    'middleware' => [
      'auth:api',
    ],
]);
