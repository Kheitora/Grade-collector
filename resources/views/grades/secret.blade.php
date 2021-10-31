@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Easter Egg') }}</div>

                    <div class="card-body">

                        <h1>You did it!</h1>
                        <p>You logged in more than 3 times and found this easter egg!</p>

                        <form method="get" action="/index">
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-link is-outlined">back</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

