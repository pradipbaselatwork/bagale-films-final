@extends('layouts.admin_layout.admin_layout')
@section('content')
<?php 
use App\Uploadvideo;
use App\Playlist;
use App\Counter;
use App\Team;
$totaluploadvideo = Uploadvideo::count();
$totalplaylist = Playlist::count();
$totalsitevisits = Counter::sum('total_views');
$team = Team::count();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Upload Videos</h3>

                <p>{{ $totaluploadvideo }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('admin.uploadvideo') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Playlist<sup style="font-size: 20px"></sup></h3>

                <p>{{ $totalplaylist }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('admin.playlist') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Total Site Views<sup style="font-size: 20px"></sup></h3>
  
                <p>{{ $totalsitevisits }}</p>
     
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('home') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Our Team<sup style="font-size: 20px"></sup></h3>

                <p>{{ $team }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('admin.team') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


       <!-- Main content -->
       <div class="content">
        <div class="container-fluid">
          <div class="row">
                     <!-- /.col-md-6 -->
                     <div class="col-lg-6">
                      <div class="card">
                        <div class="card-header border-0">
                          <div class="d-flex justify-content-between">
                            <h3 class="card-title">Daily Visit Live Count</h3>
                            <a href="javascript:void(0);"></a>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="d-flex">
                            <p class="d-flex flex-column">
                              {{-- <span class="text-bold text-lg">$18,230.00</span> --}}
                              <span>Daily Visit Live Count</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                              {{-- <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 33.1%
                              </span>
                              <span class="text-muted">Since last month</span> --}}
                            </p>
                          </div>
                          <!-- /.d-flex -->
          
                          <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                          </div>
          
                          <div class="d-flex flex-row justify-content-end">
                            {{-- <span class="mr-2">
                              <i class="fas fa-square text-primary"></i> This year
                            </span>
          
                            <span>
                              <i class="fas fa-square text-gray"></i> Last year
                            </span> --}}
                          </div>
                        </div>
                      </div>
                      <!-- /.card -->
        
                    </div>
                    <!-- /.col-md-6 -->

            {{-- <div class="col-lg-6">
             <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="linechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div> --}}
      
            </div>
   
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection