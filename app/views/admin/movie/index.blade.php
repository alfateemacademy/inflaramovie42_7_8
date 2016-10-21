@extends('admin.layouts.master')

@section('page-title')
    Movies
@endsection

@section('breadcrumb')
    <li><span class="active">Movies</span></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-home"></i>
                        <span class="caption-subject bold uppercase"> Manage Movies</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('admin.movie.create') }}" class="btn blue btn-circle btn-outline sbold">
                            <i class="fa fa-plus"></i> Add </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <select name="per_page" class="form-control">
                            <option value="">Per Page</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select></div>
                    </div>
                    <div class="col-md-offset-6 col-md-4">
                        {{ Form::open(['method' => 'GET']) }}
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Search</button>
                          </span>
                        </div><!-- /input-group -->
                        {{ Form::close() }}
                    </div>
                </div>
                <br><br>
                    @if(count($movies) > 0)
                    <table class="table table-striped table-condensed flip-content" id="tableResellers">
                        <thead class="flip-content">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Actors</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->title }}</td>
                                <td>
                                    <ul>
                                    @foreach($movie->categories as $category)
                                        <li>{{ $category->category_name }}</li>
                                    @endforeach
                                    
                                    {{--<span class="label label-info">
                                        {{ count($movie->categories) }}
                                    </span>--}}

                                    </ul>
                                </td>
                                <td>
                                    <a href="/admin/movie/{{ $movie->id }}/actor" class="btn btn-warning btn-xs">Manage Actors</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.movie.status', $movie->id) }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if($movie->movie_status == 1)
                                        <button type="submit"
                                           class="btn btn-success btn-xs">Active</button>
                                    @else
                                        <button type="submit"
                                           class="btn btn-danger btn-xs">Deactive</button>
                                    @endif
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.movie.destroy', $movie->id) }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('admin.movie.edit', $movie->id) }}"
                                           class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit </a>

                                        <button type="submit" class="btn btn-outline btn-circle dark btn-sm red">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $movies->appends(['search' => Input::get('search')])->links() }}
                    </div>
                    @else
                        <div class="alert alert-info">
                            No movie(s) found.
                        </div>
                    @endif

                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection