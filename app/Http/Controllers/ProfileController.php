<?php

namespace App\Http\Controllers;

use Exception;
use App\Repositories\AuthRepository;

class ProfileController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->middleware('auth:api');
        $this->authRepository = $authRepository;
    }

    public function me()
    {
        try {
            return $this->authRepository->me();
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    public function sayHello()
    {
        return response()->json(['hello' => 'world']);
    }
}
