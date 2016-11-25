@foreach($movies as $movie)
<div>
    <div class="uk-overlay uk-overlay-hover">
        <img src="/uploads/movies/posters/{{ $movie->original_poster }}" alt="Image" >
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