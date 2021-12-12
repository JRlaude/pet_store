@extends('layouts.app')
@section('title',$user->getName() . 'Profile | ')
@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User's Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <a href="" data-toggle="modal" data-target="#user-profile"> <img class="profile-user-img img-fluid img-circle" src="/storage/images/users/{{$user->image ? $user->image : 'default_profile.jpg'}}" alt="User profile picture"></a>

                            </div>

                            <h3 class="profile-username text-center">{{$user->getName()}}</h3>

                            <p class="text-muted text-center">Pet Lover 💗 </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                            </ul>

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted ml-3">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted ml-3">Sto. Tomas, Batangas</p>

                            <hr>

                            <strong><i class="fas fa-heart mr-1"></i> Likes</strong>

                            <p class="text-muted ml-3">
                                <span class="tag tag-danger">Dogs,</span>
                                <span class="tag tag-success">Cats,</span>
                                <span class="tag tag-info">Hamster,</span>
                                <span class="tag tag-warning">Birds</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Favorite Quotes</strong>

                            <p class="text-muted ml-3">"Until one has loved an animal, a part of one's soul remains
                                unawakened"</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Photos Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Photos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="profile-user-img img-fluid img-box mr-3 mb-3" src="plugin/img/avatar.png" alt="photos">
                            <img class="profile-user-img img-fluid img-box mb-3" src="plugin/img/avatar2.png" alt="photos">
                            <img class="profile-user-img img-fluid img-box mr-3 mb-3" src="plugin/img/avatar3.png" alt="photos">
                            <img class="profile-user-img img-fluid img-box mb-3" src="plugin/img/avatar4.png" alt="photos">
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- whats in your mind box -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline ">
                        <div class="card-header p-1 row border-bottom-0">
                            <div class="col-1 pl-2">
                                <img class="profile img-fluid img-bordered-sm img-circle float left" src="{{ asset('default_profile.jpg') }}" alt="User profile picture">
                            </div>
                            <div class="col pl-0">
                                <button type="button" class="btn btn-default btn-block mt-1 p-0" data-toggle="modal" data-target="#modal-post">
                                    <p class="float-left m-2">
                                        What's on your mind?
                                    </p>

                                </button>

                            </div>
                        </div><!-- /.card-header -->
                    </div>
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="#myblogs" data-toggle="tab">My
                                        Blogs</a></li>
                                <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">My
                                        Orders</a></li>
                                <li class="nav-item"><a class="nav-link" href="#reservations" data-toggle="tab">My
                                        Reservation</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="timeline">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="plugin/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="plugin/img/user4-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Nina Mcintire</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 10:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="plugin/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="plugin/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="plugin/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="plugin/img/photo2.png" alt="Photo">
                                                        <img class="img-fluid" src="plugin/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="plugin/img/photo4.jpg" alt="Photo">
                                                        <img class="img-fluid" src="plugin/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="orders">
                                    <!-- orders -->
                                    <div class="orders">
                                        <h2 class="text-center">No orders yet </h2>
                                    </div>
                                    <!-- /.orders -->

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="reservations">
                                    <!-- reservations -->
                                    <div class="reservations">
                                        <h2 class="text-center">No reservations yet </h2>
                                    </div>
                                    <!-- /.reservations -->

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="myblogs">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="plugin/img/user4-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Nina Mcintire</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 10:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <div class="container">
                                        <form class="" method="#" action="#">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-outline mb-2">
                                                        <label class="form-label" for="firstname">First Name</label>
                                                        <input type="text" id="firstname" disabled class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus />
                                                    </div>

                                                    <div class="form-outline mb-2">
                                                        <label class="form-label" for="lastname">Last name</label>
                                                        <input type="text" id="lastname" disabled class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                                                    </div>

                                                    <div class="form-outline mb-2">
                                                        <label class="form-label" for="email">E-Mail Address</label>
                                                        <input type="email" id="email" disabled class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                                    </div>

                                                    <div class="form-outline mb-2">
                                                        <label class="form-label" for="contact_number">Contact Number</label>
                                                        <input type="text" id="contact_number" disabled class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus" />
                                                    </div>

                                                </div>
                                                <div class="col-lg">
                                                    <!-- redirect nalng sa change password (na hindi pa nagana)-->
                                                    <div class="d-flex justify-content-center pt-2 mt-4">
                                                        <button type="#" class="btn btn-secondary btn-block text-white ">Change password</button>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- before -->
                                            <div class="d-flex justify-content-center mt-3"">
<button type=" submit" class="btn btn-primary btn-block btn-lg text-white ">Edit</button>
                                            </div>

                                        </form>
                                    </div>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>

<!-- post modal -->
<div class="modal fade" id="modal-post">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal content -->

            <div class="modal-body">
                <div class="card-header p-0 row border-bottom-0">
                    <div class="col-2 pl-2">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('default_profile.jpg') }}" alt="User profile picture">
                    </div>
                    <div class="col pl-0 ">
                        <p class="float-left m-2 ">
                            Nina Mcintire
                        </p>
                    </div>
                </div>
                <div class="col mt-2">
                    <!--Textarea with icon prefix-->
                    <div class="md-form green-textarea active-green-textarea ">
                        <textarea id="post-textarea" class="md-textarea form-control border-0" rows="3" placeholder="Start typing..."></textarea>
                        <label for="post-textarea"></label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block btn-success">Post</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<!-- profile modal -->
<div class="modal fade" id="user-profile">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit profile picture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group text-center mt-2">
                    <input type="file" hidden id="picture">
                    <label for="picture"><img class="profile-user-img img-fluid img-circle" src="{{ asset('default_profile.jpg') }}" alt="User profile picture"></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-block">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



@endsection