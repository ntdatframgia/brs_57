@extends('frontend.master')
@section('content')
    <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('home.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('home.profile',Auth()->user()->id)}}/{{str_slug(Auth()->user()->fullname)}}.html">{{ Auth()->user()->fullname}}</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->path_avatar)}}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{ $user->fullname }}</h3>

                  <p class="text-muted text-center">Software Engineer</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="followers pull-right">{{ count($followers) }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="followings pull-right">{{ count($followings) }}</a>
                    </li>
                  </ul>
                @if (Auth::user()->id != $user->id)
                    @if(count($followers) !=0)
                        @foreach ($followers as $follower)
                        <?php $arr[] = $follower->id ; ?>
                        @endforeach

                            @if( in_array(Auth::user()->id,$arr))
                              <a id="follow" href="javascript:void(0)" data-token="{{ csrf_token() }}" data-id= "{{ $user->id }}" data-url="{{ route('follow.store') }}" data-follower="{{ Auth::user()->id }}"class="btn btn-success btn-block "><b> Following </b></a>
                            @else
                               <a id="follow" href="javascript:void(0)" data-token="{{ csrf_token() }}" data-id= "{{ $user->id }}" data-url="{{ route('follow.store') }}" data-follower="{{ Auth::user()->id }}"class="btn btn-primary btn-block "><b> Fowllow </b></a>
                            @endif
                    @else
                       <a id="follow" href="javascript:void(0)" data-token="{{ csrf_token() }}" data-id= "{{ $user->id }}" data-url="{{ route('follow.store') }}" data-follower="{{ Auth::user()->id }}"class="btn btn-primary btn-block "><b> Fowllow </b></a>
                    @endif
                @endif
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">List Favorite Books</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                @foreach($marks as $mark )
                    <i class="fa fa-book margin-r-5"></i><a href="{{ route('home.detail', $mark->book->id) }}"><strong> {{ $mark->book->name }}</strong></a></br>
                     @endforeach
                </div>

                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="#followings" data-toggle="tab">Followings</a></li>
                  <li><a href="#followers" data-toggle="tab">Followers</a></li>
                </ul>
                <div class="tab-content">

                  <!-- /.tab-pane -->
                  <div class=" active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="active timeline timeline-inverse">
                      <!-- timeline time label -->
                     <!--  <li class="time-label">
                           <span class="bg-red">

                             Today : {{ Carbon\Carbon::now('Asia/Tokyo')->format('d/m/Y') }}
                     </li> -->
                      <!-- /.timeline-label -->

                    @foreach ($activities as $activity)

                      <!-- timeline item -->
                      <li>
                    @if ($activity->activityable_type == "Mark")
                        <i class="fa fa-bookmark bg-blue"></i>
                    @elseif($activity->activityable_type == "Follow")
                        <i class="fa fa-user bg-aqua"></i>
                    @else
                        <i class="fa fa-comment bg-green"></i>
                    @endif

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i>  {{ \Carbon\Carbon::createFromTimeStamp(strtotime( $activity->activityable['updated_at']))->diffForHumans()  }}</span>
                            @if($activity->activityable_type == "Mark" && $activity->activityable['favorite'] == 1)
                            <h3 class="timeline-header"><a href="{{ route('home.profile',$activity->user->id) }}/{{str_slug(Auth()->user()->fullname)}}.html">{{ $activity->user->fullname}}</a>  marked <a href="{{ route('home.detail',$activity->activityable['book_id']) }}" >{{App\Models\Book::find($activity->activityable['book_id'])->name}}</a> as favorite
                            @elseif($activity->activityable_type == "Follow" && $activity->activityable['follow_id'])
                            <h3 class="timeline-header"><a href="{{ route('home.profile',$activity->user->id) }}/{{str_slug(Auth()->user()->fullname)}}.html">{{ $activity->user->fullname}}</a>  following
                            <a href="{{ route('home.profile',$activity->activityable['follow_id']) }}">{{App\Models\User::find($activity->activityable['follow_id'])->fullname}}</a>
                            @elseif($activity->activityable_type == "Comment")
                             <h3 class="timeline-header"><a href="{{ route('home.profile',$activity->user->id) }}/{{str_slug(Auth()->user()->fullname)}}.html">{{ $activity->user->fullname}}</a>  Commented to a <a href="{{ route('home.detail',$activity->activityable['book_id']) }}" />{{App\Models\Book::find($activity->activityable['book_id'])->name}}
                            @else
                            @endif
                            </h3>
                       <!--    <div class="timeline-body">
                         Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                         weebly ning heekya handango imeem plugg dopplr jibjab, movity
                         jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                         quora plaxo ideeli hulu weebly balihoo...
                       </div> -->
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </li>
                      @endforeach
                       <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                    </ul>
                      <!-- END timeline item -->
                        </div>

                <div class="tab-pane" id="followings">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-bordered">
                            <tbody>
                            @foreach ($followings as $following)
                            <tr>
                                <td style="position: relative;">
                                    <div class="col-lg-6">
                                         <img src="{{ asset($following->path_avatar) }}" class="profile-user-img img-responsive img-circle" style="">
                                    </div>
                                    <div class="text-left col-lg-6" style=" position: absolute;  top: 40%;
                                            left: 50%;
                                            ">
                                     <a href="{{route('home.profile',  $following->id)}}/{{str_slug(Auth()->user()->fullname)}}.html">
                                         {{$following->fullname}}
                                     </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                          </tbody></table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="followers">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-bordered">
                            <tbody>
                            @foreach ($followers as $follower)
                            <tr>
                                <td>
                                    <div class="col-lg-6">
                                        <img src="{{ asset($follower->path_avatar) }}" class="profile-user-img img-responsive img-circle" style="">
                                    </div>
                                    <div class="text-left col-lg-6" style=" position: absolute;  top: 40%;
                                                left: 50%;
                                                ">
                                         <a href="{{route('home.profile',  $follower->id)}}/{{str_slug(Auth()->user()->fullname)}}.html">
                                             {{$follower->fullname}}
                                         </a>
                                    </div>
                            </tr>
                            @endforeach
                          </tbody></table>
                        </div>
                    </div>
                </div>
                            </ul>
                          </div>
                    </div>
                <!-- /.tab-content -->

              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section>
@endsection
