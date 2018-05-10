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
                           
                        </div>
                    </div>
                    <div class="row">
    				<div class="col-4 mx-auto">
                        <ul class="list-group">
    						<li class="list-group-item"><a href="/dbusers">Użytkownicy</a></li>
    						<li class="list-group-item"><a href="/cats">Kategorie</a></li>
    						<li class="list-group-item"><a href="/subs">Podkategorie</a></li>
    						<li class="list-group-item"><a href="/sets">Zestawy</a></li>
  						</ul>
					</div>
				</div>
                
				</div>
			</div>
		</div>
	</div>
	@endsection