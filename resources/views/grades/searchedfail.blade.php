@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{url('/search')}}" method="post" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search grades">
                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                    </div>
                </form>

                <form method="get" action="{{url('/filter')}}" type="text">
                    @csrf
                    <div class="form-group">
                        <select name="filter" id="filter" class="form-control input-lg dynamic">
                            <option value="passing-grade">passing grade</option>
                            <option value="failing-grade">failing grade</option>
                        </select>


                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link is-outlined">filter</button>
                            </div>
                        </div>
                    </div></form>

                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>
                    <div class="card-body">
                        <p>This is where the grades will be</p>
                        @foreach ($fail as $grade)
                            <p><a href="{{route('grades.show', $grade)}}">{{$grade->grade}}</a></p>
                        @endforeach

                        <form method="get" action="/admin">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">Add Grade</button>
                                </div>
                            </div>
                        </form>

                        <form method="get" action="{{route('grades.secret')}}">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">secret</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
