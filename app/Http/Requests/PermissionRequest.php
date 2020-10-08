<?php

namespace App\Http\Requests;


class PermissionRequest extends BaseRequest
{
    protected $errorBag = 'runAction';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $methodName = $this->getRouteActionName();

        /**
         * Call route validations by route action name.
         */
        return $this->$methodName();
    }

    /**
     * @return string[]
     */
    public function store()
    {
        return [
            'name' => 'required|min:5|alpha_dash|unique:permissions',
            'display_name' => 'required|min:5|regex:/^[a-zA-Z\s]+$/',
            'route_name' => 'required|min:5|regex:/^[a-zA-Z\s+]+/'
        ];
    }

    /**
     * @return string[]
     */
    public function update()
    {
        return [
            'name' => 'required|min:5|alpha_dash',
            'display_name' => 'required|min:5|regex:/^[a-zA-Z\s]+$/',
            'route_name' => 'required|min:5|regex:/^[a-zA-Z\s+]+/'
        ];
    }
}
