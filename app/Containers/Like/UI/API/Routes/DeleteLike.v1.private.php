<?php

/**
 * @apiGroup           Like
 * @apiName            deleteLike
 *
 * @api                {DELETE} /v1/likes/:id Endpoint title here..
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
$router->delete('likes/{id}', [
    'as' => 'api_like_delete_like',
    'uses'  => 'Controller@deleteLike',
    'middleware' => [
      'auth:api',
    ],
]);
