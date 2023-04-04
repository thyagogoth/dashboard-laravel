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
                    <div>ACL >> Recursos
                        <div class="page-title-subheading">Inline validation is very easy to implement using the Architect
                            Framework.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong class="mb-2">{{ $title ?? null }}</strong>
                        @foreach ($errors->all() as $error)
                            <b>{{ $error }}</b>
                        @endforeach
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                <h5 class="card-title">Cadastro de Recurso</h5>
                <form id="" class="col-md-10 mx-auto" method="POST" action="{{ route('resources.update', $resource->id) }}" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <div>
                            <input type="text" class="form-control" id="name" name="name" value="{{ @old('name', $resource->name) }}"
                                placeholder="Nome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="resource">Recurso</label>
                        <div>
                            <input type="text" class="form-control" id="resource" name="resource" value="{{ @old('resource', $resource->resource) }}"
                                placeholder="Recurso">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Exibir no menu?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="is_menu" name="is_menu" class="custom-control-input @error('is_menu') is-invalid @enderror" value="1">
                            <label class="custom-control-label" for="is_menu">Sim</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="not_is_menu" name="is_menu" class="custom-control-input @error('is_menu') is-invalid @enderror" value="0">
                            <label class="custom-control-label" for="not_is_menu">Não</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="send" value="Send">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
