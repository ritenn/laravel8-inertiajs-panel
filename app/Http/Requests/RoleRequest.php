<?php

namespace App\Http\Requests;


class RoleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $methodName = $this->getRouteActionName();

        return $this->$methodName();
    }

    public function store()
    {
        return [
            'name' => 'required|min:5|alpha_dash|unique:roles',
            'display_name' => 'required|min:5|alpha'
        ];
    }

    public function update()
    {
        return [
            'name' => 'required|min:5|alpha_dash',
            'display_name' => 'required|min:5|alpha'
        ];
    }
}
