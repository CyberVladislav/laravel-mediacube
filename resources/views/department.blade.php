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
                    <h4>Таблица отделов</h4>
                    <form action="{{ route('departments.create') }}">
                        <button type="submit" class="btn btn-light">Добавить отдел</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                            <tr>
                                <th>Название отдела</th>
                                <th>Количество сотрудников отдела</th>
                                <th>Максимальная зарплата среди сотрудников</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->employees->count() }}</td>
                                    <td>{{ $department->employees->max('salary') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('departments.edit', $department->id) }}" data-toggle="tooltip" data-original-title="Изменить" class="mr-1"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('departments.destroy', $department->id)}}" method="post" style="display: inline-block">
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
