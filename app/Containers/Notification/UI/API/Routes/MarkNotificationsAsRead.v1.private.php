<?php

/**
 * @apiGroup           Notification
 * @apiName            
 *
 * @api                {POST} /v1/ Endpoint title here..
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
$router->post('notifications', [
    'as' => 'api_notification_mark_as_read',
    'uses'  => 'Controller@markNotificationsAsRead',
    'middleware' => [
      'auth:api',
    ],
]);
