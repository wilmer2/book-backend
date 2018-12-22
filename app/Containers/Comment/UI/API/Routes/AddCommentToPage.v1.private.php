<?php

/**
 * @apiGroup           Comment
 * @apiName            addCommentToPage
 *
 * @api                {POST} /v1/pages/:page_id/add-comment Endpoint title here..
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
$router->post('pages/{page_id}/add-comment', [
    'as' => 'api_comment_add_comment_to_page',
    'uses'  => 'Controller@addCommentToPage',
    'middleware' => [
      'auth:api',
    ],
]);
