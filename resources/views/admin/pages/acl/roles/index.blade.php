@extends('admin.layout.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                    </div>
                    <div>
                        Permissões
                        {{-- <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div> --}}
                    </div>
                </div>
                <div class="page-title-actions">
                    <a class="btn btn-primary" href="{{ route('roles.create') }}">Novo cadastro</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Role</th>
                            <th>Data de cadastro</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->role }}</td>
                            <td>{{ $role->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('roles.edit', $role->id) }}">editar</a>
                                <a class="btn btn-danger" href="{{ route('roles.destroy', $role->id) }}">remover</a>
                                <a class="btn btn-primary" href="{{ route('roles.resources', $role->id) }}">Adicionar recurso</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">NENHUM REGISTRO ENCONTRADO</td>
                        </tr>
                        @endforelse
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
