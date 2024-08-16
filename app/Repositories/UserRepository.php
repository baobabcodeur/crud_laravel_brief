<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements UserInterface
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, $id)
    {
        return User::findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
