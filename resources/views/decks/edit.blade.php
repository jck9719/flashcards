@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Edycja zestawu {{ $deck['name'] }} 
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/sets/{{ $deck['id'] }}"
                              method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="title">Tytuł</label>
                                <input type="text" class="form-control" name="name" id="title"
                                       value="{{ $deck['name'] }}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="language1">Język 1</label>
                                        <select class="form-control" name="language1" id="language1">
                                            @foreach($languages as $language)
                                                <option value="{{ $language['id'] }}"
                                                        @if($deck['language1_id'] == $language['id'])
                                                        selected
                                                        @endif
                                                >{{ $language['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="language2">Język 2</label>
                                        <select class="form-control" name="language2" id="language2">
                                            @foreach($languages as $language)
                                                <option value="{{ $language['id'] }}"
                                                        @if($deck['language2_id'] == $language['id'])
                                                        selected
                                                        @endif
                                                >{{ $language['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="words-wrapper">
                                @foreach($words as $word)
                                    <div class="form-group words-input">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control" name="lang1[]"
                                                       value="{{ $word[$deck['language1']['code']] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" name="lang2[]"
                                                       value="{{ $word[$deck['language2']['code']] }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if($isSubcategoryEditor)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <input type="radio" name="visibility" value="public">Publiczny</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="visibility" value="private" checked>Prywatny</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3 text-center pd">
                                        <button class="btn btn-danger" id="add-row-btn">Dodaj nowy wiersz</button>
                                    </div>
                                    <div class="col-md-3 text-center pd">
                                        <button class="btn btn-danger" id="delete-row-btn">Usuń ostatni wiersz</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Wyślij</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection