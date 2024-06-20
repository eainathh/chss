@extends('layouts.public')

@section('content')

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain ">
                <div class="card-header pb-0 text-left bg-transparent">
                    <img src="{{asset('img/logo-dvelopers.png')}}" class="mb-3" style="max-height:70px; ">
                  <h3 class="font-weight-bolder text-info text-gradient">Gerenciador Projetos</h3>
                  
                </div>
                <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <label>{{ __('Email Address') }}</label>
                    <div class="mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" 
                style="background-image:url('{{asset('img/curved-images/curved6.jpg')}}')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


@endsection
