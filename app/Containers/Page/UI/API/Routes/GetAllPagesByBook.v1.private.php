<?php

/**
 * @apiGroup           Page
 * @apiName            getAllPageByBook
 *
 * @api                {GET} /v1/pages/by-book/:book_id Endpoint title here..
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
$router->get('pages/by-book/{book_id}', [
    'as' => 'api_page_get_all_pages_book',
    'uses'  => 'Controller@getAllPageByBook',
]);
