@extends('front.layouts.master')

@section('content')
adsfadfsd
    @include('front.movie._partials.list')
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