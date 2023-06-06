@extends('layouts.main')

@section('content')
@php /** @var \App\Models\BlogPost $item */ @endphp
<div class="container">
     @include('blog.admin.posts.result_messages')
 
 @if ($item->exists)
    <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
    @method('PATCH')
 @else
    <form method="POST" action="{{ route('blog.admin.posts.store') }}">
 @endif
    @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.admin.posts.post_edit_add_col')
            </div>
            <div class="col-md-3">
                @include('blog.admin.posts.post_edit_add_col')
            </div>
        </div>
    </form> 
    @if ($item->exists)
    <br>
    <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
        @method('DELETE')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-block">
                    <div class="card-body ml-auto">
                        <button type="submit" class="btn btn-link">Видалити</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
    @endif
</div>                
@endsection
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if ($item->is_published)
                        Опубліковано
                    @else
                        Чернетка
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основні дані</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Додаткові дані</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" value="{{ $item->title }}" id="title" class="form-control" minlength="3" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="content_raw">Текст статті</label>
                                <textarea name="content_raw" id="content_raw" rows="20" class="form-control">{{ old('content_raw', $item->content_raw) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Категорія</label>
                                <select name="category_id" placeholder="Оберіть категорію" id="category_id" class="form-control" required>
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}" 
                                        @if($categoryOption->id == $item->category_id) selected @endif> 
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="slug">Псевдонім</label>
                                <input type="text" name="slug" value="{{ $item->slug }}" id="slug" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Короткий текст</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{ old('excerpt', $item->excerpt) }}</textarea>
                            </div>
                            <div class="form-check">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" name="is_published" value="1" class="form-check-input" @if($item->is_published) checked="checked"@endif>
                                <label for="is_published" class="form-check-label">Опубліковано</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
