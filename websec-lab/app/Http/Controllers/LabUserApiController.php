<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class LabUserApiController extends Controller
{
    /**
     * Намеренно отдаёт данные любого пользователя по id без проверки «только свой» (IDOR).
     */
    public function show(int $id): JsonResponse
    {
        $user = User::query()->findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}
