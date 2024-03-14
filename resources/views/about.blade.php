@extends('layouts.main')

@section('content')
    <div class="w-full h-screen d-flex justify-evenly items-center pl-28 gap-20" id='about'>
        <img src="{{ asset('images/icon2.png') }}" alt="About Icon" class="w-[300px]">
        <div class="w-[700px] h-auto d-flex justify-center flex-col gap-5">
            <h1 class="text-4xl font-bunge">TENTANG KAMI</h1>
            <p class="text-xl">Kami adalah komunitas perpustakaan yang didedikasikan untuk para wibu sejati yang mencintai segala hal terkait Jepang, mulai dari manga, anime, light novel, hingga budaya populer Jepang lainnya. <br> <br> Kami bangga menjadi tempat di mana para wibu dapat saling berbagi pengalaman, merekomendasikan karya-karya favorit, dan terus mengembangkan cinta mereka pada budaya Jepang. </p>
            <button class="btn bg-red-200 w-fit px-5 py-3 text-xl font-tektur rounded-xl">Detail</button>
        </div>
    </div>
@endsection