@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {{ $deck['name'] }} deck
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="/deck/{{ $deck['id'] }}/all">See all words</a>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <a href="/deck/once/{{ $deck['id'] }}/{{ $deck['language1_id'] }}/{{ $deck['language2_id'] }}">Learn {{ $deck['language1']['code'] }}
                                        / {{ $deck['language2']['code'] }}</a>
                                </p>
                                <p>
                                    <a href="/deck/multi/{{ $deck['id'] }}/{{ $deck['language1_id'] }}/{{ $deck['language2_id'] }}">Learn {{ $deck['language1']['code'] }}
                                        / {{ $deck['language2']['code'] }} multi</a>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <a href="/deck/once/{{ $deck['id'] }}/{{ $deck['language2_id'] }}/{{ $deck['language1_id'] }}">Learn {{ $deck['language2']['code'] }}
                                        / {{ $deck['language1']['code'] }}</a>
                                </p>
                                <p>
                                    <a href="/deck/multi/{{ $deck['id'] }}/{{ $deck['language2_id'] }}/{{ $deck['language1_id'] }}">Learn {{ $deck['language2']['code'] }}
                                        / {{ $deck['language1']['code'] }} multi</a>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <a href="/deck/test/{{ $deck['id'] }}">Check your knowledge</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection