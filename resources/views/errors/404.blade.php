@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
<div class="error-content">
    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
    <p>
      We could not find the page you were looking for.
      Meanwhile, you may <a href="{{asset('/admin')}}">return to index</a>.
    </p>
  </div>
