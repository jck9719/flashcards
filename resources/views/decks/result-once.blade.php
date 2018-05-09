@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                @if(count($words) == 0)
                                    Świetnie! Wpisałeś poprawnie wszystkie słówka!
                                @else
                                    Musisz się jeszcze nauczyć tych słówek:
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="/deck/{{ $deck['id'] }}">Cofjnij się do zestawu</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        @if(count($words) == 0)
                            <a href="/deck/test/{{ $deck['id'] }}">Co powiesz na test?</a>
                        @else
                            <ul class="list-group">
                                <div class="row">
                                    <div class="col-6">
                                        {{ $lan1['name'] }}
                                    </div>
                                    <div class="col-6">
                                        {{ $lan2['name'] }}
                                    </div>
                                </div>
                                @foreach($words as $word)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           value="{{ $word[$lan1['code']] }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           value="{{ $word[$lan2['code']] }}"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection