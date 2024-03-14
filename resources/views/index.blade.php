@extends('layouts.main')

@section('content')

    <div class="w-full h-screen"
    style="
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-image: url({{ asset('images/perpus.png') }})"
    >
        
        <div class="hero d-flex w-full h-screen justify-between items-center pl-28">
            <div class="text-white d-flex justify-center flex-col gap-3 font-garamond bg-gray-900/25 p-8 ">
                <h1 class="text-4xl">BUKU SUMBER PENGETAHUAN</h1>
                <p class="text-xl">Buku adalah cara unik manusia untuk memandang dunia. Buku menjelajahi semua bagian kehidupan, mengubah kehidupan, dan memungkinkan untuk melihat berbagai hal secara berbeda. <br> Buku dapat mengubah hidupmu.</p>
            </div>
            <img src="{{ asset('images/icon1.png') }}" alt="Books Icon">
        </div>
    </div>


    <div class="w-full h-screen d-flex justify-evenly items-center pl-28 gap-20" id='about'>
        <img src="{{ asset('images/icon2.png') }}" alt="About Icon" class="w-[300px]">
        <div class="w-[700px] h-auto d-flex justify-center flex-col gap-5">
            <h1 class="text-4xl font-bunge">TENTANG KAMI</h1>
            <p class="text-xl">Kami adalah komunitas perpustakaan yang didedikasikan untuk para wibu sejati yang mencintai segala hal terkait Jepang, mulai dari manga, anime, light novel, hingga budaya populer Jepang lainnya. <br> <br> Kami bangga menjadi tempat di mana para wibu dapat saling berbagi pengalaman, merekomendasikan karya-karya favorit, dan terus mengembangkan cinta mereka pada budaya Jepang. </p>
            <button class="btn bg-red-200 w-fit px-5 py-3 text-xl font-tektur rounded-xl">Detail</button>
        </div>
    </div>

    <div class="buku">
        @foreach ($books as $book)
        <div class="card">
            <img src="{{ asset('storage/'.$book->foto) }}" alt="Avatar" class="image">
            <div class="overlay">
            <h1 class="judul">{{ $book->judul }}</h1>
            <h3 class="text">{{ $book->author }}</h3>
            </div>
        </div>
        @endforeach
    </div>
@endsection