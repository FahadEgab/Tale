@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">




                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{asset('photos/'.$user->photo)}}" width="150" height="150" />
                                    <form method="post" action="{{route('User.update',[$user->id])}}" enctype="multipart/form-data" >
                                        @CSRF
                                        @method('PUT')
                                        <label>Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                                        <br>
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                                        <br>
                                        <label>Phone:</label>
                                        <input type="number" class="form-control" name="phone" value="{{$user->phone}}"/>
                                        <br>
                                        <br>
                                        <label>Photo:</label>
                                        <input type="file" accept="png jpg" class="form-control-file" name="photo" value="{{$user->photo}}"/>
                                        <br>
                                        <label>Gender:</label>
                                        <br>
                                        @if($user->gender == 0)
                                        Male:
                                        <input type="radio" checked  name="gender" value="0"/>
                                        <br>
                                        Female:
                                        <input type="radio"   name="gender" value="1"/>
                                        <br>
                                        @elseif($user->gender == 1)
                                            Male:
                                            <input type="radio"   name="gender" value="0"/>
                                            <br>
                                            Female:
                                            <input type="radio"  checked name="gender" value="1"/>
                                            <br>
                                        @else
                                            Male:
                                            <input type="radio"    name="gender" value="0"/>
                                            <br>
                                            Female:
                                            <input type="radio"   name="gender" value="1"/>
                                            <br>
                                            @endif

                                        <button type="submit" class="btn btn-success" style="float: right" >Update</button>
                                    </form>
                                    <form style="margin-top: 50px;justify-content: center;text-align: right" action="{{route('User.delete',[$user->id])}}" method="post">
                                        @CSRF
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete my account</button>
                                    </form>
                                    @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('success')}}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
