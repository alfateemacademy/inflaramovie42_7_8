@extends('admin.layouts.master')

@section('header.plugins')
    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Manage Movie Actors
@endsection

@section('breadcrumb')
    <li><span class="active">Manage Movie Actors</span></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-plus"></i>
                        <span class="caption-subject bold uppercase"> Add Actor</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    {{ Form::open(['route' => ['admin.movie.actor.add', $movie->id], 'method' => 'post']) }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::select('actor_id', $people, null, ['class' => 'form-control select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::text('char_name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-home"></i>
                        <span class="caption-subject bold uppercase"> {{ $movie->title }}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-striped table-condensed flip-content" id="tableResellers">
                        <thead class="flip-content">
                        <tr>
                            <th>Actor Name</th>
                            <th>Character Name</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($movie->actors as $actor)
                                <tr>
                                    <td>{{ $actor->fullname }}</td>
                                    <td>{{ $actor->pivot->char_name }}</td>
                                    <td class="text-center">
                                        {{ Form::open(['route' => ['admin.movie.actor.destroy', $movie->id, $actor->id], 'method' => 'DELETE']) }}
                                        <button type="submit" class="btn btn-outline btn-circle dark btn-sm red">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </button>
                                        {{ Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection

@section('footer.plugins')  
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>
@endsection