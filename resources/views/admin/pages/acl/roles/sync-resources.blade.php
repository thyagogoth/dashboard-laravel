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
                <h5 class="card-title">Sincronizar permissões: <strong>{{$role->name}}</strong> => Recursos</h5>

                <form class="col-md-10 mx-auto" action="{{route('roles.resources.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @foreach($resources as $resource)
                            <div class="col-md-4 pt-4 pb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                        name="resources[]"
                                        class="custom-control-input"
                                        id="customCheck{{$resource->id}}"
                                        value="{{$resource->id}}"
                                        @if($role->resources->contains($resource)) checked @endif
                                    >
                                    <label class="custom-control-label" for="customCheck{{$resource->id}}">{{$resource->name}}</label>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group col-md-12">
                            <div class="">
                                <hr>
                                <button class="btn btn-success" type="submit">Adicionar Recursos ao Papél</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
