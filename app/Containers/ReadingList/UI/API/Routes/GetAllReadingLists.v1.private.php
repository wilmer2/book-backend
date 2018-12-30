<?php

/**
 * @apiGroup           ReadingList
 * @apiName            getAllReadingLists
 *
 * @api                {GET} /v1/readinglists Endpoint title here..
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
$router->get('readinglists', [
    'as' => 'api_readinglist_get_all_reading_lists',
    'uses'  => 'Controller@getAllReadingLists',
    'middleware' => [
      'auth:api',
    ],
]);
