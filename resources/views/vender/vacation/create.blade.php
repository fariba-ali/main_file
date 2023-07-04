@extends('layouts.admin')
@section('page-title')
    {{__('vender Vacation')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('vender vaction')}}</li>
@endsection

@section('content')
    <div class="card ">
        <div class="card-header" style="color: blue;font-weight: bold">

            @isset($allVacation)
            Edit Vacation
            @else
            Create Vacation
            @endisset

        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill"/>
                    </svg>
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{isset($allVacation)? route('venderVacation.update',$allVacation->id) : route('venderVacation.store')}}" method="post" >
                @csrf
                @isset($allVacation)
                    @method('PUT')
                @endisset

                <div class="mb-3">
                    <label for="fromh" class="form-label" style="font-weight: bold">from hours</label>
                    <input type="text" class="form-control" id="fromh" aria-describedby="emailHelp"
                           name="fromH" value="{{isset($allVacation) ? $allVacation->fromH : ''}} ">
                </div>

                <div class="mb-3">
                    <label for="untilh" class="form-label" style="font-weight: bold">until hours</label>
                    <input type="text" class="form-control" id="untilh" aria-describedby="emailHelp"
                           name="untilH" value="{{isset($allVacation) ? $allVacation->untilH : ''}} ">
                </div>
                <div class="mb-3">
                    <label for="firstday" class="form-label" style="font-weight: bold">First Day</label>
                    <input type="text" class="form-control" id="firstday" aria-describedby="emailHelp"
                           name="firstDay" value="{{isset($allVacation) ? $allVacation->firstDay : ''}}">
                </div>
                <div class="mb-3">
                    <label for="lastday" class="form-label" style="font-weight: bold">last Day</label>
                    <input type="text" class="form-control" id="lastday" aria-describedby="emailHelp"
                           name="lastDay" value="{{ isset($allVacation) ? $allVacation->lastDay : ''}}">
                </div>

                <button type="submit" class="btn btn-primary ">
                    @isset($allVacation)
                        edit
                    @else
                        create
                    @endisset

                </button>
            </form>
        </div>
    </div>
@endsection
