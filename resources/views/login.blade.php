@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('includes/sidebar')
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card mt-4">
                <div class="card-body">
                    <h2 id="laravel-cest-top" class="rb-heading-index-3 card-title"><a href="" data-wpel-link="internal" target="_self" rel="follow noopener noreferrer">Laravel c'est top !</a></h2>
                    {{--   <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p> --}}
                    <span class="auhtor">Par <a href="" data-wpel-link="internal" target="_self" rel="follow noopener noreferrer">Hamid</a></span> <br>
                    <span class="time">Il y'a 1 heure</span>
                </div>
            </div>
            <!-- /.card -->
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Connexion
                </div>
                <form action="{{route('post.login')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="email" id="staticEmail" >
                                @error('email')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="inputPassword">
                                @error('password')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Connexion </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
@stop
