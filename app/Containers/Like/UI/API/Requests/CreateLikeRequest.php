<?php

namespace App\Containers\Like\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateLikeRequest.
 */
class CreateLikeRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    // protected $transporter = \App\Ship\Transporters\DataTransporter::class;

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
        'comment_id',
        'page_id',
        'book_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        // 'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'comment_id' => 'required_without_all:book_id,page_id|exists:comments,id',
            'book_id' => 'required_without_all:comment_id,page_id|exists:books,id',
            'page_id' => 'required_without_all:book_id,comment_id|exists:pages,id',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
