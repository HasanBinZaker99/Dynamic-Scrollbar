@extends('CRM.layouts_successLeeds.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

                    <div class="col-sm-12 pb-0 px-0">
                        <nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #f0f6ff;">
                            <a class="navbar-brand" href="#">{{$leed->clientName}}</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item active ml-lg-5">
                                        <a class="nav-link" href="{{route('success-leeds-panel',['id'=>$leed->id])}}">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('all-meeting',['id'=>$leed->id])}}">Meetings</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Quotations
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('all-quotation', ['id'=>$leed->id])}}">View Quotation</a>
                                            <a class="dropdown-item" href="{{route('add-cart',['id'=>$leed->id])}}">House Area Cart</a>
                                            <a class="dropdown-item" href="{{route('all-house-area-type', ['id'=>$leed->id])}}">House Area Type</a>
                                            <a class="dropdown-item" href="{{route('all-decoration-type', ['id'=>$leed->id])}}">Decoration Type</a>
                                            <a class="dropdown-item" href="{{route('edit-sub-body', ['id'=>$leed->id])}}">Subject & Body</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Measurements
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('view-measurement', ['id'=>$leed->id])}}">View Measurement</a>
                                            <a class="dropdown-item" href="{{route('measure-cart', ['id'=>$leed->id])}}">Measurement Cart</a>
                                            <a class="dropdown-item" href="{{route('all-measure-struct', ['id'=>$leed->id])}}">Measurement Structure</a>
                                            <a class="dropdown-item" href="{{route('all-measure-types', ['id'=>$leed->id])}}">Measurement Type</a>
                                        </div>
                                    </li>
                                    <li class="nav-item  ml-lg-2">
                                        <a href ="{{ route('designPage',['id'=>$leed->id]) }}" class="nav-link fw-normal fs-1 active" >Design Work</a>
                                    </li>
                                    <li class="nav-item  ml-lg-2">
                                        <a href ="{{ route('allDeed',['id'=>$leed->id]) }}" class="nav-link fw-normal fs-1 active" >Deed</a>
                                    </li>
                                    <li class="nav-item  ml-lg-2">
                                        <a href ="#" class="nav-link fw-normal fs-1 active" >Purchase History</a>
                                    </li>
                                    <li class="nav-item  dropdown">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#" id="navbarDropdownMenuLink" aria-expanded="false">Payment</a>
                                        <div class="dropdown-menu" aria-labellledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="/project-sell-amount" >Clients Porject Amount</a>
                                            <a class="dropdown-item" href="" >Clients Payment Schedule</a>
                                            <a class="dropdown-item" href="" >Purchase Payment</a>
                                            <a class="dropdown-item" href="" >Project Sell Payment</a>
                                            <a class="dropdown-item" href="" >Labour  Payment</a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <section class="content mt-4 mx-3">
                        <div class="container-fluid">
                            <div class="row">
                                @yield('leedContent')
                            </div>
                        </div>
                    </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
