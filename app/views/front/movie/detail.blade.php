@extends('front.layouts.master')

@section('content')
<div class="uk-container uk-container-center uk-width-8-10">
                        <div class="media-container  uk-container-center">
                            <a class="uk-button uk-button-large uk-button-link uk-text-muted" href="index.html"><i class=" uk-icon-arrow-left uk-margin-small-right"></i> Back</a>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-medium-3-10">
                                <div  class="media-cover">
                                    <img src="/uploads/movies/posters/{{ $movie->original_poster }}" alt="Image" class="uk-scrollspy-inview uk-animation-fade">
                                </div>
                                <a class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-top" href="login.html"><i class="uk-icon-television uk-margin-small-right"></i> Watch Now</a>
                                <a class="uk-button uk-button-link uk-text-muted uk-button-large uk-width-1-1 uk-margin-top" href="login.html"><i class="uk-icon-heart uk-margin-small-right"></i> Add to Favourites</a>
                            </div>
                            <div class="uk-width-medium-7-10">
                                <div class="">
                                    <ul class="uk-tab uk-tab-grid " data-uk-switcher="{connect:'#media-tabs'}">
                                        <li class="uk-width-medium-1-3 uk-active"><a href="#">Description</a></li>
                                        <li class="uk-width-medium-1-3"><a href="#">Reviews</a></li>
                                        <li class="uk-width-medium-1-3"><a href="#">Trailer</a></li>
                                        <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Active</a><div class="uk-dropdown uk-dropdown-small uk-dropdown-up"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li></ul>
                                    </div>

                                    <ul id="media-tabs" class="uk-switcher">

                                         <!--     start Tab Panel 1 (Reviews Sections) -->

                                        <li>
                                            <h2 class="uk-text-contrast uk-margin-large-top">{{ $movie->title }} <span class="rating uk-margin-small-left uk-h4 uk-text-warning">
                                                <i class="uk-icon-star "></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                                <i class="uk-icon-star"></i>
                                            </span></h2>
                                            <ul class="uk-subnav uk-subnav-line">
                                                <li ><i class="uk-icon-star uk-margin-small-right"></i> 9.5</li>
                                                <li><i class="uk-icon-clock-o uk-margin-small-right"></i> 108 Mins</li>
                                                <li>    March 04, 2016</li>
                                            </ul>
                                            <hr>
                                            <p class="uk-text-muted uk-h4">{{ $movie->description }}</p>
                                            <dl class="uk-description-list-horizontal uk-margin-top">
                                                <dt>Starring</dt>
                                                <dd><ul class="uk-subnav ">
                                                    @foreach($movie->actors as $actor)
                                                    <li><a href="#">{{ $actor->person_name }}</a></li>
                                                    @endforeach
                                                </ul></dd>
                                                <dt>Genres</dt>
                                                <dd><ul class="uk-subnav">
                                                    @foreach(explode(", ", $movie->genres) as $genre)
                                                    <li><a href="{{ route('genre.detail', strtolower($genre)) }}">{{ $genre }} </a></li>
                                                    @endforeach
                                                </ul></dd>
                                            </dl>

                                            </li>

                                            <!--    ./ Tab Panel 1  -->

                                          <!--     start Tab Panel 2  (Reviews Section) -->

                                            <li>
                                                <div class="uk-margin-small-top">
                                                    <h3 class="uk-text-contrast uk-margin-top">Post a Review</h3>
                                                    <div class="uk-alert uk-alert-warning" data-uk-alert="">
                                                        <a href="" class="uk-alert-close uk-close"></a>
                                                        <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> Please <a class="uk-text-contrast" href="login.html"> Log in</a> or Sign up to post reviews quicker.</p>
                                                    </div>
                                                    <form class="uk-form uk-margin-bottom">
                                                        <div class="uk-form-row">
                                                            <textarea class="uk-width-1-1" cols="30" rows="5" placeholder="Type your review here..."></textarea>
                                                            <p class="uk-form-help-block">The <code>.uk-form-help-block</code> class creates an associated paragraph.</p>
                                                        </div>
                                                        <div class="uk-form-row">
                                                            <a href="" class="uk-button uk-button-large uk-button-success uk-float-right">Post</a>
                                                        </div>
                                                    </form>
                                                    </div>

                                                    <div  class="uk-scrollable-box uk-responsive-width " data-simplebar-direction="vertical">
                                                        <ul class="uk-comment-list uk-margin-top" >
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                                                        <img class="uk-comment-avatar uk-border-circle" src="assets/img/avatar3.jpg" width="50" height="50" alt="">
                                                                        <h4 class="uk-comment-title">@movielover</h4>
                                                                        <div class="uk-comment-meta">2 days ago </div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                                                        <img class="uk-comment-avatar uk-border-circle" src="assets/img/avatar1.jpg" width="50" height="50" alt="">
                                                                        <h4 class="uk-comment-title">@movielover</h4>
                                                                        <div class="uk-comment-meta">5 days ago </div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                                                        <img class="uk-comment-avatar uk-border-circle" src="assets/img/avatar4.svg" width="50" height="50" alt="">
                                                                        <h4 class="uk-comment-title">@movielover</h4>
                                                                        <div class="uk-comment-meta">23 days ago </div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                                                        <img class="uk-comment-avatar uk-border-circle" src="assets/img/avatar3.jpg" width="50" height="50" alt="">
                                                                        <h4 class="uk-comment-title">@movielover</h4>
                                                                        <div class="uk-comment-meta">7 days ago </div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                                                        <img class="uk-comment-avatar uk-border-circle" src="assets/img/avatar2.jpg" width="50" height="50" alt="">
                                                                        <h4 class="uk-comment-title">@movielover</h4>
                                                                        <div class="uk-comment-meta">84 days ago </div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                            <li>
                                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                                    <header class="uk-comment-header">
                                                                        <img class="uk-comment-avatar uk-border-circle" src="assets/img/avatar1.jpg" width="50" height="50" alt="">
                                                                        <h4 class="uk-comment-title">@movielover</h4>
                                                                        <div class="uk-comment-meta">3 days ago </div>
                                                                    </header>
                                                                    <div class="uk-comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                                    </div>
                                                                </article>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                               <!--     ./ Tab Panel 2  -->


                                               <!--     start Tab Panel 3 (Trailer Section)  -->

                                                <li>
                                                    <div class="uk-cover uk-margin-top" style="height: 400px;">
                                                        <iframe data-uk-cover src="http://www.youtube.com/embed/YE7VzlLtp-4?autoplay=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;loop=1&amp;modestbranding=1&amp;wmode=transparent" width="560" height="315" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                </li>

                                               <!--     ./ Tab Panel 3  -->


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection