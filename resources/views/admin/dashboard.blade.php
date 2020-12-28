@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Hello ADMINISTRATOR, You are logged in!') }}
                    </div>
                </div>
            </div>
            <div style="width:75%; padding-top: 50px;">
                {!! $chartjs->render() !!}
            </div>

            <div style="padding-top: 50px;">
                <a href="{{ route('excel.export', ['invoice' => $invoiceCount, 'order' => $orderCount])}}" class="btn btn-dark">Excel Export</a>
            </div>
        </div>
    </div>
@endsection

@section('jsfile')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
@endsection
