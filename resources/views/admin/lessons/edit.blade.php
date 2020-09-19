@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar ' . $lesson->name)
        @slot('url', route('lessons.update', $lesson->id))
        @slot('form')
            @include('admin.lessons.form')
        @endslot
    @endcomponent
@endsection