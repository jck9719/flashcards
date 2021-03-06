@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                               Zestawy w dziale {{ $subcategory['name'] }}
                                <p><small>(Twoje prywatne zestawy są oznaczone kolorem zielonym)</small></p>
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Cofnij</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($decks as $deck)
                                <li class="list-group-item"
                                    @if(!$deck['public'])
                                        style="background: #6cd84e"
                                    @endif
                                >
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="/deck/{{ $deck['id'] }}">{{ $deck['name'] }}</a>
                                            
                                        </div>

                                        @if(Auth::check())
                                            @if(($isSupEd || Auth::id() == $deck['user_id']) && Auth::user()->role_id != 1)
                                                <div class="col-md-3 text-center pd">
                                                    <a class="btn btn-primary" href="/deck/{{ $deck['id'] }}/edit">
                                                        <span class="btn-text"><i
                                                                    class="fas fa-pencil-alt"></i> Edytuj</span>
                                                    </a>
                                                </div>
                                            @endif
                                            @if(Auth::id() == $deck['user_id'] && Auth::user()->role_id != 1)
                                                <div class="col-md-3 text-center pd">
                                                    <form action="/deck/{{ $deck['id'] }}"
                                                          method="post">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger pull-right"
                                                                aria-label="Left Align">
                                                            <span class="btn-text">
                                                                <i class="fas fa-trash-alt"></i>Usuń
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="divider" style="margin-top: 20px"></div>
                        @if(Auth::check() && Auth::user()->role_id != 1)
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 text-center">
                                    <a href="/category/{{ $subcategory['id'] }}/subcategory/{{ $subcategory['id'] }}/decks/add" class="btn btn-success"
                                       aria-label="Left Align">
                                        <span class="btn-text"><i
                                                    class="fas fa-plus-circle"></i>Dodaj nowy zestaw</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection