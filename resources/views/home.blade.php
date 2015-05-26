@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Core User Info</h3>
                </div>

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="https://image.eveonline.com/Character/{{ $user->id }}_64.jpg" alt="user">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $user->character_name }} <span class="grey">in</span> {{ $user->coroporation_name }} [{{ $user->alliance_name }}]</h4>
                            <p>
                                @if( $forum_user->exists )
                                    <p>
                                        Forum Account Active: <strong>Yes!</strong> <br />
                                        You can change your forum user settings below.
                                    </p>
                                @else
                                    <p>
                                        Forum Account Active: <strong>No.</strong> <br />
                                        Please create a forum user below...
                                    </p>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>

    {!! Form::open(['route' => 'update']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default user">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forum User Settings</h3>
                    </div>
                    <div class="panel-body">

                        @foreach ($errors->all() as $message)
                            <div class="alert alert-danger" role="alert">
                                <strong>Oops! There were some errors:</strong><br />
                                {{ $message }}
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label for="password">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email here..."
                                value="{{ $forum_user->exists ? $forum_user->email : "" }}">
                        </div>

                        <div class="form-group password-field">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value=""
                                   placeholder="{{ $forum_user->exists ? 'Password is set, enter a new one here to update it...' : 'Enter a password here...' }}">

                            <div class="password-strength">
                                <div class="strength-0"></div>
                                <div class="strength-1"></div>
                                <div class="strength-2"></div>
                                <div class="strength-3"></div>
                                <div class="strength-4"></div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="password">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" value=""
                                   placeholder="Enter that password again to confirm...">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-default btn-block btn-success" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {!! Form::close() !!}
@endsection
