@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                          <h2>{{ $question->title }}  </h2>
                          <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Question</a>
                          </div>
                        </div>

                    </div>

                    <hr>

                    <div class="media">

                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                    <img src="{{ $question->user->avatar }}">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">
                                        {{ $question->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index' , [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
    ])
    @include('answers._create')
</div>
{{--  <script src="{{ asset("js\app.js") }}"></script>  --}}
@endsection
