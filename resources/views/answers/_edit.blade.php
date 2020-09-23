@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    {{-- <h2>{{ $answersCount . " " . Str::plural('Answer', $question->answers_count) }}</h2> --}}
                    <h1>Editing answer for question: <strong>{{ $question->title }}</strong></h1>
                </div>
                <hr>
               <form action="{{route('questions.answers.update' , [$question->id, $answer->id] ) }}" method="post">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                        <textarea class="form-control{{ $errors->has('body') ? 'is-invalid' : ''  }}" rows="7" name="body">
                        {{ old('body', $answer->id) }}
                        </textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>
                                    {{ $errors->first('body') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
