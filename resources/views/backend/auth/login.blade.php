@extends('backend.include.main')

@section('main')
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                                    <form class="mx-1 mx-md-4" action="{{route('login')}}" method="POST">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        @if(Session::has('fail'))
                                        <div class="alert alert-danger">
                                            {{Session::get('fail')}}
                                        </div>
                                        @endif
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                                <input type="email" id="form3Example3c" class="form-control" value="{{old('email')}}" name="email"/>
                                                <label class="form-label mt-2" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                                <input type="password" id="form3Example4c" class="form-control" name="password"/>
                                                <label class="form-label mt-2" for="form3Example4c">Password</label>
                                            </div>
                                        </div>
                                        {{-- <div class="d-flex justify-content-between align-items-center">
                                            <!-- Checkbox -->
                                            <div class="form-check mb-0">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id="form2Example3" />
                                                <label class="form-check-label" for="form2Example3">
                                                    Remember me
                                                </label>
                                            </div>
                                            <a href="#!" class="text-body">Forgot password?</a>
                                        </div> --}}
                                        <div class="text-center text-lg-start mt-4 pt-2">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                            {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                                    href="{{ url('register') }}" class="link-danger">Register</a></p> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
