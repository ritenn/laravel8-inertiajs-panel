<?php
declare(strict_types=1);

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

/**
 * This class helps to define multiple rules within one Request Class e.g. per Controller
 *
 * Class BaseRequest
 * @package App\Http\Requests
 */
abstract class BaseRequest extends FormRequest {

    /**
     * Set authorization
     * @var $authorize
     */
    protected $authorize;

    /**
     * Name of action that is defined as method in child Request
     * @var $routeActionName
     */
    protected $routeActionName;

    public function __construct()
    {
        parent::__construct();

        $this->isMethodAllowed();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return $this->authorize;
    }

    /**
     * If current route name (part of it) is defined as method name in child class,
     * then we allow it to pass, if not then block authorization.
     *
     * @return bool
     */
    public function isMethodAllowed() : bool
    {
        /**
         * Takes last string in route chain
         * e.g. profile.store - takes 'store', which is defined as method in child class.
         */
        $this->routeActionName = collect(explode('.', request()->route()->getName()))->last();

        return method_exists($this, $this->routeActionName) ? $this->authorize = true : $this->authorize = false;
    }

    public function getRouteActionName() : string
    {
        return $this->routeActionName;
    }
}
