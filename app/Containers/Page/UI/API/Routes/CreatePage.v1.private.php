<?php

/**
 * @apiGroup           Page
 * @apiName            createPage
 *
 * @api                {POST} /v1/pages Endpoint title here..
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
$router->post('pages', [
    'as' => 'api_page_create_page',
    'uses'  => 'Controller@createPage',
    'middleware' => [
      'auth:api',
    ],
]);
