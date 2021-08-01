@extends('welcome')
@section('content')
<!-- Page title -->
<section id="page-title" class="page-title-classic" style="background-image:url({{ asset('/images/main.jpg') }});background-size: cover;color: white;">
    <div class="container">
        <div class="page-title">
            <h1>Сетка</h1>
            <span>Показывает сотрудников и отделы, в которых они работают</span>
        </div>
    </div>
</section>
<!-- end: Page title -->
<!-- Page Content -->
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <h4>Общая таблица</h4>
                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                            <tr>
                                <th>#</th>
                                @foreach($departments as $department)
                                    <th>{{ $department->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->surname }}</td>
                                    @foreach($departments as $department)
                                        @if($employee->getId($department->id) == $department->id)
                                            <td class="text-center"><i class="fas fa-check"></i></td>                
                                        @else
                                            <td></td>
                                        @endif
                                    @endforeach
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
