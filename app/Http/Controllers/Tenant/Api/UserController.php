<?php

namespace App\Http\Controllers\Tenant\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tenant\UserRepository;

class UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(UserRepository $user)
    {
        $this->entity = $user;
    }
}
