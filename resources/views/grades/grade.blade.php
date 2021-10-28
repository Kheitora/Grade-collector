@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>

                    <div class="card-body">

                        <p>You can either edit the grade or delete it completely</p>

                            <p>{{$grade->grade}}</p>


                        <form method="get" action="{{route('grades.delete', $grade)}}">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">Delete</button>
                                </div>
                            </div>
                        </form>

                        <form method="get" action="{{route('grades.edit', $grade)}}">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


