@extends('layouts.app')

@section('content')

    <div class="" style="background-color: orange; width: 100%; height: 200px">
        <div>

            <form action="{{route('uploadData')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="product_name">
                <input type="file" name="image">
                <textarea name="description"></textarea>
                <input type="submit" value="Hadgalah" style="cursor: pointer">
            </form>
        </div>
    </div>
@endsection