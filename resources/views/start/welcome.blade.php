@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorie</div>
                    <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a>
                                        </div>
                                        <div class="col-md-3">
                                            {{ $category['description'] }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="divider" style="margin-top: 20px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection