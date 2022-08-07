@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
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
    @if(Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('error_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
    @error('url')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @enderror 
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">{{ $title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <form
        @if(!empty($teamdata['id'])) action="{{route('admin.add.edit.team',$teamdata['id'])}}" @else action="{{route('admin.add.edit.team')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"
                  @if(!empty($teamdata['title']))
                  value= "{{$teamdata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                </div>
                <div class="form-group">
                  <label for="position_number">Position Number</label>
                  <input type="text" class="form-control" name="position_number" id="position_number" placeholder="Enter Position Number"
                  @if(!empty($teamdata['position_number']))
                  value= "{{$teamdata['position_number']}}"
                  @else value="{{old('position_number')}}"
                  @endif>
                </div>
                <div class="form-group">
                    <label for="post">Post</label>
                    <input type="text" class="form-control" name="post" id="post" placeholder="Enter Post"
                    @if(!empty($teamdata['post']))
                    value= "{{$teamdata['post']}}"
                    @else value="{{old('post')}}"
                    @endif>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" @if(!empty($teamdata['image']))
                  value= "{{$teamdata['image']}}"
                  @else value="{{old('image')}}"
                  @endif><br>
                  @if(!empty($teamdata['image']))
                  <img src="{{asset($teamdata['image'])}}" width="100" height="100" alt="" srcset=""><a href="">&nbsp;&nbsp;</a> 
                @endif
                </div>    
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="team_type">Type</label>
                <select name="team_type" id="" class="form-control">
                  <option value="0">Select</option>
                  <option value="1"                 
                  @if(!empty($teamdata['team_type']) && $teamdata['team_type'] == 1) 
                  selected =""
                  @endif                 
                  >Core Team</option>
                  <option value="2"
                  @if(!empty($teamdata['team_type']) && $teamdata['team_type'] == 2) 
                  selected =""
                  @endif
                  >Associate Team</option>
                </select>
              </div>
              <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook Link"
                @if(!empty($teamdata['facebook']))
                value= "{{$teamdata['facebook']}}"
                @else value="{{old('facebook')}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram Link"
                @if(!empty($teamdata['instagram']))
                value= "{{$teamdata['instagram']}}"
                @else value="{{old('instagram')}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="youtube">YouTube</label>
                <input type="text" class="form-control" name="youtube" id="youtube" placeholder="YouTube Link"
                @if(!empty($teamdata['youtube']))
                value= "{{$teamdata['youtube']}}"
                @else value="{{old('youtube')}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="tiktok">TikTok</label>
                <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="TikTok Link"
                @if(!empty($teamdata['tiktok']))
                value= "{{$teamdata['tiktok']}}"
                @else value="{{old('tiktok')}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter Link"
                @if(!empty($teamdata['twitter']))
                value= "{{$teamdata['twitter']}}"
                @else value="{{old('twitter')}}"
                @endif>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="20" class="form-control" rows="4"> @if(!empty($teamdata['description']))
                  {{$teamdata['description']}}
                  @else {{old('description')}}
                  @endif</textarea>
              </div>
            </div>
          </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{$button}}</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

