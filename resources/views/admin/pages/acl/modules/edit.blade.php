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
                    <div>Form Validation
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

                <h5 class="card-title">Cadastro de Modules</h5>
                <form id="" class="col-md-10 mx-auto" method="POST" action="{{ route('modules.update', $module->id) }}" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <div>
                            <input type="text" class="form-control" id="name" name="name" value="{{ @old('name', $module->name) }}"
                                placeholder="Nome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon">Ícone</label>
                        <div>
                            <input type="text" class="form-control" id="icon" name="icon"
                                placeholder="Ícone">
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
