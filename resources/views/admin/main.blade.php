@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Panel Administratora
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
    						<li class="list-group-item"><a href="#">Użytkownicy</a></li>
    						<li class="list-group-item"><a href="#">Kategorie</a></li>
    						<li class="list-group-item"><a href="#">Podkategorie</a></li>
    						<li class="list-group-item"><a href="#">Zestawy</a></li>
  						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>