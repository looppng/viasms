@extends('layouts.app')

@section('title') Wallet - home @endsection

@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success mt-5">
                {!! session('success') !!}
            </div>
        @endif

        <div class="row mt-5">
            @if (count($wallets) > 0)
                @foreach ($wallets as $wallet)
                    <div class="col-3">
                        <a style="text-decoration: none; color: black" href="{{ route('wallet.edit', $wallet->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $wallet->name }}</h5>
                                    <p class="card-text">Naudas daudz - € {{ $wallet->amount }}</p>
                                    <a href="#" class="btn btn-primary">Sūtīt naudu</a>
                                    <a href="{{ route('wallet.destroy', $wallet->id) }}" onclick="if (confirm('Tiesham dzest?') == false) return false;" class="btn btn-primary">Dzēst kontu</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nav naudas?</h5>
                            <p class="card-text">Vajag vairāk naudiņas?</p>
                            <a href="{{ route('wallet.create') }}"><button class="btn btn-outline-primary">Izveidot maku</button></a>
                        </div>
                    </div>
                </div>
            @else
                Nav wallet

                <a href="{{ route('wallet.create') }}"><button class="btn btn-outline-primary">Izveidot maku</button></a>
            @endif
        </div>

    </div>


@endsection
