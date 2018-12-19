<?php

/**
 * @apiGroup           Page
 * @apiName            deletePage
 *
 * @api                {DELETE} /v1/pages/:id Endpoint title here..
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
$router->delete('pages/{id}', [
    'as' => 'api_page_delete_page',
    'uses'  => 'Controller@deletePage',
    'middleware' => [
      'auth:api',
    ],
]);
