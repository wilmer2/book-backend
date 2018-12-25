<?php

/**
 * @apiGroup           Comment
 * @apiName            addCommentToComment
 *
 * @api                {POST} /v1/comments/:id/add-comment Endpoint title here..
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
$router->post('comments/{id}/add-comment', [
    'as' => 'api_comment_add_comment_to_comment',
    'uses'  => 'Controller@addCommentToComment',
    'middleware' => [
      'auth:api',
    ],
]);
