<?php

/**
 * @apiGroup           Comment
 * @apiName            deleteComment
 *
 * @api                {DELETE} /v1/comments/:id Endpoint title here..
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
$router->delete('comments/{id}', [
    'as' => 'api_comment_delete_comment',
    'uses'  => 'Controller@deleteComment',
    'middleware' => [
      'auth:api',
    ],
]);
