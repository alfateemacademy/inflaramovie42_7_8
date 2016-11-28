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
            <input type="range" min="0" max="5" step="0.5" value="{{ getAverageRating($movie->ratings->sum('rating'), $movie->ratings->count()) }}" id="backing-{{$movie->id}}">
            <div class="rateit" 
                data-rateit-backingfld="#backing-{{$movie->id}}"
                 data-rateit-resetable="false" 
                data-movieid="{{ $movie->id }}"
                data-rateit-readonly="{{ (!Auth::check()) ? 'true' : 'false' }}">
            </div>
        </p>
    </div>
</div>
@endforeach