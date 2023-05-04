@extends('layouts.new')

@section('content')
<section class="form-container">

    <form action="{{ route('profile.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <h3>update profile</h3>
        <input type="text" required maxlength="20" name="name" placeholder="enter your name" class="box" value="{{ $user->name }}">
        <input type="email" required maxlength="50" name="email" placeholder="enter your email" class="box" value="{{ $user->email }}">
        {{-- <input type="numner" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" placeholder="enter your number" required class="box" name="number" value="1234567890"> --}}
        <input type="password" maxlength="20" name="password" placeholder="Enter your password (If you want to change it)" class="box">
        {{-- <input type="password" maxlength="20" name="new_pass" placeholder="enter your new password" class="box"> --}}
        {{-- <input type="password" maxlength="20" name="confirm_pass" placeholder="con" class="box"> --}}
        <textarea name="alamat" id="" cols="30" rows="10" class="box">{{ $user->alamat }}</textarea>
        <input type="number" name="no_hp" value="{{$user->no_hp}}" class="box">
        <input type="submit" value="update now" class="btn" name="submit">
    </form>

</section>
@endsection