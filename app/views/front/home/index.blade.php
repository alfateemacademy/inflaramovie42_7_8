@extends('front.layouts.master')

@section('content')

{{ getSiteOptionByKey('asif') }}
{{ getSiteOptionByKey('admin_email') }}

<!-- <div>
                                <div class="uk-overlay uk-overlay-hover">
                                    <img src="/front_assets/img/placeholder.png" alt="Image" >
                                    <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                                    <a class="uk-position-cover" href="#"></a>
                                </div>
                                <div class="uk-panel" >
                                    
                                    <h5 class="uk-panel-title">Media title goes here</h5>
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
                            </div> -->

@endsection