@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Panel Administratora
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url('/panel') }}">Cofnij</a>
                            </div>
                        </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($cats as $category)
                            
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            {{ $category['name'] }}
                                        </div>
                                                <div class="col-md-2 text-center pd">
                                                    <a class="btn btn-primary pull-right" aria-label="Left Align" href="/cats/{{ $category['id'] }}/update">
                                                        <span class="btn-text"><i class="fas fa-pencil-alt"></i>  Edytuj</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 text-center pd">
                                                    <form action="/cats/{{ $category['id'] }}"
                                                          method="post">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger pull-right" aria-label="Left Align">
                                                            <span class="btn-text">
                                                                <i class="fas fa-trash-alt"></i>  Usuń
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                                 <div class="col-md-2 text-center pd">
                                                    <a class="btn btn-primary pull-right" aria-label="Left Align" href="/subs/{{ $category['id'] }}/create">
                                                        <span class="btn-text"><i class="fas fa-pencil-alt"></i>  Dodaj podkategorię</span>
                                                    </a>
                                                </div>
                                               
                                    </div>
                                </li>
                                
                            @endforeach
                        </ul>
                        <div class="col-md-2 text-center pd">
                                                    <a class="btn btn-primary pull-right" aria-label="Left Align" href="/cats/new/create">
                                                        <span class="btn-text"><i class="fas fa-pencil-alt"></i>Stwórz nową kategorię</span>
                                                    </a>
                                                </div>
                        <div class="divider" style="margin-top: 20px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection