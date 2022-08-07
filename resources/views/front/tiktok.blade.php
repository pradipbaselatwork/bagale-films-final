<div class="container">
    <div class="visible_banner mt-5">
      <figure> <img src="{{ asset($banner->image) }}" alt="">
        <figcaption>
          <h2>{{ $banner->title }}</h2>
        </figcaption>
      </figure>
    </div>
       <div>
        @forelse($viewscounter as $data)
           <input type="hidden" value="{{ $data->total_views }}">
        @empty
        @endforelse
       </div>
   

    <div class="tab-bar my-5"><!-- ./tab-bar starts-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Home</a> </li>
  
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Playlists</a> </li>
        
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
        
        <div class="row home mt-1">
          <div class="col-12 mb-2">
          <h4 class="heading"> <span>42</span> <span> live streams</span> <small>1 Upcoming</small> </h4>
          </div>
            <ul>
                @forelse($video as $data)
                <li><a class="viewscount" viewscount_id="{{$data->id}}" href="{{ $data->utube_url }}">
                    <figure><img src="{{ asset($data->image) }}"></figure>
                    </a>
                    <figcaption> <a href="#">
                      <h3>{{ $data->title }}</h3>
                      </a> <a href="#">
                      <p>{{ $data->description }}</p>
                      </a> <span class="ytd-grid-video-title">{{ $data->channel_name }}</span> <span class="ytd-grid-video-view">{{ $data->views }}</span> <span class="ytd-grid-stream">{{ $data->created_at->diffForHumans() }}</span> </figcaption>
                  </li>   

                @empty
                @endforelse
            </ul>
          </div>
        </div>
        <div class="tab-pane" id="tabs-2" role="tabpanel">
          <div id="accordion">
          <div class="row playlist mt-1">
          <div class="col-12 mb-2">
            <h4 class="heading"> <span>Created playlists</span> </h4>
          </div>
          @forelse($playlist as $data)
            <div class="col col-6 col-sm-4 col-md-3">
             <a href="#">
              <figure class="playlist_img"> <img src="{{ asset($data->image) }}"> </figure>
              </a>
              <figcaption class="playlist_caption mt-3">
               <a href="#">
                <h4>{{ $data->playlist }}</h4>
                </a> 
                <div id="heading1">
                 <a class="btn-link"  href="#" data-toggle="collapse" data-target="#collapse-{{ $data->id }}" aria-expanded="true" aria-controls="collapse1"> <span class="ytd-grid-video-view">View full playlist</span> </a>
                 </div>
                 </figcaption>
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
              <ul class="col-12">

                @forelse($data->uploadvideo as $listvideo)
                <li><a class="viewscount" viewscount_id="{{$listvideo->id}}" href="{{ $listvideo->utube_url }}">
                  <figure><img src="{{ asset($listvideo->image) }}"></figure>
                  </a>
                  <figcaption> <a href="">
                    <h3>{{ $listvideo->title }}</h3>
                    </a> <a href="#">
                    <p>{{ $listvideo->description }}</p>
                    </a> <span class="ytd-grid-video-title">{{ $listvideo->channel_name }}</span> <span class="ytd-grid-video-view">{{ $listvideo->views }}</span> <span class="ytd-grid-stream">{{ $listvideo->created_at->diffForHumans() }}</span> </figcaption>
                </li>
                @empty
                @endforelse

              </ul>
            </div>
          </div>
          @empty
          @endforelse

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







