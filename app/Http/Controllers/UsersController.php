<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        return view(
            "users.index",
            [
                "users" => User::paginate(5),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = bcrypt('password');


        if (!$user->save()) {
            return redirect()
                ->back()
                ->with('danger', 'Algo deu errado, tente novamente');
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!($user = User::find($id))) {
            return redirect()
                ->back()
                ->with('info', 'Usuario não encontrado');
        }

        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!($user = User::find($id))) {
            return redirect()
                ->back()
                ->with('info', 'Usuario não encontrado');
        }


        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateUserRequest $request, string $id)
    {
        if (!($user = User::find($id))) {
            return redirect()
                ->back()
                ->with('info', 'Usuario não encontrado');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;

        if (!$user->update()) {
            return redirect()
                ->back()
                ->with('danger', 'Algo deu errado, tente novamente');
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!($user = User::find($id))) {
            return redirect()
                ->back()
                ->with('info', 'Usuario não encontrado');
        }

        if (!$user->delete()) {
            return redirect()
                ->back()
                ->with('danger', 'Algo deu errado, tente novamente');
        }
        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário excluido com sucesso.');
    }
}
