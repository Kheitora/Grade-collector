@extends('layouts.app')


@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>

                    <div class="card-body">

                        <p>You can either edit the grade or delete it completely</p>

                            <p>{{$grade->grade}}</p>

                        <form id="{{$grade->id}}" action="{{url('/status/'. $grade->id)}}" method="POST">
                            @method('patch')
                            @csrf
                            <td>
                                <input type="checkbox"
                                       id="active-{{$grade->id}}"
                                       name="active" class="js-switch"
                                       onchange="this.form.submit()"
                                    {{ $grade->status === 1 ? 'checked' : '' }}>
                            </td>
                        </form>



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


