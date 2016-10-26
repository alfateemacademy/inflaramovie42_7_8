@extends('admin.layouts.master')

@section('page-title')
    User
    <small>Edit</small>
@endsection

@section('breadcrumb')
    <li>
        <a href="{{ route('admin.user.index') }}">Users</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <span>Edit User</span>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-home"></i>
                        <span class="caption-subject bold uppercase"> Edit User</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    @include('admin.layouts._partials.errors')

                    {{ Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'put']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-body">
                                
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        {{ Form::password('password', ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Password Confirmation</label>
                                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
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