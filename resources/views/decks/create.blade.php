@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                        Tworzenie nowego zestawu w podkategorii {{ $subcategory['name'] }}
                    </div>
                     <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/category/{{ $subcategory['category_id'] }}/subcategory/{{ $subcategory['id'] }}/decks/add"
                              method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Tytuł</label>
                                <input type="text" class="form-control" name="name" id="title"
                                       placeholder="Podaj tytuł">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="language1">Język 1</label>
                                        <select class="form-control" name="language1" id="language1">
                                            @foreach($languages as $language)
                                                <option value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="language2">Język 2</label>
                                        <select class="form-control" name="language2" id="language2">
                                            @foreach($languages as $language)
                                                <option value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="words-wrapper">
                                <div class="form-group words-input">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" name="lang1[]">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" name="lang2[]">
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="col-md-3">
                                        <button class="btn btn-success" id="add-row-btn">Dodaj nowy wiersz</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-danger" id="delete-row-btn">Usuń ostatni wiersz</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" aria-label="Center Align">Wyślij</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection