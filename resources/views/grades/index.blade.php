@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>

                    <div class="card-body">

                        <p>This is where the grades will be</p>
                        @foreach ($grades as $grade)

                            <p><a href="{{route('grades.show', $grade)}}">{{$grade->grade}}</a></p>
                        @endforeach


                        <form method="get" action="/admin">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link is-outlined">Add Grade</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

