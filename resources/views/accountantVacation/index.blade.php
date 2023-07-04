@extends('layouts.admin')
@push('script-page')
@endpush
@section('page-title')
    {{__('accountant vacation')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('accountant vacation')}}</li>
@endsection
@section('action-btn')
    <div class="float-end">
        <!-- <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" data-bs-toggle="tooltip" title="{{__('Filter')}}">
            <i class="ti ti-filter"></i>
        </a> -->
    </div>
@endsection
@section('content')
    <div class="card card-default ">
        <div class="card-header justify-content-between d-flex">
            <span class="mt-1" style="color: blue;font-weight: bold">Accountatnt Vacations</span>
            <a href="{{route('accountantVacation.create')}}" class="btn btn-primary btn-sm">create new vacation</a>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    @foreach($errors->all() as $error)
                        <div>
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif

@if($accountantVacations->count())
                <table class="table table-borderless text-center " style="direction: rtl">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>accountant_name</th>
                        <th>accountant_id</th>
                        <th>created_by</th>
                        <th>fromH</th>
                        <th>untilH</th>
                        <th>totalHours</th>
                        <th>firstDay</th>
                        <th>lastDay</th>
                        <th>total Days</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountantVacations as $accountantVacation)
                        <tr>
                            <td>{{$accountantVacation->id}}</td>
                            <td>{{$accountantVacation->accountant_name}}</td>
                            <td>{{$accountantVacation->accountant_id}}</td>
                            <td>{{$accountantVacation->created_by}}</td>
                            <td>{{$accountantVacation->fromH}}</td>
                            <td>{{$accountantVacation->untilH}}</td>
                            <td>{{number_format($accountantVacation->untilH-$accountantVacation->fromH)}}</td>
                            <td>{{$accountantVacation->firstDay}}</td>
                            <td>{{$accountantVacation->lastDay}}</td>
                            <td>{{number_format($accountantVacation->lastDay-$accountantVacation->firstDay)}}</td>
                            <td>
                                <a href="{{route('accountantVacation.edit',$accountantVacation->id)}}" class="btn btn-primary btn-sm">edit</a>
                            </td>
                            <td>
                                <form action="{{route('accountantVacation.destroy',$accountantVacation->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <span class="text-danger">There is no vacation </span>
            @endif

        </div>
    </div>
@endsection
