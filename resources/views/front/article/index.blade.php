@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" value="article Blog Rafif Gaming, seputar pemograman dan teknologi mantap">
    <meta name="keyword" value=" article list rafif gaming, artikel rafif hibatullah,artikel kategori rafifganz">
    <meta property="og:title" content="article blog rafif" />
    <meta property="og:url" value="{{ url()->current() }}"> 
    <meta property="og:site_name" content="Blog Rafif"/>
    <meta property="og:description" value="article Blog Rafif Gaming, seputar pemograman dan teknologi mantap"> 
    <meta property="og:image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREUAW3th3XsSWFITuvmr2f3Ob8-dCzehxl_Hzal7XKFQ&s=10"> 
@endpush
@section('title',  'article blog rafif')
@section('content')

    <!-- Page content-->
    <div class="container">
        <div class="mb-3">
             <form action="{{ route('search')}}" method="POST">
                                @csrf
                                <div class="input-group">
                                <input class="form-control" name="keyword" type="text" placeholder="Search articles......."3/>
                                <button class="btn btn-primary" id="button-search" type="submit">submit</button>
                            </div>
                            </form>
        </div>

        @if ($keyword)
            <p>Showing articles with keyword : <b>{{$keyword}}</b></p>
            <a href="{{ url('articles')}}" class="btn btn-secondary btn-sm mb-3">Reset</a>
        @endif

        <div class="row">
            @forelse ($articles as $item)
            <div class="col-lg-6"  data-aos="flip-up">
                <!-- Blog post-->
                            <div class="card mb-4 shadow">
                                <a href="{{ url('p/'. $item->slug)}}"><img class="card-img-top post-img"
                                     src="{{ asset('storage/back/'.$item->img) }}" alt="..." /></a>
                                <div class="card-body card-height">
                                    <div class="small text-muted">
                                        {{ $item->created_at->format('d-m-Y') }} | {{ $item->user->name}} |
                                        <a href="{{ url('category/'. $item->Category->slug)}}">{{ $item->Category->name }}</a>
                                    </div>
                                    <h2 class="card-title h4">{{ $item->title }}</h2>
                                    <p class="card-text">{{ Str::limit(strip_tags($item->desc), 200, '...') }}</p>
                                    <a class="btn btn-primary" href="{{ url('p/'. $item->slug)}}">Read more →</a>
                                </div>
                            </div>
                             </div>
                             @empty
                             <h3>not found</h3>
              @endforelse
           
        </div> 
        {{ $articles->links(0)}}
    </div> 

@endsection