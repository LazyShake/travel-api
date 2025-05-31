<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Получить список всех пользователей.
     * GET /api/users
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    /**
     * Добавить нового пользователя.
     * POST /api/users
     * 
     * Параметры:
     * - login (уникальный)
     * - password (хешируется)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'login'    => 'required|string|unique:users,login',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'login'    => $validated['login'],
            'password' => Hash::make($validated['password']),
            // Для базовой версии можно задать роль по умолчанию, например 'user'
            'role'     => 'user',
        ]);

        return response()->json($user, 201);
    }
}
