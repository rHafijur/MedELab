@extends('layouts.master')
@section('title','Generate Label - Super admin')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Register Patient') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/register_patient') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="attendants_name" class="col-md-4 col-form-label text-md-right">{{ __('Attendant\'s name') }}</label>

                            <div class="col-md-6">
                                <input id="attendants_name" type="phone" class="form-control @error('attendants_name') is-invalid @enderror" name="attendants_name" value="{{ old('attendants_name') }}" required autocomplete="attendants_name">

                                @error('attendants_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="attendants_phone" class="col-md-4 col-form-label text-md-right">{{ __('Attendant\'s phone') }}</label>

                            <div class="col-md-6">
                                <input id="attendants_phone" type="phone" class="form-control @error('attendants_phone') is-invalid @enderror" name="attendants_phone" value="{{ old('attendants_phone') }}" required autocomplete="attendants_phone">

                                @error('attendants_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Word') }}</label>

                            <div class="col-md-6">
                              <select id="word" type="text" class="form-control @error('word') is-invalid @enderror" name="word" required>
                                @php
                                    $word=auth()->user()->wordAdmin->word;
                                @endphp
                                <option value="{{$word->id}}">{{$word->title}}</option>
                            </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Bed No.') }}</label>

                            <div class="col-md-6">
                              <input id="bed" type="text" class="form-control @error('bed') is-invalid @enderror" name="bed" value="{{ old('bed') }}" required>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                              <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="additional">
                            
                        </div>
                        @php
                            $words=App\Word::all();
                            // dd($words);
                        @endphp
                        <script>
                            function checkUser(){
                            var addi= $('#additional');
                                console.log($('#type').val());
                                if($('#type').val()==4){
                                    addi.append(
                                        `<div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Word') }}</label>

                            <div class="col-md-6">
                                <select  id="word" class="form-control @error('type') is-invalid @enderror" name="word" required autocomplete="type">
                                    <option>Select</option>
                                    @foreach($words as $word)
                                    <option value="{{$word->id}}">{{$word->title." - ".$word->department}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                                        `
                                        );
                                }
                            }
                        </script>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection