@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">User Info</div>

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="https://image.eveonline.com/Character/{{ $user->id }}_64.jpg" alt="user">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $user->character_name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>


    {!! Form::open(['route' => 'update']) !!}
        <div class="row">

            @foreach ($errors->all() as $message)
                <div class="col-md-10 col-md-offset-1 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach

            <div class="col-md-5 col-md-offset-1">

                <div class="panel panel-default user">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forum Email</h3>
                    </div>
                    <div class="panel-body">
                        @if ($forum_user->exists)
                            <div class="input-group col-sm-12">
                                <input type="email" readonly name="email" class="form-control" id="email" value="{{$forum_user->email}}">
                            </div>
                        @else
                            <div class="input-group col-sm-12">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email here...">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="panel panel-default password">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forum Password</h3>
                    </div>
                    <div class="panel-body">
                        <label class="sr-only" for="password">Password</label>

                        <div class="input-group col-sm-12">
                            <input type="password" name="password" class="form-control" id="password" value="{{ $forum_user->exists ? $forum_user->password : '' }}" placeholder="Enter new password here...">
                        </div>
                        <div class="password-strength">
                            <div class="strength-0"></div>
                            <div class="strength-1"></div>
                            <div class="strength-2"></div>
                            <div class="strength-3"></div>
                            <div class="strength-4"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1">
                <input type="submit" class="btn btn-default btn-block" value="Save">
            </div>
        </div>

    {!! Form::close() !!}
@endsection
