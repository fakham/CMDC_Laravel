@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Contrôler les Utilisateurs : ') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Telephone</th>
                                <th>E-mail</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->telephone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px;">
                                    @if (Auth::user()->role == 2 | $user->id == 1)
                                        <b>Disabled</b>
                                    @else
                                        <form method="post" action="/update-role/{{ $user->id }}">
                                            @csrf
                                            <select class="form-control" name="role" onchange="this.form.submit();">
                                                <option value="1" {{ ($user->role == 1) ? 'selected' : null}}>Admin</option>
                                                <option value="2" {{ ($user->role == 2) ? 'selected' : null}}>Manager</option>
                                                <option value="3" {{ ($user->role == 3) ? 'selected' : null}}>User</option>
                                                <option value="4" {{ ($user->role == 4) ? 'selected' : null}}>Disable</option>
                                            </select>
                                        </form>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection