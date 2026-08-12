@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" value="contact Blog Rafif Gaming, seputar pemograman dan teknologi mantap">
    <meta name="keyword" value=" contact rafif gaming, kontak rafif hibatullah,contact rafifganz">
    <meta property="og:title" content="Contact laravel Blog - rafif"/>
    <meta property="og:url" value="{{ url()->current() }}"> 
    <meta property="og:site_name" content="Blog Rafif"/>
    <meta property="og:description" value="contact Blog Rafif Gaming, seputar pemograman dan teknologi mantap"> 
    <meta property="og:image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREUAW3th3XsSWFITuvmr2f3Ob8-dCzehxl_Hzal7XKFQ&s=10"> 
@endpush

@section('title', 'Contact laravel Blog - rafif')

@section('content')
    

        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8"  data-aos="zoom-in">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow">
                       <div class="text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1020424.5884836775!2d103.83043095000001!3d-2.4958314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3ab6d033619d21%3A0xb0a56875e19b2d78!2sKabupaten%20Musi%20Banyuasin%2C%20Sumatera%20Selatan!5e0!3m2!1sid!2sid!4v1786283021303!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                       </div>
                        <div class="card-body">
                            <div class="small text-muted">{{ date('d/m/Y') }}</div>
                            <h2 class="card-title">contact laravel blog</h2>
                            <p class="card-text">
                               <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores pariatur temporibus
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nostrum veritatis praesentium aliquam facere eveniet, excepturi voluptate unde necessitatibus sunt reprehenderit possimus ea est delectus at perspiciatis saepe magnam, nobis repellat quia ipsam. Commodi eligendi at a soluta magni. Dolorum!
                               </p>
                               <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores pariatur temporibus
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nostrum veritatis praesentium aliquam facere eveniet, excepturi voluptate unde necessitatibus sunt reprehenderit possimus ea est delectus at perspiciatis saepe magnam, nobis repellat quia ipsam. Commodi eligendi at a soluta magni. Dolorum!
                               </p>
                               <ul>
                                <li>Phone : +620705720423</li>
                                <li>email admin 1 : {{ $config['email']}} </li>
                                    <li><a href="https://youtube.com/{{ $config['youtube'] }}">Youtube</a></li>
                                    <li><a href="https://facebook.com/{{ $config['facebook'] }}">facebook</a></li>
                                    <li><a href="https://instagram.com/{{ $config['instagram'] }}">instagram</a></li>
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