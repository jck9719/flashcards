@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/c3.min.css') }}" rel="stylesheet">
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="{{ asset('js/c3.min.js') }}"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                Twoje wyniki
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <a href="/">Przejdź do strony głównej</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var chart = c3.generate({
            bindto: '#chart',
            data: {
                columns: [
        ['data1', 30, 200, 100, 400, 150, 250],
        ['data2', 50, 20, 10, 40, 15, 25]
                ]
            },
            zoom: {
                enabled: true
            }
        });
    </script>
@endsection