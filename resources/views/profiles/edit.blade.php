@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit your profile</div>

                <div class="panel-body">
                    <form action="{{ route('profile.update')}}" method="post">
                      {{ csrf_field()}}
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" value="{{ $info->location}}" required>
                      </div>

                      <div class="form-group">
                        <label for="about">About Me</label>
                        <textarea cols="30" id="about" rows="10" class="form-control" name="about" required>{{ $info->about}}</textarea>
                      </div>

                      <div class="form-group">
                        <p class="text-center">
                          <button class="btn btn-primary" type="submit">Save your info</button>
                        </p>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
