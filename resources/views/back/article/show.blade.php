@extends('back.layout.template')

@section('title', 'Detail Articles - Admin')

@section('content')
{{-- content --}}
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Articles</h1>
    </div>

    <div class="mt-3">
       
        <table class="table table-striped table-bordered">
           <tr>
                <th width="250px">Title</th>
                <th>: {{ $article->title }}</th>
           </tr>
           <tr>
                <th>Category</th>
                <th>: {{ $article->Category->name }}</th>
           </tr>
           <tr>
                <th>description</th>
                <th>: {!! $article->desc !!}</th>
           </tr>
           <tr>
                <th>Image</th>
                <td>
                    <a href="{{ asset('storage/back/'.$article->img) }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('storage/back/'.$article->img) }}" alt="" width="20%">
                </a>
                </td>
           </tr>
           <tr>
                <th>views</th>
                <th>: {{ $article->views }}</th>
           </tr>
           <tr>
                <th>status</th>
                @if ($article->status == 1)
                    <td>: <span class="badge bg-success">Published</span></td>
                @else
                    <td>: <span class="badge bg-danger">private</span></td>
                @endif
           </tr>
           <tr>
                <th>Publish date</th>
                <th>: {{ $article->publish_date }}</th>
           </tr>
           <tr>
                <th>Writer</th>
                <th>: {{ $article->User->name }}</th>
           </tr>
        </table>
        <div class="float-end">
            <a href="{{ url('article') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</main>
@endsection

