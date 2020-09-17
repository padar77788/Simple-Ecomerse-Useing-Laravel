@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="p-4 bg-white">

                        @php
                            echo \App\Policy::where('name', 'cash_on_delivery')->first()->content;
                        @endphp

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
