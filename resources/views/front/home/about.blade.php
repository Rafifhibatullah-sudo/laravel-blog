@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" value="about Blog Rafif Gaming, seputar pemograman dan teknologi mantap">
    <meta name="keyword" value=" about rafif gaming, tentant rafif hibatullah, apa itu rafifganz">
    <meta property="og:title" content="aboutLaravel Blog - rafif"/>
    <meta property="og:url" value="{{ url()->current() }}"> 
    <meta property="og:site_name" content="Blog Rafif"/>
    <meta property="og:description" value="about Blog Rafif Gaming, seputar pemograman dan teknologi mantap"> 
    <meta property="og:image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREUAW3th3XsSWFITuvmr2f3Ob8-dCzehxl_Hzal7XKFQ&s=10"> 
@endpush

@section('title', 'About laravel Blog - rafif')

@section('content')
    

        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8"  data-aos="zoom-out">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow">
                        <a href="{{ asset('front/img/png-clipart-laravel-black-logo-tech-companies.png')}}">
                            <img class="card-img-top featured-img" src="{{ asset('front/img/png-clipart-laravel-black-logo-tech-companies.png')}}" alt="About laravel blog" /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ date('d/m/Y') }}</div>
                            <h2 class="card-title">About laravel blog</h2>
                            <p class="card-text">
                               <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores pariatur temporibus
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nostrum veritatis praesentium aliquam facere eveniet, excepturi voluptate unde necessitatibus sunt reprehenderit possimus ea est delectus at perspiciatis saepe magnam, nobis repellat quia ipsam. Commodi eligendi at a soluta magni. Dolorum!
                               </p>
                               <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores pariatur temporibus
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nostrum veritatis praesentium aliquam facere eveniet, excepturi voluptate unde necessitatibus sunt reprehenderit possimus ea est delectus at perspiciatis saepe magnam, nobis repellat quia ipsam. Commodi eligendi at a soluta magni. Dolorum!
                               </p>
                               <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores pariatur temporibus
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nostrum veritatis praesentium aliquam facere eveniet, excepturi voluptate unde necessitatibus sunt reprehenderit possimus ea est delectus at perspiciatis saepe magnam, nobis repellat quia ipsam. Commodi eligendi at a soluta magni. Dolorum!
                               </p>
                               <ul>
                                    <li><a href="https://youtube.com">youtube</a></li>
                                    <li><a href="https://facebook.com">facebook</a></li>
                                    <li><a href="https://instagram.com">instagram</a></li>
                               </ul>
                            </p>
                        </div>
                    </div>           
                </div>

                <!-- Side widgets-->
                @include('front.layout.side-widget')
            </div>
        </div>
        

@endsection