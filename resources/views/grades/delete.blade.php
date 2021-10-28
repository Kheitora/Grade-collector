@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>

                    <div class="card-body">

                        <p>Are you sure you want to delete this grade?</p>

                        <p>{{$grade->grade}}</p>


                        <form method="get" action="{{route('grades.destroy', $grade)}}">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">Delete</button>
                                </div>
                            </div>
                        </form>

                        <form method="get" action="/index">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">Don't delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
