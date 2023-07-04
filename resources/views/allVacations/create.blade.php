@extends('layouts.admin')
@section('page-title')
    {{__('allVacations')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Role')}}</li>
@endsection

@section('content')
    <div class="card ">
        <div class="card-header" style="color: blue;font-weight: bold">
            Edit Vacation
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

            <form action="{{route('allVacations.update',$vacation->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">

                    <div class="mb-3">
                        <label for="vendername" class="form-label" style="font-weight: bold">vender name</label>
                        <input type="text" class="form-control" id="vendername" aria-describedby="emailHelp"
                               name="vender_name" value="{{ $vacation->vender_name }} ">
                    </div>

                    <div class="mb-3">
                        <label for="venderid" class="form-label" style="font-weight: bold">vender id</label>
                        <input type="text" class="form-control" id="venderid" aria-describedby="emailHelp"
                               name="vender_id" value="{{ $vacation->vender_id }} " >
                    </div>

                    <div class="mb-3">
                        <label for="accountantname" class="form-label" style="font-weight: bold">accountant name</label>
                        <input type="text" class="form-control" id="accountantname" aria-describedby="emailHelp"
                               name="accountant_name" value="{{ $vacation->accountant_name }} " >
                    </div>

                    <div class="mb-3">
                        <label for="accountantid" class="form-label" style="font-weight: bold">accountant id</label>
                        <input type="text" class="form-control" id="accountantid" aria-describedby="emailHelp"
                               name="accountant_id" value="{{ $vacation->accountant_id }} " >
                    </div>

                    <div class="mb-3">
                        <label for="fromh" class="form-label" style="font-weight: bold">from hours</label>
                        <input type="text" class="form-control" id="fromh" aria-describedby="emailHelp"
                               name="fromH" value="{{ $vacation->fromH }} ">
                    </div>

                    <div class="mb-3">
                        <label for="untilh" class="form-label" style="font-weight: bold">until hours</label>
                        <input type="text" class="form-control" id="untilh" aria-describedby="emailHelp"
                               name="untilH" value="{{ $vacation->untilH }} ">
                    </div>
                    <div class="mb-3">
                        <label for="firstday" class="form-label" style="font-weight: bold">First Day</label>
                        <input type="text" class="form-control" id="firstday" aria-describedby="emailHelp"
                               name="firstDay" value="{{ $vacation->firstDay}}">
                    </div>
                    <div class="mb-3">
                        <label for="lastday" class="form-label" style="font-weight: bold">last Day</label>
                        <input type="text" class="form-control" id="lastday" aria-describedby="emailHelp"
                               name="lastDay" value="{{ $vacation->lastDay}}">
                    </div>

                    <button type="submit" class="btn btn-primary ">
                        edit
                    </button>
            </form>
        </div>
    </div>
@endsection
