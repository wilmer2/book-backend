<?php

/**
 * @apiGroup           Like
 * @apiName            findLikeByType
 *
 * @api                {GET} /v1/likes/by-type Endpoint title here..
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
$router->get('likes/by-type', [
    'as' => 'api_like_find_like_by_type',
    'uses'  => 'Controller@findLikeByType',
    'middleware' => [
      'auth:api',
    ],
]);
