@extends('layouts.new')

@section('content')
<section class="user-profile">

    <div class="user">
        <h3> Profil Saya </h3>
        <i class="fas fa-user"></i>
        <p><i class="fas fa-user" style="font-size: 20px"></i> <span>{{ $user->name }}</span></p>
        <p><i class="fas fa-envelope"></i> <span>{{ $user->email }}</span></p>
        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn">update profile</a>
        <p class="address"><i class="fas fa-map-marker-alt"></i> <span>{{$user->alamat}}</span></p>
    </div>

</section>
@endsection