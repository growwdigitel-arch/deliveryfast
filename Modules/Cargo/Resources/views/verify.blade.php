@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Verify OTP</h2>
    <form action="{{ route('otp.verify') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ request()->email }}">
        <div class="form-group">
            <input type="text" name="otp" required class="form-control" placeholder="Enter OTP">
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
@endsection
