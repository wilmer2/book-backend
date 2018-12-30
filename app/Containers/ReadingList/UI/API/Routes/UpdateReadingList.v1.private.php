<?php

/**
 * @apiGroup           ReadingList
 * @apiName            updateReadingList
 *
 * @api                {PATCH} /v1/readinglists/:id Endpoint title here..
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
$router->patch('readinglists/{id}', [
    'as' => 'api_readinglist_update_reading_list',
    'uses'  => 'Controller@updateReadingList',
    'middleware' => [
      'auth:api',
    ],
]);
