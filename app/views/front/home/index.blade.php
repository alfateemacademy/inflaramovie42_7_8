@extends('front.layouts.master')

@section('content')
{{ $name }}
@foreach($movies as $movie)
<div>
    <div class="uk-overlay uk-overlay-hover">
        <img src="/front_assets/img/placeholder.png" alt="Image" >
        <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
        <a class="uk-position-cover" href="{{ route('movie.detail', $movie->slug) }}"></a>
    </div>
    <div class="uk-panel" >
        
        <h5 class="uk-panel-title">{{ $movie->title }}</h5>
        <p>
            <span class="rating">
                <i class="uk-icon-star"></i>
                <i class="uk-icon-star"></i>
                <i class="uk-icon-star"></i>
                <i class="uk-icon-star"></i>
                <i class="uk-icon-star"></i>
            </span>
            <span class="uk-float-right">2016</span>
        </p>
    </div>
</div>
@endforeach

@endsection

@section('pagination')
<div class="uk-margin-large-top uk-margin-bottom">
    {{ $movies->links() }}
    <!-- <ul class="uk-pagination">
        <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
        <li class="uk-active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><span>...</span></li>
        <li><a href="#">20</a></li>
        <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
    </ul> -->
</div>
                        @endsection