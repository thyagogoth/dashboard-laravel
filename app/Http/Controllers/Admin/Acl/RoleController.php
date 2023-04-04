<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\{
    RoleStoreRequest,
    RoleUpdateRequest
};
use App\Models\Acl\Module;
use App\Models\Acl\Resource;
use Illuminate\Http\Request;
use App\Models\Acl\Role;

class RoleController extends Controller
{

    public function index()
    {

        // $roles = Role::with(['users', 'resources'])->paginate();
        $roles = Role::paginate();
        return view('admin.pages.acl.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.pages.acl.roles.create');
    }

    public function store(RoleStoreRequest $request)
    {
        try {
            //code...
            Role::create($request->all());
            session()->flash('success', 'Cadastro efetuado com sucesso!');
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar criação...';

		    // flash($message)->error();
		    return redirect()->back();
        }

    }

    public function show($id)
    {
        return redirect()->route('roles.edit', $id);
    }

    public function edit($id)
    {
        // $role = Role::with(['users', 'resources'])->find($id);
        // if ( !$role ) {
        //     return response(['message' => 'not found'], 404);
        // }

        $role = Role::find($id);
        return view('admin.pages.acl.roles.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        // $role = Role::find($id);
        $role = Role::find($id);

        if ( !$role ) {
            session()->flash('error', 'Not found');
        }

        $role->update($request->all());
        session()->flash('success', 'Cadastro alterado com sucesso!');
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ( !$role ) {
            return response(['message' => 'not found'], 404);
        }

        $role->delete();
        // return response(['message' => 'deleted'], 200);
        session()->flash('success', 'Cadastro removido com sucesso!');
        return redirect()->route('roles.index');
    }



	public function syncResources(int $role)
	{
		$role = Role::find($role);
		$resources = Resource::all(['id', 'resource', 'name']);

		return view('admin.pages.acl.roles.sync-resources', compact('role', 'resources'));
	}


	public function updateSyncResources($role, Request $request)
	{
		try{
			$role = Role::find($role);
			$role->resources()->sync($request->resources);

			session()->flash('success', 'Recursos adicionados com sucesso!');
			return redirect()->route('roles.resources', $role);

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adição de recursos...';

			session()->flash('error', $message);
			return redirect()->back();
		}
	}
}
