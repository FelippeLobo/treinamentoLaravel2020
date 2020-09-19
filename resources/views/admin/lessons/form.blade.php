<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required class="form-control" autofocus value="{{ old('name', $lesson->name )}}">
    </div>
    <div class="form-group col-12">
        <label for="description" class="required">Descrição </label>
        <textarea name="description" id="description" autocomplete="off" required class="form-control" value="{{ old('description', $lesson->description )}}"></textarea>
       
    </div>
    <div class="form-group col-12">
        <label for="slug" class="required">Slug </label>
        <input type="text" name="slug" id="slug" autocomplete="off" required class="form-control" value="{{ old('slug', $lesson->slug )}}">
    </div>
    <div class="form-group col-12">
        <label for="image" class="required">Imagem </label>
        <input type="file" name="image" id="image" autocomplete="off" required class="form-control" value="{{ old('image', $lesson->image )}}">
    </div>
    <div class="form-group col-12">
        <label for="video" class="required">Video </label>
        <input type="text" name="video" id="video" autocomplete="off" required class="form-control" value="{{ old('video', $lesson->video )}}">
    </div>

    @if(isset($show))
        <div class="form-group col-12">
            <label for="category_id" class="required">Categoria </label>
            <input type="text" name="category_id" id="category_id" autocomplete="off" required class="form-control" value="{{ old('category_id', $category->name )}}">
        
        </div>
        <div class="form-group col-12">
                <iframe width="560" height="315" src="{{ $lesson->video }}"></iframe>
        </div>
    @else
    <div class="form-group col-12">
            <label for="video" class="required">Categoria </label>
            <select name="category_id" required id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option name="categories_id" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        
        </div>
    @endif
</div>

@push('scripts')
    <script>
        $(function(){
            $('.select2').select2();
        })
        $('select[value]').each(function(){
            $(this).val($(this).attr('value'));
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endpush