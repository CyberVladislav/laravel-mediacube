@extends('welcome')
@section('content')
<div class="card container col-md-5">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger text-center list-lines">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="mb-5 text-center">Измените данные отдела</h3>
        <form class="form-validate" method="post" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label">Имя сотрудника</label>
                <div class="col-md-8">                    
                    <input type="text" class="form-control" name="name" value="{{ $employee->name }}" placeholder="Введите имя" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label">Фамилия сотрудника</label>
                <div class="col-md-8">                    
                    <input type="text" class="form-control" name="surname" value="{{ $employee->surname }}" placeholder="Введите фамилию" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label">Отчество сотрудника</label>
                <div class="col-md-8">                    
                    <input type="text" class="form-control" name="patronymic" value="{{ $employee->patronymic }}" placeholder="Введите отчество">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label">Пол сотрудника</label>
                <div class="col-md-8">                    
                    <input type="text" class="form-control" name="sex" value="{{ $employee->sex }}" placeholder="Введите пол">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label">Заплата сотрудника</label>
                <div class="col-md-8">                    
                    <input type="text" class="form-control" name="salary" value="{{ $employee->salary }}" placeholder="Введите зарплату">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4">Отделы сотрудника</label>
                <div class="col-md-8">
                    @foreach($departments as $department)
                    <div class="form-check">
                        @if($employee->getId($department->id) == $department->id)
                            <input class="form-check-input" name="departments[]" id="{{ $department->name }}" value="{{ $department->id }}" type="checkbox" checked>
                        @else
                            <input class="form-check-input" name="departments[]" id="{{ $department->name }}" value="{{ $department->id }}" type="checkbox">
                        @endif
                        <label class="form-check-label" for="{{ $department->name }}">
                        {{ $department->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn m-t-30 mt-3">Сохранить</button>
                <a class="btn m-t-30 mt-3 btn-white" href="{{ asset('/') }}">На главную</a>
            </div>
        </form>
    </div>
</div>
@endsection
