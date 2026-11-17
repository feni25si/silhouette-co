@extends('layouts.auth')
@section('title', 'Login Admin')

@section('content')
    <h1>Login Admin</h1>
    <p class="muted">Silhouette &amp; Co. — dashboard penjahit</p>

    <x-alert />

    <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf
        <x-form.input name="email" label="Email" type="email" required autofocus />
        <x-form.input name="password" label="Kata sandi" type="password" required />
        <label class="check"><input type="checkbox" name="remember"> Ingat saya</label>
        <button class="btn" type="submit">Masuk</button>
    </form>

    <p class="switch">Belum punya akun? <a href="{{ route('admin.register') }}">Daftar</a></p>
@endsection