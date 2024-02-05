@extends('layouts.app')

@section('title') Wallet - create @endsection

@section('content')

    <div class="container">
        <h2 class="mt-5">Pievienot jaunu wallet</h2>
        <form action="{{ route('wallet.store') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3 col-4">
                <input type="text" name="wallet_name" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Izveidot</button>
        </form>
    </div>

@endsection
