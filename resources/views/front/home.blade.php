@extends('layouts.front_layout.front_layout')
@section('content')
<div class="container">
  <div class="tab-bar my-5 video_page"><!-- ./tab-bar starts-->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Home</a> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Playlists</a> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Our Team</a> </li>
      <!--      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Videos </a> </li>-->
      
      <li class="nav-item search_item">
        <div class="form_search">
          <form role="form">
            <input type="search" placeholder="Search" class="form-control" id="search-field">
            <button type="button" class="btn btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
      </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
        <div class="row home mt-0"> 
       
          <div class="col-12">
            <div class="playlist_banner mb-2">
              <div class="banner-slider">
                <div class="owl-carousel owl-theme">

                  @forelse($banner as $data)
                  <div class="item"><img src="{{ asset($data->image) }}"></div>
                  @empty
                  @endforelse

                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="playlist_banner mb-2">

              <div class="banner-slider">
                <figcaption class="video_caption mt-1">
                  <div class="title-bar">
                    <h3>{{$first_home_video->title}}</h3>
                    <span class="ytd-grid-video-title">{{$first_home_video->channel_name}}</span> <span class="ytd-grid-video-view">{{ $first_home_video->views}} views</span> <span class="ytd-grid-stream">{{ $first_home_video->created_at->diffForhumans() }}
                    </span>
                    <p class="mb-0 " > 
                     <div class="test">
                         {!!$first_home_video->description!!}
                     </div>
                    <div class="show-more mt-2"><a href="javascript:void(0)" class="btn"> MORE <i class="fa-solid fa-angle-down"></i></a></div>
                    <div class="show-more-content">
                      <p> 

                      </p>
                      <div class="show-less"> <a href="javascript:void(0)" class="btn"> LESS <i class="fa-solid fa-angle-up"></i></a></div>
                    </div>
                    </p>
                  </div>
                </figcaption>
                <div class="hytPlayerWrapOuter">
                  <div class="hytPlayerWrap video-placement">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/9JDHw2wFd10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--<ul>-->
            @forelse($video as $data)
            <div class="col-12">
            <div class="playlist_banner mb-2">
              <div class="banner-slider">
                <figcaption class="video_caption mt-1">
                  <div class="title-bar">
                    <h3>{{$data->title}}</h3>
                    <span class="ytd-grid-video-title">{{$first_home_video->channel_name}}</span> <span class="ytd-grid-video-view">{{ $data->views}} views</span> <span class="ytd-grid-stream">{{ $data->created_at->diffForhumans() }}
                    </span>
                    <p class="mb-0"> 
                      {!!$data->description!!}
                    <div class="show-more mt-2"><a href="javascript:void(0)" class="btn"> MORE <i class="fa-solid fa-angle-down"></i></a></div>
                    <div class="show-more-content">
                      <p> 

                      </p>
                      <div class="show-less"> <a href="javascript:void(0)" class="btn"> LESS <i class="fa-solid fa-angle-up"></i></a></div>
                    </div>
                    </p>
                  </div>
                </figcaption>
                <div class="hytPlayerWrapOuter">
                  <div class="hytPlayerWrap video-placement">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/9JDHw2wFd10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  </div>
                </div>
              </div>
            </div>
          </div>

            @empty
            @endforelse
            
          <!--</ul>-->
        </div>
      </div>

      <div class="tab-pane" id="tabs-2" role="tabpanel">
        <div id="accordion">
          <div class="row playlist mt-0"> 
            <!--<div class="col-12 mb-2">
              <h4 class="heading"> <span>Created playlists</span> </h4>
            </div>-->
            <div class="col-12">
              <div class="playlist_banner mb-2">
                <div class="banner-slider">
                  <div class="owl-carousel owl-theme">
  
                    @forelse($playlistbanner as $data)
                    <div class="item"><img src="{{ asset($data->image) }}"></div>
                    @empty
                    @endforelse
  
                  </div>
                </div>
              </div>
            </div>
       
            @forelse($playlist as $data)
            <div class="col col-6 col-sm-4 col-md-3">
              <figure class="playlist_img"> <img src="{{ asset($data->image) }}"> </figure>
              <figcaption class="playlist_caption mt-3"> <a href="#">
                <h4>{{ $data->playlist }}</h4>
                </a>
                <div id="heading1"> <a class="btn-link"  href="#" data-toggle="collapse" data-target="#collapse-{{ $data->id }}" aria-expanded="true" aria-controls="collapse1"> <span class="ytd-grid-video-view">View full playlist</span> </a> </div>
              </figcaption>
              @forelse($data->uploadvideo as $listvideo)
              <div class="modal fade" id="basicModal{{ $listvideo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/9JDHw2wFd10" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              @endforelse
            </div>

            @empty
            @endforelse
    
          </div>

          <div class="row playlist_show">
            <div class="col-12">
              @forelse($playlist as $data)

              <div id="collapse-{{ $data->id }}" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                <div class="row">
               
                  <div class="col-12 mb-2">
                    <h4 class="heading"> <span>{{ $data->playlist }}</span> </h4>
                  </div>
                  {{-- <ul class="col-12"> --}}
                    @forelse($data->uploadvideo as $listvideo)

                    {{-- <li> <a data-toggle="modal" data-target="#basicModal{{ $listvideo->id }}" href="#">
                      <figure> <img src="{{ asset($data->image) }}"> </figure>
                      </a>
                      <figcaption> <a href="#">
                        <h3>{{ $listvideo->title }}</h3>
                        </a> <a href="#">
                        <p>{!! $listvideo->description !!}</p>
                        </a> <span class="ytd-grid-video-title">{{ $listvideo->channel_name }}</span> <span class="ytd-grid-video-view">{{ $listvideo->views }}</span> <span class="ytd-grid-stream">{{ $listvideo->created_at->diffForHumans() }}</span> </figcaption>
                    </li> --}}
                    <div class="col-12">
                      <div class="banner-slider">
                          <figcaption class="video_caption mt-1">
                              <div class="title-bar">
                                  <h3>{{ $listvideo->title }} </h3>
                                  <span class="ytd-grid-video-title">{{ $listvideo->channel_name }}</span> <span class="ytd-grid-video-view">{{ $listvideo->views }} views</span> <span class="ytd-grid-stream">{{ $listvideo->created_at->diffForhumans() }}</span>
                                  <p class="mb-0">{!! $listvideo->description !!}
                                      <div class="show-more mt-2"><a href="javascript:void(0)" class="btn"> MORE <i class="fa-solid fa-angle-down"></i></a></div>
                                      <div class="show-more-content">
                                            </p>
                                          <div class="show-less"> <a href="javascript:void(0)" class="btn"> LESS <i class="fa-solid fa-angle-up"></i></a></div>
                                      </div>
                                  </p>
                              </div>
                          </figcaption>
                          <!--               <iframe width="560" height="315" src="https://www.youtube.com/embed/0PcNuhuCNVc?controls=1&showinfo=0&mute=1&rel=0&loop=1" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->

                          <div class="hytPlayerWrapOuter">
                              <div class="hytPlayerWrap video-placement">
                                  <iframe class="youtube" src="https://www.youtube.com/embed/YwEKIl3qQzA?rel=0&amp;enablejsapi=1" width="100%" height="400px" frameborder="0"></iframe>
                              </div>
                          </div>
                      </div>
                  </div>

                    @empty
                    @endforelse
                  {{-- </ul> --}}
                </div>
              </div>

              @empty
              @endforelse
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="tabs-3" role="tabpanel">
        <div class="row playlist teamlist mt-1 justify-content-center"> 
          <!--<div class="col-12 mb-2">
            <h4 class="heading"> <span>Our Team</span> </h4>
          </div>-->
          
          <div class="col-12">
            <div class="playlist_banner mb-2">
              <div class="banner-slider">
                <div class="owl-carousel owl-theme">

                  @forelse($teamslider as $data)
                  <div class="item"><img src="{{ asset($data->image) }}"></div>
                  @empty
                  @endforelse

                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6" style="background-color:#e6e6e6;">
            <h3 class="sub-title center my-3">Core Team</h3>
            <div class="row mb-3">
              @foreach ($core_team as $item)
                <div class="col-12 col-sm-12 col-md-6">
                  <figure class="team_img"><img src="{{asset($item->image)}}">
                      <figcaption class="team_caption mt-3">
                          <h4>{{$item->title}}</h4>
                          <span>{{$item->post}}</span>
                          <ul class="team-social-icons justify-content-center  d-flex">
                              <li><a target="_blank" href="{{$item->facebook}}" title=""><i class="fa-brands fa-facebook"></i> </a></li>
                              <li><a target="_blank" href="{{$item->instagram}}" title=""><i class="fa-brands fa-instagram"></i> </a></li>
                              <li><a target="_blank" href="{{$item->youtube}}" title=""><i class="fa-brands fa-youtube"></i></a></li>
                              <li><a target="_blank" href="{{$item->tiktok}}" title=""><i class="fa-brands fa-tiktok"></i></a></li>
                              <li><a target="_blank" href="{{$item->twitter}}" title=""><i class="fa-brands fa-twitter"></i></a></li>
                          </ul>
                          <p>{!!$item->description!!}</p>
                      </figcaption>
                  </figure>
                </div>  
              @endforeach
            </div>
          </div>
          <div class="v-divider"></div>
            <div class="col-12 col-sm-6" style="background-color:#dfdfdfe0;">
              <h3 class="sub-title center my-3">Associate Team</h3>
              <div class="row mb-3">
                @foreach ($associate_team as $item)
                <div class="col-12 col-sm-12 col-md-6">
                  <figure class="team_img"><img src="{{asset($item->image)}}">
                      <figcaption class="team_caption mt-3">
                          <h4>{{$item->title}}</h4>
                          <span>{{$item->post}}</span>
                          <ul class="team-social-icons justify-content-center  d-flex">
                              <li><a target="_blank" href="{{$item->facebook}}" title=""><i class="fa-brands fa-facebook"></i> </a></li>
                              <li><a target="_blank" href="{{$item->instagram}}" title=""><i class="fa-brands fa-instagram"></i> </a></li>
                              <li><a target="_blank" href="{{$item->youtube}}" title=""><i class="fa-brands fa-youtube"></i></a></li>
                              <li><a target="_blank" href="{{$item->tiktok}}" title=""><i class="fa-brands fa-tiktok"></i></a></li>
                              <li><a target="_blank" href="{{$item->twitter}}" title=""><i class="fa-brands fa-twitter"></i></a></li>
                          </ul>
                          <p>{!!$item->description!!}</p>
                      </figcaption>
                  </figure>
                </div>  
              @endforeach
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="back_top"><!--//back to top scroll-->
  <div class="container">
    <div id="back-top" style="display: block;"> <a href="#top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  </div>
</section>
<!--//back to top scroll--> 

@endsection