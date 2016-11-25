@extends('front.layouts.master')

@section('content')
    Movies
    @include('front.movie._partials.list')
@endsection

@section('pagination')
    <div class="uk-margin-large-top uk-margin-bottom">
        {{ $movies->links() }}
    </div>
@endsection