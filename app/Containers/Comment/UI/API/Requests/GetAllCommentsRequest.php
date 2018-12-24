<?php

namespace App\Containers\Comment\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllCommentsRequest.
 */
class GetAllCommentsRequest extends Request
{

    
    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'book_id',
        'page_id',
        'comment_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        //
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'book_id' => 'required_without_all:page_id,comment_id|exists:books,id',
            'page_id' => 'required_without_all:book_id,comment_id|exists:pages,id',
            'comment_id' => 'required_without_all:page_id,book_id|exists:comments,id',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }
}
