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
                        Data Tables<div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button type="button" class="btn btn-primary">
                    <a href="{{ route('users.create') }}">Novo cadastro</a>
                </button>
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
                        @forelse ($users as $user)
                        <tr>

                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}
                            </td>
                            <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                            <td>
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary">EDITAR</a>
                            </td>
                            {{-- <td>
                                <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">editar</a>
                                <a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}">remover</a>
                            </td> --}}
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
