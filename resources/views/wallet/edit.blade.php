@extends('layouts.app')

@section('title') Wallet - edit @endsection

@section('content')

    <div class="container">
        <form action="{{ route('wallet.update', $wallet->id) }}" method="GET">
            @csrf
            <div class="mb-3 mt-3 col-4">
                <input type="text" name="wallet_name" value="{{ $wallet->name }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Labot</button>
        </form>
    </div>

@endsection
