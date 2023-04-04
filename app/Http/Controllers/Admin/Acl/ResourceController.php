<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\ResourceStoreUpdateRequest;
use App\Models\Acl\Resource;

class ResourceController extends Controller
{


    private $resource;

	public function __construct(Resource $resource)
	{
		$this->resource = $resource;
	}


	public function index()
	{
		$resources = $this->resource->paginate(10);

		return view('admin.pages.acl.resources.index', compact('resources'));
	}


	public function create()
	{
		return view('admin.pages.acl.resources.create');
	}


	public function store(ResourceStoreUpdateRequest $request)
	{
		try {
			$this->resource->create($request->all());

			session()->flash('success', 'Recurso atualizado com sucesso!');
			return redirect()->route('resources.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

			session()->flash('error', $message);
			return redirect()->back();
		}
	}


	public function show($id)
	{
		return redirect()->route('resources.edit', $id);
	}


	public function edit($id)
	{
		$resource = $this->resource->find($id);
		return view('admin.pages.acl.resources.edit', compact('resource'));
	}


	public function update(ResourceStoreUpdateRequest $request, $id)
	{
		try {
			$resource = $this->resource->find($id);
			$resource->update($request->all());

			session()->flash('success', 'Recurso atualizado com sucesso!');
			return redirect()->route('resources.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

			session()->flash('error', $message);
			return redirect()->back();
		}
	}

    public function destroy($id)
	{
		try {
			$resource = $this->resource->find($id);
			$resource->delete();

			session()->flash('success', 'Recurso removido com sucesso!');
			return redirect()->route('resources.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';

			session()->flash('error', $message);
			return redirect()->back();
		}
	}
}
