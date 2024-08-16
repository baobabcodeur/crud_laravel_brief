<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Http\Requests\user\CreateUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Classes\ResponseClass;

class UserController extends Controller
{
    //
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }


    public function index()
    {
        $data = $this->userInterface->index();

        return view('users.index', [
            'page' => 'users',
            'users' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('registration.process');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "role" => $request->role
        ];

        DB::beginTransaction();

        try {
            $this->userInterface->store($data);
            DB::commit();

            return ResponseClass::success();
        } catch (\Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userInterface->show($id);
        return view('users.edit', [
            'page' => 'users',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role
            
        ];

        DB::beginTransaction();

        try {
            $this->userInterface->update($data, $id);
            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $user = User::findOrFail($id);

        $user->delete($id);
        return ResponseClass::success();


      

        
    
    }
}
