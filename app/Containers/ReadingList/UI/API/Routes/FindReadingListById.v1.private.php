<?php

/**
 * @apiGroup           ReadingList
 * @apiName            findReadingListById
 *
 * @api                {GET} /v1/readinglists/:id Endpoint title here..
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
$router->get('readinglists/{id}', [
    'as' => 'api_readinglist_find_reading_list_by_id',
    'uses'  => 'Controller@findReadingListById',
    'middleware' => [
      'auth:api',
    ],
]);
