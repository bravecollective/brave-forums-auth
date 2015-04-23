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

            <div class="panel panel-default">
                <div class="panel-heading">Permissions</div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user->permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Groups</div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user->groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
	</div>
@endsection
