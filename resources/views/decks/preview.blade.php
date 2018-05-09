@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Zestaw {{ $deck['name'] }}
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <div class="row">
                                <div class="col-6">
                                    {{ $deck['language1']['name'] }}
                                </div>
                                <div class="col-6">
                                    {{ $deck['language2']['name'] }}
                                </div>
                            </div>
                            @foreach($words as $word)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6">
                                            {{ $word[$deck['language1']['code']] }}
                                        </div>
                                        <div class="col-6">
                                            {{ $word[$deck['language2']['code']] }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection