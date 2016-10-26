@extends('admin.layouts.master')

@section('page-title')
    Users
@endsection

@section('breadcrumb')
    <li><span class="active">Users</span></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-home"></i>
                        <span class="caption-subject bold uppercase"> Manage Users</span>
                    </div>
                    <div class="actions">
                        <a href="/admin/user/create" class="btn blue btn-circle btn-outline sbold">
                            <i class="fa fa-plus"></i> Add </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-striped table-condensed flip-content" id="tableResellers">
                        <thead class="flip-content">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <form action="/admin/user/{{ $user->id }}/status" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if($user->category_status == 1)
                                        <button type="submit"
                                           class="btn btn-success btn-xs">Active</button>
                                    @else
                                        <button type="submit"
                                           class="btn btn-danger btn-xs">Deactive</button>
                                    @endif
                                    </form>
                                </td>
                                <td class="text-center">
                                	{{ Form::open(['route' => ['admin.user.destroy', $user->id], 'method' => 'DELETE']) }}
                                        
                                        @if(!$user->trashed())
                                        <a href="/admin/user/{{ $user->id }}/edit"
                                           class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit </a>
                                        @endif

                                        @if($user->trashed())
                                            <button type="submit" class="btn btn-outline btn-circle dark btn-sm green">
                                                <i class="fa fa-refresh"></i> Restore
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-outline btn-circle dark btn-sm red">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
                                        @endif
                                   	{{ Form::close() }}
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