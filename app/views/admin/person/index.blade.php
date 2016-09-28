@extends('admin.layouts.master')

@section('page-title')
People
@endsection

@section('breadcrumb')
<li>
	<span>People</span>
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
                        <span class="caption-subject bold uppercase"> Manage People</span>
                    </div>
                    <div class="actions">
                        <a href="/admin/person/create" class="btn blue btn-circle btn-outline sbold">
                            <i class="fa fa-plus"></i> Add </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th>ID</th>
                            <th>Person Name</th>
                            <th>Fullname</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($people as $person)
                            <tr>
                                <th>{{ $person->id }}</th>
                                <th>{{ $person->person_name }}</th>
                                <th>{{ $person->fullname }}</th>
                                <th class="text-center">
                                    <form action="/admin/person/{{ $person->id }}/status" method="post">
                                        <input type="hidden" name="_method" value="PUT">
                                        @if($person->category_status == 1)
                                            <button type="submit" class="btn btn-success btn-xs">Active</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-xs">Deactive</button>
                                        @endif
                                    </form>
                                </th>
                                <th class="text-center">
                                    <form action="/admin/person/{{ $person->id }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="/admin/person/{{ $person->id }}/edit"
                                           class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit </a>

                                        <button type="submit" class="btn btn-outline btn-circle dark btn-sm red">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </button>
                                    </form>
                                </th>
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