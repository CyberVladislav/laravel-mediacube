@extends('welcome')
@section('content')
<!-- Page title -->
<section id="page-title" class="page-title-classic" style="background-image:url({{ asset('/images/employee.jpeg') }});background-size: cover;color: white;">
    <div class="container">
        <div class="page-title">
            <h1>Сотрудники</h1>
            <span>Показывает полную информцию о сотрудниках</span>
        </div>
    </div>
</section>
<!-- end: Page title -->
<!-- Page Content -->
    @if(session('success'))
        <div class="text-center alert alert-success" style="z-index: auto;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="text-center alert alert-danger" style="z-index: auto;">
            {{ session('error') }}
        </div>
    @endif
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <div class="d-flex flex-wrap justify-content-around">
                <h4>Таблица сотрудников</h4>
                    <form action="{{ route('employees.create') }}">
                        <button type="submit" class="btn btn-light">Добавить сотрудника</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Отчество</th>
                                <th>Пол</th>
                                <th>Зарплата</th>
                                <th>Названия отделов</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->surname }}</td>
                                    <td>{{ $employee->patronymic }}</td>
                                    <td>{{ $employee->sex }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>
                                        @foreach($employee->departments as $department)
                                            @if($loop->iteration != $loop->last)
                                                {{$department->name}},
                                            @else
                                                {{$department->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('employees.edit', $employee->id) }}" data-toggle="tooltip" data-original-title="Изменить" class="mr-1"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="all: unset;"><a href="#" data-toggle="tooltip" data-original-title="Удалить"><i class="far fa-trash-alt"></i></a></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Page Content -->
@endsection
