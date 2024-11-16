<?php

namespace App\Controller;

use App\Model\Guest;
use Respect\Validation\Validator as v;

class GuestController
{
    // получить всех гостей
    public function getAll($request, $response, $args)
    {
        $guests = Guest::all();
        return $response->withJson($guests);
    }

    // создать гостя
    public function create($request, $response, $args)
    {
        $data = $request->getParsedBody();

        // валидация
        v::email()->assert($data['email']);
        v::phone()->assert($data['phone']);
        
        $guest = new Guest();
        $guest->first_name = $data['first_name'];
        $guest->last_name = $data['last_name'];
        $guest->email = $data['email'];
        $guest->phone = $data['phone'];
        $guest->country = $data['country'] ?? $this->getCountryFromPhone($data['phone']);
        $guest->save();

        return $response->withJson($guest, 201);
    }

    // получить гостя по id
    public function get($request, $response, $args)
    {
        $guest = Guest::find($args['id']);
        return $response->withJson($guest);
    }

    // обновить гостя
    public function update($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $guest = Guest::find($args['id']);
        $guest->update($data);
        return $response->withJson($guest);
    }

    // удалить гостя
    public function delete($request, $response, $args)
    {
        $guest = Guest::find($args['id']);
        $guest->delete();
        return $response->withStatus(204);
    }

    // страна по номеру телефона
    private function getCountryFromPhone($phone)
    {
        if (substr($phone, 0, 2) === '+7') {
            return 'Russia';
        }
        return null; // можно добавить для других стран
    }
}
