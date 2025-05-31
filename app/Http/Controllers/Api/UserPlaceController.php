<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserPlaceController extends Controller
{
    /**
     * Получить список желаемых мест конкретного пользователя.
     * GET /api/users/{user}/wishlist
     */
    public function index(User $user)
    {
        // Предполагается, что в модели User определён метод places() для связи с таблицей "user_places"
        $wishlist = $user->places()->get();
        return response()->json($wishlist, 200);
    }

    /**
     * Добавить место для отдыха в список желаемых для конкретного пользователя.
     * POST /api/users/{user}/wishlist
     * 
     * Параметры:
     * - place_id: идентификатор места, которое уже должно быть создано.
     * 
     * Валидации:
     *   - У пользователя не может быть более 3 мест в желаемом.
     *   - Одно и то же место не должно добавляться дважды.
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'place_id' => 'required|exists:places,id',
        ]);

        // Проверка: данное место уже добавлено в желаемое
        if ($user->places()->where('places.id', $validated['place_id'])->exists()) {
            return response()->json(['message' => 'Место уже добавлено в список желаемого'], 422);
        }

        // Проверка: у пользователя уже 3 места в желаемом
        if ($user->places()->count() >= 3) {
            return response()->json(['message' => 'У пользователя не может быть более 3 мест в желаемом'], 422);
        }

        // Добавление места в связь через pivot-таблицу
        $user->places()->attach($validated['place_id']);

        return response()->json(['message' => 'Место успешно добавлено в желаемое'], 201);
    }
}
