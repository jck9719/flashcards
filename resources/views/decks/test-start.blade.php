@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {{ $deck['name'] }} - Test!
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/deck/test/{{ $deck['id'] }}" method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary mg float-right">Sprawdź się!</button>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection