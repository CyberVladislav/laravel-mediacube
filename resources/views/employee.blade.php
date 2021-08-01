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
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <h4>Таблица сотрудников</h4>
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
