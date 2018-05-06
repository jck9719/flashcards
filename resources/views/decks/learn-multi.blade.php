@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Learn multi {{ $deck['name'] }}!
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <div class="row">
                                <div class="col-6">
                                    {{ $langToLearn['name'] }}
                                </div>
                                <div class="col-6">
                                    {{ $langToCheck['name'] }}
                                </div>
                            </div>
                            <form action="/deck/multi/{{ $deck['id'] }}/{{ $langToLearn['id'] }}/{{ $langToCheck['id'] }}" method="post">
                                {{ csrf_field() }}
                                @foreach($words as $word)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $word[$langToLearn['code']] }}"
                                                           disabled>
                                                    <input type="hidden" class="form-control" name="{{ $langToLearn['code'] }}[]" value="{{ $word[$langToLearn['code']] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="{{ $langToCheck['code'] }}[]"
                                                           placeholder="Enter translated '{{ $word[$langToLearn['code']] }}'">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <button type="submit" class="btn btn-primary mg float-right">Submit</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection