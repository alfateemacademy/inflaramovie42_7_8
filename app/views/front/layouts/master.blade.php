<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Webflix - Streaming Media Theme - Homepage v1</title>
        <link rel="apple-touch-icon-precomposed" href="/front_assets/img/apple-touch-icon.png">
        <!--     Include UIKit CSS   -->
        <link rel="stylesheet" href="/front_assets/css/uikit.min.css">
        <!--     Theme CSS   -->
        <link rel="stylesheet" href="/front_assets/css/theme.css">
    </head>
    <body>

        <!--     start Header Section   -->
        <nav id="tm-topbar" class=" uk-navbar uk-contrast ">
            <div class="uk-container uk-container-center ">
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li>
                        <a href="#"><i class="uk-icon-facebook-square uk-icon-small"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uk-icon-twitter-square uk-icon-small"></i></a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="uk-icon-instagram uk-icon-small"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uk-icon-pinterest uk-icon-small"></i></a>
                    </li>
                    
                </ul>
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav uk-hidden-small">
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                        
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </nav>
        <nav id="tm-header" class="uk-navbar  ">
            <div class="uk-container uk-container-center ">
                <a class="uk-navbar-brand uk-hidden-small" href="index.html"><i class="uk-icon-small uk-text-primary uk-margin-small-right uk-icon-play-circle"></i> WEBFLIX</a>
                
                <form class="uk-search uk-margin-small-top uk-margin-left uk-hidden-small">
                    <input class="uk-search-field" type="search" placeholder="Search..." autocomplete="off">
                    <div class="uk-dropdown uk-dropdown-flip uk-dropdown-search" aria-expanded="false"></div></form>
                    <div class="uk-navbar-flip uk-hidden-small">
                        <div class="uk-button-group">
                            <a class="uk-button uk-button-link uk-button-large" href="signup.html">Sign up</a>
                            <a class="uk-button uk-button-success uk-button-large uk-margin-left" href="login.html"><i class="uk-icon-lock uk-margin-small-right"></i> Log in</a>
                        </div>
                    </div>
                    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small uk-icon-medium" data-uk-offcanvas></a>
                    <div class="uk-navbar-flip uk-visible-small">
                        <a href="#offcanvas" class="uk-navbar-toggle uk-navbar-toggle-alt uk-icon-medium" data-uk-offcanvas></a>
                    </div>
                    <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><i class="uk-icon-small uk-text-primary uk-margin-small-right uk-icon-play-circle"></i> Webflix</div>
                </div>
            </nav>
            <!--     ./ Header Section   -->


            <!--     start Main Section   -->
            <div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
                
                <div class="uk-grid">
                    <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">
                        <div class="uk-panel">
                            <ul class="uk-nav  uk-nav-side uk-nav-parent-icon uk-margin-bottom" data-uk-nav="">
                                <li class="uk-active"><a href="#">Featured</a></li>
                                <li><a href="#">Movies</a></li>
                                <li><a href="#">TV Shows</a></li>
                                <li><a href="#">Music</a></li>
                                <li class="uk-parent ">
                                    <a href="#">Genre</a>
                                    <ul class="uk-nav-sub">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Animation</a> </li>
                                        <li><a href="#">Anime</a> </li>
                                        <li><a href="#">Adventure</a> </li>
                                        <li><a href="#">Biography</a> </li>
                                        <li><a href="#">Comedy</a> </li>
                                        <li><a href="#">Crime</a> </li>
                                        <li><a href="#">Romance</a> </li>
                                        <li><a href="#">Documentary</a> </li>
                                    </ul>
                                </li>
                                <li class="uk-nav-divider"></li>
                            </ul>
                            <ul class="uk-nav uk-nav-comments uk-nav-side" data-uk-nav="">
                                <li class="uk-nav-header uk-margin-small-bottom">Latest Comments</li>
                                <li><a href="#">Media title goes here<div> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam </div></a></li>
                                <li><a href="#">Media title goes here<div> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium </div></a></li>
                                <li><a href="#">Media title goes here<div> vel illum qui dolorem eum fugiat quo voluptas nulla pariatu </div></a></li>
                                
                                <li class="uk-nav-divider"></li>
                            </ul>
                            <div class="uk-panel">
                                <h5 class="uk-panel-header uk-margin-top widget-header">Quick Login</h5>
                                <form class="uk-form ">
                                    <fieldset>
                                        <div class="uk-form-row">
                                            <input type="text" placeholder="Username" class="uk-width-1-1">
                                        </div>
                                        <div class="uk-form-row">
                                            <input type="password" placeholder="Password" class="uk-width-1-1">
                                        </div>
                                        
                                        <div class="uk-form-row">
                                            <label><input type="checkbox"> Remember me</label>
                                        </div>
                                        <div class="uk-form-row">
                                            <button class="uk-button uk-button-success uk-width-1-1">log in</button>
                                            <a href="#" class="uk-button uk-button-link uk-button-small uk-margin-top ">forgot?</a>
                                            <a href="#" class="uk-button uk-button-link uk-button-small uk-margin-top uk-text-muted uk-float-right">Sign up</a>
                                        </div>
                                        
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
                        <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-5" data-uk-grid="{gutter: 20}">
                            @yield('content')
                        </div>
                        <div class="uk-margin-large-top uk-margin-bottom">
                            <ul class="uk-pagination">
                                <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                                <li class="uk-active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><span>...</span></li>
                                <li><a href="#">20</a></li>
                                <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--     ./ Main Section   -->

            <!--     start Footer Section   -->

            <footer id="tm-footer" class="uk-block uk-block-secondary uk-block-small ">
                <div class="uk-container-center uk-container">
                    <div class="uk-grid">
                        <div class="uk-width-medium-3-10"><div class="copyright-text">&copy; 2016 <span class="uk-text-bold">Webflix</span> - Streaming Media Theme</div></div>
                        <div class="uk-width-medium-5-10">
                            <ul class="uk-subnav ">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">FAQ's</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul></div>
                            <div class="uk-width-medium-2-10">
                                <div class=" uk-float-right"><ul class="uk-subnav">
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-facebook-square"></a></li>
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-twitter"></a></li>
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-instagram"></a></li>
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-pinterest"></a></li>
                                </ul></div></div>
                            </div>
                        </div>
                    </footer>

                    <!--     start Offcanvas Menu   -->

                    <div id="offcanvas" class="uk-offcanvas">
                        <div class="uk-offcanvas-bar">
                            <div class="uk-panel">
                                <form class="uk-search">
                                    <input class="uk-search-field" type="search" placeholder="Search...">
                                </form>
                                <div class="uk-button-group">
                                    <a class="uk-button uk-button-link uk-button-large uk-text-muted" href="signup.html">Sign up</a>
                                    <a class="uk-button uk-button-success uk-button-large uk-margin-left" href="login.html"><i class="uk-icon-lock uk-margin-small-right"></i> Log in</a>
                                </div>
                            </div>
                            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
                                <li class="uk-active">
                                    <a href="#">Featured</a>
                                </li>
                                <li>
                                    <a href="#">Movies</a>
                                </li>
                                <li>
                                    <a href="index.html">TV Shows</a>
                                </li>
                                
                                <li>
                                    <a href="index.html.html">Music</a>
                                </li>
                                <li class="uk-parent">
                                    <a href="#">Genre</a>
                                    <ul class="uk-nav-sub">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Animation</a> </li>
                                        <li><a href="#">Anime</a> </li>
                                        <li><a href="#">Adventure</a> </li>
                                        <li><a href="#">Biography</a> </li>
                                        <li><a href="#">Comedy</a> </li>
                                        <li><a href="#">Crime</a> </li>
                                        <li><a href="#">Romance</a> </li>
                                        <li><a href="#">Documentary</a> </li>
                                    </ul>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li class="uk-nav-header">Pages</li>
                                <li><a href=""> Home</a></li>
                                <li><a href=""> FAQ's</a></li>
                                <li><a href=""> Terms & Conditions</a></li>
                                <li><a href=""> Privacy Policy</a></li>
                                <li><a href=""> Contact Us</a></li>
                            </ul>
                            <div class="uk-panel uk-text-center">
                                <ul class="uk-subnav">
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-facebook-square"></a></li>
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-twitter"></a></li>
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-instagram"></a></li>
                                    <li><a href="#" class="uk-icon-hover uk-icon-medium uk-icon-pinterest"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--     ./ Offcanvas Menu   -->

                    <!--     Include JS   -->

                    <script src="/front_assets/js/jquery.js"></script>
                    <script src="/front_assets/js/uikit.min.js"></script>
                    <script src="/front_assets/js/components/grid.min.js"></script>

                </body>
            </html>