@extends('admin.layout.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-picture text-danger"></i>
                    </div>
                    <div>
                        Form Validation
                        {{-- <div class="page-title-subheading">Inline validation is very easy to implement using the Architect Framework.</div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Adicionar Recursos para o módulo: <strong>{{$module->name}}</strong></h5>

                <form action="{{route('modules.resources.update', $module->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @forelse($resources as $resource)
                            <div class="col-md-4 pt-4 pb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                        name="resources[]"
                                        class="custom-control-input"
                                        id="customCheck{{$resource->id}}"
                                        value="{{$resource->id}}"
                                        @if($module->resources->contains($resource)) checked @endif
                                    >
                                    <label class="custom-control-label" for="customCheck{{$resource->id}}">{{$resource->resource}}</label>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-danger">Nenhum recurso disponível</div>
                            </div>
                        @endforelse

                        <div class="form-group col-md-12">
                            <div class="">
                                <hr>
                                <button class="btn btn-success" type="submit">Adicionar Recursos ao Módulo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
