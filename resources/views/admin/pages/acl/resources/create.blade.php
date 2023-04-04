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
                <h5 class="card-title">Cadastro de Modules</h5>
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{ route('modules.store') }}"
                    novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <div>
                            <input type="text" class="form-control" id="name" name="name"
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
                        <label> Faz parte do menu?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="isMenu1" name="is_menu" class="custom-control-input  @error('is_menu') is-invalid @enderror" value="1">
                            <label class="custom-control-label" for="isMenu1">Sim</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="isMenu2" name="is_menu" class="custom-control-input  @error('is_menu') is-invalid @enderror" value="0">
                            <label class="custom-control-label" for="isMenu2">Não</label>
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="send" value="Send">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
