@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a>
                                        </div>
                                        <div class="col-md-3">
                                            {{ $category['description'] }}
                                        </div>
                                        @if(Auth::check())
                                            @if(Auth::user()->role_id == 1)
                                                <div class="col-md-2 text-center pd">
                                                    <a class="btn btn-primary pull-right" aria-label="Left Align" href="/category/{{ $category['id'] }}/update">
                                                        <span class="btn-text"><i class="fas fa-pencil-alt"></i>  Edit</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 text-center pd">
                                                    <form action="/category/{{ $category['id'] }}"
                                                          method="post">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger pull-right" aria-label="Left Align">
                                                            <span class="btn-text">
                                                                <i class="fas fa-trash-alt"></i>  Delete
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
                        @if(Auth::check() && Auth::user()->role_id == 1)
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 text-center">
                                    <a href="/category/new/create" class="btn btn-warning"
                                       aria-label="Left Align">
                                        <span class="btn-text"><i
                                                    class="fas fa-plus-circle"></i>  Add new category</span>
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