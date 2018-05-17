@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Edytowanie użytkownika {{ $user['name'] }}
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/dbusers/user/{{ $user['id'] }}"
                              method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Nazwa</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="Wpisz nazwę" value="{{ $user['name'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="em">Email</label>
                                <input type="text" class="form-control" name="em" id="em"
                                       placeholder="Wpisz email" value="{{ $user['email'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Hasło</label>
                                <input type="password" class="form-control" name="pass" id="pass">
                            <div class="form-group">
                                <label for="role">Zmiana roli</label>
                                <select class="form-control" id="role" name="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role['id'] }}"
                                                @if($user['role_id'] == $role['id'])
                                                selected
                                                @endif
                                        >{{ $role['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="categories[]" multiple class="form-control">
                                    @foreach($categories as $category)
                                        @foreach($category->subcategories as $subcategory)
                                            <option value="{{ $subcategory['id'] }}"
                                            @foreach($user['subcategories'] as $sub)
                                                @if($sub['id'] == $subcategory['id'])
                                                    selected
                                                @endif
                                            @endforeach
                                            >
                                                {{ $category['name'] }}: {{ $subcategory['name'] }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edytuj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection