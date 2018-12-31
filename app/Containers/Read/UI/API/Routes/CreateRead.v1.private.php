<?php

/**
 * @apiGroup           Read
 * @apiName            createRead
 *
 * @api                {POST} /v1/reads Endpoint title here..
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
$router->post('reads', [
    'as' => 'api_read_create_read',
    'uses'  => 'Controller@createRead',
    'middleware' => [
      'auth:api',
    ],
]);
