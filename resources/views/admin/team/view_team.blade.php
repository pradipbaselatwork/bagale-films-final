@extends('layouts.admin_layout.admin_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catelogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Team</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Team</h3>
             <a href="{{route('admin.add.edit.team')}}" style="max-width: 120px; float:right; display:inline-block;" class="btn btn-block btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Add Team</a>
            </div>
            <div class="card-body">
              <table id="banner" class="table table-bordered table-striped  text-center">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Team Type</th>
                  <th>Post</th> 
                  <th>Image</th> 
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody>
               @forelse($team as $data)
                  <td>{{$data->id}}</td>
                  <td>{{$data->title}}</td>
                  <td>
                    @if (!empty($data->team_type) && $data->team_type==1)
                    Core Team
                    @endif
                    @if (!empty($data->team_type) && $data->team_type==2)
                    Associate Team
                    @endif
                  </td>
                  <td>{{$data->post}}</td>
                  <td><img src="{{asset($data->image)}}" alt="" width="100" height="100" srcset=""></td>
                  <td>
                    <a href="{{route('admin.add.edit.team', $data->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="javascript:" class="delete_form" record="team"  rel="{{$data->id}}" style="display:inline;">
                      <i class="fa fa-trash fa-" aria-hidden="true" ></i>
                    </a>
                   </td>
                </tr>
                @empty
                <p>No Data</p>
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection



