@extends('welcome')
@section('content')
<!-- Page title -->
<section id="page-title" class="page-title-classic" style="background-image:url({{ asset('/images/department.jpeg') }});background-size: cover;color: white;">
    <div class="container">
        <div class="page-title">
            <h1>Отделы</h1>
            <span>Показывает отделы</span>
        </div>
    </div>
</section>
<!-- end: Page title -->
<!-- Page Content -->
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <h4>Таблица отделов</h4>
                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                            <tr>
                                <th>Название отдела</th>
                                <th>Количество сотрудников отдела</th>
                                <th>Максимальная зарплата среди сотрудников</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->employees->count() }}</td>
                                    <td>{{ $department->employees->max('salary') }}</td>
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
