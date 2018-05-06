@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">You passed all words!</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        Great! What about small <a href="/deck/test/{{ $deck['id'] }}">test</a>?
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