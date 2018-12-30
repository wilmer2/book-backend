<?php

/**
 * @apiGroup           ReadingList
 * @apiName            deleteReadingList
 *
 * @api                {DELETE} /v1/readinglists/:id Endpoint title here..
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
$router->delete('readinglists/{id}', [
    'as' => 'api_readinglist_delete_reading_list',
    'uses'  => 'Controller@deleteReadingList',
    'middleware' => [
      'auth:api',
    ],
]);
