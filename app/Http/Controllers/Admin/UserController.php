<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Acl\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate();
        return view('admin.pages.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = Role::all('id','name');

        return view('admin.pages.users.edit', compact('user', 'roles'));
    }


    public function update(UserRequest $request, $id)
    {
        try{
        	$data = $request->all();

        	if($data['password']){

        		$validator = Validator::make($data, [
        			'password' => 'required|string|min:8|confirmed'
		        ]);

        		if($validator->fails())
        			return redirect()->back()->withErrors($validator);

				$data['password'] = bcrypt($data['password']);

	        } else {
        		unset($data['password']);
	        }

			$user = $this->user->find($id);
			$user->update($data);

			$role = Role::find($data['role']);
			$user = $user->role()->associate($role);
			$user->save();

			session()->flash('success', 'Usuário atualizado com sucesso!');
			return redirect()->route('users.index');

        }catch (\Exception $e) {
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

	        session()->flash('error', $message);
	        return redirect()->back();
        }


    }
}
