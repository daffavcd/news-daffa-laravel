@extends('layouts.parent')
@section('content')

<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="my-4">Based on Category
        <small>{{$nama->name}}</small>
    </h1>

    @foreach ($data as $item)
    <!-- Blog Post -->
    <?php
            $jumlah_like = App\Like::select(DB::raw('count(*) as jumlah_likes'))->where('id_article', $item->articles_id)->first();
            $jumlah_comment = App\Comment::select(DB::raw('count(*) as jumlah'))->where('id_article', $item->articles_id)->first()
            ?>
    <div class="card mb-4">
        <img class="card-img-top" src="{{ asset('storage/articleImages/'.$item->featured_image) }}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$item->title}}</h2>
            <p class="card-text">{{$item->content}}</p>
            <a href="/article/{{ $item->articles_id }}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{$item->created_at}} |
            <a href="/category/{{$item->category_id}}">{{$item->name}}</a> |
            <img class="like" style="width: 2.5%;cursor: pointer;" src="{{ asset('/images/hatipolos.png') }}" alt="">
            <span class="badge badge-light" id="tampil_likes">{{$jumlah_like->jumlah_likes}}</span>
            <img style="width: 2.5%; ?>" src="{{ asset('/images/speech-bubble.png') }}" alt="">
            <span class="badge badge-light">{{$jumlah_comment->jumlah}}</span>
        </div>
    </div>
    @endforeach


    <!-- Pagination -->

</div>

@endsection