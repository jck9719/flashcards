@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Wpisałeś wszystkie słówka poprawnie!</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        Świetnie, co powiesz na mały <a href="/deck/{{ $deck['id'] }}">test</a>?
                                    </p>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection