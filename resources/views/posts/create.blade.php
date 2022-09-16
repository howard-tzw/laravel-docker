@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <label>內容：
                        <textarea name="content"></textarea>
                    </label><br>
                    <input type="submit" value="送出文章">
                </form>
            </div>
        </div>
    </div>
@endsection
