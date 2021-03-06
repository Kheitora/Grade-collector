@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>

                    <div class="card-body">

                        <p>This is where you can edit profile data</p>

                        <form method="POST" action="/userdata">
                            <div class="form-group hidden">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PATCH">
                            </div>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><b>Name:</b></label>
                                <input type="text" name="name" placeholder="Please enter your email here" class="form-control" value="{{ $user->name }}"/>

                                <?php if ($errors->has('name')) :?>
                                <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                                </span>
                                <?php endif;?>

                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><b>Email:</b></label>
                                <input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ $user->email }}"/>

                                <?php if ($errors->has('email')) :?>
                                <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                                </span>
                                <?php endif;?>

                            </div>

                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link is-outlined">change data</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
