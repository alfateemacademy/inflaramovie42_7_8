@extends('admin.layouts.master')

@section('page-title')
Create Person
@endsection

@section('breadcrumb')
<li>
    <a href="{{ route('admin.person.index') }}">People</a>
    <i class="fa fa-angle-right"></i>
</li>
<li><span>Add New</span></li>
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase"> Add New Category</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    @include('admin.layouts._partials.errors')
                    {{ Form::open(['route' => 'admin.person.store', 'method' => 'post', 'files' => true]) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="" class="control-label">Person Name</label>
                                        {{ Form::text('person_name', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Fullname</label>
                                        {{ Form::text('fullname', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Bio</label>
                                        {{ Form::textarea('bio', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Birth Date</label>
                                        {{ Form::text('birth_date', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Birth Place</label>
                                        {{ Form::text('birth_place', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Death Date</label>
                                        {{ Form::text('death_date', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Death Place</label>
                                        {{ Form::text('death_place', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Poster</label>
                                        {{ Form::file('original_poster', ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="#" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection