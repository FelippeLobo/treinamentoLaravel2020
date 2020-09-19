@extends('admin.layouts.app')
@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastrar um usuário')
        @slot('url', route('lessons.store'))
        @slot('form')
            @include('admin.lessons.form')
        @endslot
    @endcomponent
@endsection
