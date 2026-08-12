@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" value="all category Blog Rafif Gaming, seputar pemograman dan teknologi mantap">
    <meta name="keyword" value=" all category list rafif gaming, kategori rafif hibatullah,daftar kategori rafifganz">
    <meta property="og:title" content="all Category" />
    <meta property="og:url" value="{{ url()->current() }}"> 
    <meta property="og:site_name" content="Blog Rafif"/>
    <meta property="og:description" value="all category Blog Rafif Gaming, seputar pemograman dan teknologi mantap"> 
    <meta property="og:image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREUAW3th3XsSWFITuvmr2f3Ob8-dCzehxl_Hzal7XKFQ&s=10"> 
@endpush

@section('title',  'all Category')

@section('content')

<div class="container">
    <p>Showing all articles with category </b></p>
    
    <div class="row">
        @foreach ($category as $item)   
        <div class="col-lg-3 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <span>
                            <a href="{{ url('category/'.$item->slug)}}" class="text-decoration-none text-dark">
                          
                            <i class="fas fa-folder fa-5x"></i>
                        </a>
                        </span>
                    <h6 class="card-title mt-2">
                        <a href="{{ url('category/'.$item->slug)}}" class="text-decoration-none text-dark">
                            {{ $item->name}} ({{ $item->articles_count }})
                        </a>
                    </h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        
        
        {{-- {{ $articles->links()}} --}}
    </div>   

@endsection