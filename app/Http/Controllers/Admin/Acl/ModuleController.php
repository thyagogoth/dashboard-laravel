<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\{
    ModuleStoreRequest,
    ModuleUpdateRequest
};
use Illuminate\Http\Request;

use App\Models\Acl\Module;
use App\Models\Acl\Resource;

class ModuleController extends Controller
{

    public function index()
    {
        // $modules = Module::with(['roles', 'resources'])->paginate(25);
        $modules = Module::paginate();
        return view('admin.pages.acl.modules.index', compact('modules'));
    }

    public function create()
    {
        return view('admin.pages.acl.modules.create');
    }

    public function store(ModuleStoreRequest $request)
    {
        Module::create($request->all());
        session()->flash('success', 'Cadastro efetuado com sucesso!');
        return redirect()->route('modules.index');
    }

    public function show($id)
	{
		return redirect()->route('modules.edit', $id);
	}

    public function edit($id)
    {
        // $module = Module::with(['roles', 'resources'])->find($id);
        $module = Module::find($id);
        if ( !$module ) {
            return response(['message' => 'not found'], 404);
        }
        return view('admin.pages.acl.modules.edit', compact('module'));
    }

    public function update(ModuleUpdateRequest $request, $id)
    {
        $module = Module::find($id);
        if ( !$module ) {
            session()->flash('error', 'Not found');
        }

        $module->update($request->all());
        session()->flash('success', 'Cadastro alterado com sucesso!');
        return redirect()->route('modules.index');
    }

    public function destroy($id)
    {
        $module = Module::find($id);
        if ( !$module ) {
            return response(['message' => 'not found'], 404);
        }

        $module->delete();
        session()->flash('success', 'Cadastro removido com sucesso!');
        return redirect()->route('modules.index');
    }


    public function syncResources(Module $module, Resource $resource)
	{
		$resources = $resource->whereNull('module_id')
		                     ->where('is_menu', true)
		                     ->get();

		return view('admin.pages.acl.modules.sync-resources', compact('module', 'resources'));
	}

	public function updateSyncResources(Module $module, Request $request, Resource $resource)
	{
		try{
			foreach($request->resources as $r) {
				$resourceModel = $resource->find($r);
				$resourceModel->module()->associate($module);
				$resourceModel->save();
			}

			session()->flash('success','Recursos adicionados para o módulo!');
			return redirect()->back();
		} catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adição de recursos para o módulo...';

			session()->flash('error',$message);
			return redirect()->back();
		}
	}


}
