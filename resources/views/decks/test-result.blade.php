@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {{ $deck['name'] }} Wyniki
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                    <a href="/deck/{{ $deck['id'] }}">Wróć do zestawu</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">Twój wynik to: {{ $result['percentage'] * 100 }}%!!!</h3>
                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>
                            @foreach($wrongs as $wrongInput => $wrongExpected)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       value="{{ $wrongInput }}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       value="{{ $wrongExpected }}"
                                                       disabled>
                                            </div>
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