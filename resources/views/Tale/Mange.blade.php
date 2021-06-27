@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        <th>Activation</th>
                                    </tr>
                                    @foreach($tales as $tale)
                                    <tr>
                                        <td>{{$tale->id}}</td>
                                        <td>{{$tale->title}}</td>
                                        <td><a href="{{route('Tales.edit',[$tale->id])}}" class="btn btn-primary">Update</a></td>
                                        <td>
                                            <form method="post" action="{{route('Tales.destroy',[$tale->id])}}" >
                                                <div class="d-flex me-auto" style="padding: 1%;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" style="float: left;">Delete</button>
                                                </div>
                                                </form>
                                        </td>

                                        <td>
                                           @if($tale->active == 0)
                                            <form method="post" action="{{route('Tales.active',[$tale->id])}}" >
                                                <div class="d-flex me-auto" style="padding: 1%;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-success" style="float: left;">Active</button>
                                                </div>

                                            </form>
                                            @else
                                            Is Active
                                            @endif

                                        </td>

                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" >
                                           <div style="text-align: center">
                                               {!! $tales->links() !!}
                                           </div>
                                        </td>

                                    </tr>
                                </table>



                                <div class="col-12">


                                @if(Session::has('msg'))
                                    <div class="alert alert-warning" role="alert">
                                        {{Session::get('msg')}}
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
