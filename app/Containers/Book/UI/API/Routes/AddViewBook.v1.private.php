<?php

/**
 * @apiGroup           Book
 * @apiName            Controller
 *
 * @api                {PATCH} /v1/book/:id/view Endpoint title here..
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
$router->patch('books/{id}/view', [
    'as' => 'api_book_controller',
    'uses'  => 'Controller@addViewerBook',
]);
