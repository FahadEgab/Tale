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
                                <form method="post" action="{{route('Tales.store')}}" >
                                 @CSRF
                                    <label>The title</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="the title of the tale" />
                                    <br>
                                    <label>The contents of tale</label>
                                    <textarea class="form-control" name="contents" value="{{old('contents')}}" placeholder="the content of the tale"></textarea>
                                    <br>
                                    <label>The background color</label>
                                    <input type="color"  name="background_color" value="#FFFFFF">
                                    <br>
                                    <label>The font color</label>
                                    <input type="color"  name="font_color" value="#000000">
                                    <br>
                                    <button type="submit" class="btn btn-success" style="float: right" >Send</button>
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
