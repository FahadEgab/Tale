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
                                    <form method="post" action="{{route('Tales.update',[$tale->id])}}" >
                                        @CSRF
                                        @method('PUT')
                                        <label>The title</label>
                                        <input type="text" class="form-control" name="title" value="{{$tale->title}}" placeholder="the title of the tale" />
                                        <br>
                                        <label>The contents of tale</label>
                                        <textarea class="form-control" name="contents"  placeholder="the content of the tale">{{$tale->contents}}</textarea>
                                        <br>
                                        <label>The background color</label>
                                        <input type="color"  name="background_color" value="{{$tale->background_color}}">
                                        <br>
                                        <label>The font color</label>
                                        <input type="color"  name="font_color" value="{{$tale->color_color}}">
                                        <br>
                                        <button type="submit" class="btn btn-primary" style="float: right" >update</button>
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
