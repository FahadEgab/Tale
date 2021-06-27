@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">




               <div class="container-fluid">
                   <div class="row">
                       @foreach($tales as $tale)
                       <div class="col-md-4" style="margin-bottom: 10px">
                           <div class="card">
                               <div class="card-header">
                                   {{$tale -> title}}
                               </div>
                               <div class="card-body" style="height: 100px;overflow: hidden">
                                   {{$tale -> contents}}
                                   <a href="{{route('Tales.show',[$tale -> id])}}" style="position: absolute!important;bottom: 0;right: 0;" class="btn btn-success">عرض</a>
                               </div>

                               <div class="card-footer">
                                   <img height="30" width="30" style="border-radius: 50%"  src="{{asset('photos/'.$tale->user->photo)}}" />
                                   {{$tale->user->name}}
                               </div>

                           </div>
                       </div>
                       @endforeach
                       <div class="col-12" style="text-align: center">
                           {!! $tales->links() !!}
                       </div>
                   </div>

               </div>
            </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
