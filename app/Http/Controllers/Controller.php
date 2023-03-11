<?php

declare( strict_types=1 );

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected readonly ?User $user;

    public function __construct()
    {
        /** @var \Illuminate\Contracts\Auth\Guard $auth */
        $auth = auth();

        /** @var null|\App\Models\User $user */
        $user = $auth->user();

        $this->user = $user;
    }
}
