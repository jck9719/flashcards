@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Edytowanie kategorii {{ $category['name'] }}
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/cats/{{ $category['id'] }}"
                              method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Tytuł</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       placeholder="Enter title" value="{{ $category['name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Opis</label>
                                <textarea class="form-control" name="description" id="description" rows="5"
                                          placeholder="Enter description">{{ $category['description'] }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mg float-right">Edytuj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection