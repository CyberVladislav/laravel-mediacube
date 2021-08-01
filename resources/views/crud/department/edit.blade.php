@extends('welcome')
@section('content')
<div class="card container col-md-5">
    <div class="card-body">
        <h3 class="mb-5 text-center">Измените данные отдела</h3>
        <form class="form-validate" method="post" action="{{ route('departments.update', $department->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label">Новое название отдела</label>
                <div class="col-md-8">                    
                    <input type="text" class="form-control" name="name" value="{{ $department->name }}" placeholder="Введите название" required>
                </div>
            </div>
            <button type="submit" class="btn m-t-30 mt-3">Сохранить</button>
            <a class="btn m-t-30 mt-3 btn-white" href="{{ asset('/') }}">На главную</a>
        </form>
    </div>
</div>
@endsection
