@extends('layouts.auth')
@section('title', 'Daftar Admin')

@section('content')
    <h1>Daftar akun</h1>
    <p class="muted">Buat akun admin untuk mengelola Silhouette &amp; Co.</p>

    <x-alert />

    <form method="POST" action="{{ route('admin.register.store') }}">
        @csrf
        <x-form.input name="nama_admin" label="Nama lengkap" required />
        <x-form.input name="nomor_hp" label="Nomor WhatsApp" />
        <x-form.input name="email" label="Email" type="email" required />
        <x-form.input name="password" label="Kata sandi" type="password" required />
        <x-form.input name="password_confirmation" label="Konfirmasi kata sandi" type="password" required />
        <x-form.input name="kode_undangan" label="Kode undangan admin" type="password" required />
        <button class="btn" type="submit">Daftar</button>
    </form>

    <p class="switch">Sudah punya akun? <a href="{{ route('admin.login') }}">Masuk</a></p>
@endsection