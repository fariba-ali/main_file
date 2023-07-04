@extends('layouts.admin')
@section('page-title')
    {{__('vacation')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Role')}}</li>
@endsection
@section('content')
    <div class="card card-default ">
        <div class="card-header justify-content-between d-flex">
            <span class="mt-1" style="color: blue;font-weight: bold">All Vacations</span>
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

         @if($allvacations->count())
                <table class="table table-borderless text-center " style="direction: rtl">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>vender_name</th>
                        <th>vender_id</th>
                        <th>accountant_name</th>
                        <th>accountant_id</th>
                        <th>fromH</th>
                        <th>untilH</th>
                        <th>AllHours</th>
                        <th>firstDay</th>
                        <th>lastDay</th>
                        <th>AllDays</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allvacations as $allvacation)
                        <tr>
                            <td>{{$allvacation->id}}</td>
                            <td>{{$allvacation->vender_name}}</td>
                            <td>{{$allvacation->vender_id}}</td>
                            <td>{{$allvacation->accountant_name}}</td>
                            <td>{{$allvacation->accountant_id}}</td>
                            <td>{{$allvacation->fromH}}</td>
                            <td>{{$allvacation->untilH}}</td>
                            <td>{{number_format($allvacation->untilH-$allvacation->fromH)}}</td>
                            <td>{{$allvacation->firstDay}}</td>
                            <td>{{$allvacation->lastDay}}</td>
                            <td>{{number_format($allvacation->lastDay-$allvacation->firstDay)}}</td>
                            <td>
                                <a href="{{route('allVacations.edit',$allvacation->id)}}" class="btn btn-primary btn-sm">edit</a>
                            </td>
                            <td>
                                <form action="{{route('allVacations.destroy',$allvacation->id)}}" method="post">
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
