@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>

                    <div class="card-body">

                        <p>This is where the teacher will be able to edit grades</p>
                        <form method="post" action="{{route('grades.update', $grade)}}">

                            @csrf
                            @method('patch')

                            <div class="field">
                                <label class="label">Grade</label>
                                <div class="control">
                                    <input type="text" name="grade" value="{{ old('grade') }}" class="input" placeholder="grade" required />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">subject</label>
                                <div class="control">
                                    <input type="text" name="subject" value="{{ old('subject') }}" class="input" placeholder="subject" minlength="1" maxlength="100" required />
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">Edit Grade</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
