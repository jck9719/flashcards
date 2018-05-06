@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new deck for {{ $subcategory['name'] }}</div>

                    <div class="card-body">
                        <form action="/category/{{ $subcategory['category_id'] }}/subcategory/{{ $subcategory['id'] }}/decks/add"
                              method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="name" id="title"
                                       placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="language1">Language 1</label>
                                        <select class="form-control" name="language1" id="language1">
                                            @foreach($languages as $language)
                                                <option value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="language2">Language 2</label>
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
                                        <input type="radio" name="visibility" value="public">Public</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="visibility" value="private" checked>Private</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <button class="btn btn-danger" id="add-row-btn">Add new row</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-danger" id="delete-row-btn">Delete last row</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection