@extends('layouts.admin')
@push('script-page')
@endpush
@section('page-title')
    {{__('vender vacation')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('vender.dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('vender vacation')}}</li>
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
            <span class="mt-1" style="color: blue;font-weight: bold">Vender Vacations</span>
            <a href="{{route('venderVacation.create')}}" class="btn btn-primary btn-sm">create new vacation</a>
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

@if($venderVacations->count())
                <table class="table table-borderless text-center " style="direction: rtl">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>vender_name</th>
                        <th>vender_id</th>
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
                    @foreach($venderVacations as $venderVacation)
                        <tr>
                            <td>{{$venderVacation->id}}</td>
                            <td>{{$venderVacation->vender_name}}</td>
                            <td>{{$venderVacation->vender_id}}</td>
                            <td>{{$venderVacation->fromH}}</td>
                            <td>{{$venderVacation->untilH}}</td>
                            <td>{{number_format($venderVacation->untilH-$venderVacation->fromH)}}</td>
                            <td>{{$venderVacation->firstDay}}</td>
                            <td>{{$venderVacation->lastDay}}</td>
                            <td>{{number_format($venderVacation->lastDay-$venderVacation->firstDay)}}</td>
                            <td>
                                <a href="{{route('venderVacation.edit',$venderVacation->id)}}" class="btn btn-primary btn-sm">edit</a>
                            </td>
                            <td>
                                <form action="{{route('venderVacation.destroy',$venderVacation->id)}}" method="post">
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
