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
                                        <div class="card">

                                            <div class="card-header">
                                              <h1 class="display-3" style="text-align: center">  {{$tale -> title}}</h1>
                                            </div>

                                            <div class="card-body" style="height: 100px;overflow: hidden;
                                                background-color: {{$tale->background_color}};color:{{$tale->font_color}} ">
                                                {{$tale -> contents}}

                                            </div>

                                            <div class="card-footer">
                                                <img height="30" width="30" style="border-radius: 50%"  src="{{asset('photos/'.$tale->user->photo)}}" />
                                                {{$tale->user->name}}
                                            </div>

                                        </div>
                                    </div>
                               <br>
                                {{-- For add comment --}}
                                <div class="col-md-12">
                                 <form method="post" action="{{route('Tales.comment',[$tale->id])}}">
                                     @CSRF
                                     <br>
                                     <label>Add comment</label>
                                     <textarea class="form-control" placeholder="Add your cooment" name="comment"></textarea>
                                  <button type="submit" style="float: right" class="btn btn-success">Send</button>
                                 </form>
                                </div>
                                {{-- For comments display--}}
                                <div class="col-md-12">
                                    @foreach($tale->comments as $comment)
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                <img height="30" width="30" style="border-radius: 50%"  src="{{asset('photos/'.$comment->user->photo)}}" />
                                                {{$comment->user->name}}
                                                @if($comment->user_id == \Illuminate\Support\Facades\Auth::id())
                                                    <form method="post" action="{{route('Comment.delete',[$comment->id])}}">
                                                        @CSRF
                                                        @method('DELETE')
                                                        <button style="float: right" class="btn btn-danger" type="submit">Delete</button>
                                                    </form>

                                                    @endif

                                            </div>
                                            <div class="card-body">
                                                {{$comment->comment}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
