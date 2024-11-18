<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    // создание гостя
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'nullable|email|unique:guests,email',
            'phone' => 'required|string|unique:guests,phone',
        ]);

        $data = $request->all();

        // определение страны
        if (empty($data['country'])) {
            $data['country'] = $this->getCountryByPhone($data['phone']);
        }

        $guest = Guest::create($data);

        return response()->json($guest, 201);
    }

    // метод для определения страны по префиксу
    private function getCountryByPhone($phone)
    {
        $phoneCodeToCountry = [
            '+7' => 'Россия',
            '+1' => 'США',
        ];

        foreach ($phoneCodeToCountry as $code => $country) {
            if (str_starts_with($phone, $code)) {
                return $country;
            }
        }

        return 'Неизвестная страна';
    }
}
