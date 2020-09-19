@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Listagem')
        @slot('create', route('lessons.create'))
        @slot('head')
            <th>Nome</th>
            <th>Category</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($lessons as $lesson)
                @can('view', auth::user())
                    <tr>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->category->name }}</td>
                        <td class="options"> 
                            @can('update',auth::user())
                                <a href="{{ route('lessons.edit', $lesson->id ) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                            @endcan
                            @can('view',auth::user())
                                <a href="{{ route('lessons.show', $lesson->id ) }}" class="btn btn-dark"><i class="fas fa-search"></i></a>
                            @endcan
                            @can('delete',auth::user())
                                <form action="{{ route('lessons.destroy', $lesson->id) }}" class="form-delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endcan
            @endforeach
        @endslot
    @endcomponent
@endsection

@push('scripts')
        <script src="{{ asset('js/components/dataTable.js') }}"></script>
        <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
    