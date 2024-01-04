@extends('layouts.app')
@section('content')
<style type="text/css">
    body {
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
    }
    .table-wrapper {
    background: #fff;
    padding: 20px;
    width: 100%;
    }
    .container{
    max-height: auto;
    max-width: auto;
    overflow-y: auto;
    justify:auto;
    }
    </style>
    <div  class="container">
    <div class="table-wrapper">
    <div class="row">
        <div class="col-sm-6">
            <div class="max-w-xl">@include('profile.partials.update-profile-information-form')
            </div>
            </div>
        <div class="col-sm-6">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
    @endsection
    <!--<div class="w-100"></div>
        <div class="col">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
      </div>-->
