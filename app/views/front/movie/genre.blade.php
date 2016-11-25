@extends('front.layouts.master')

@section('content')
    
    <!-- <div class="row">
    	<div class="col-md-12">
    		<h1>Genre {{ $genre }}</h1>
    	</div>
    </div> -->

    @include('front.movie._partials.list')
<h1>Recent</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
     @include('front.movie._partials.list', ['movies' => $latestMovies])

@endsection

@section('pagination')
    <div class="uk-margin-large-top uk-margin-bottom">
        {{ $movies->links() }}
    </div>
@endsection