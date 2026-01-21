@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '500')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
