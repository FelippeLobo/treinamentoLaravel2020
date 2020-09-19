@extends('admin.layouts.app')
@section('content')
    @component('admin.components.show')
        @slot('title', $lesson->name)
        @slot('form')
            @include('admin.lessons.form', ['show' => true])
        @endslot
    @endcomponent
@endsection


@push('scripts')
    <script>
        $('.form-control').attr('readonly',true);
    </script>
@endpush