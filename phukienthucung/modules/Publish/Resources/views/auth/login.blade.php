@extends('publish::layouts.master')
@section('content')
    <form action="{{ route('publish.login') }}" method="POST">
        @csrf
        <input type="email" name="email" required>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
@endsection
