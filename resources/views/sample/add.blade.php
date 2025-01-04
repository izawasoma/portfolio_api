@extends('layouts.app')

@section('title', 'sample')

@section('content')
<!-- コンテンツ -->
<div class="container">
    <div class="col-md-8 mt-5 w-75 mx-auto">
        <div class="card">
            <div class="card-header">新規案件登録</div>
            <div class="card-body">
                <form method="post" action="{{ route('sample.add') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">タイトル　<span class="badge bg-danger">必須</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        <div id="titleError" class="form-text text-danger">
                            @if ($errors->has('title'))
                                {{$errors->first('title')}}
                            @endif　
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="memo" class="form-label">メモ　<span class="badge bg-danger">必須</span></label>
                        <input type="text" class="form-control" id="memo" name="memo" value="{{old('memo')}}">
                        <div id="memoError" class="form-text text-danger">
                            @if ($errors->has('memo'))
                                {{$errors->first('memo')}}
                            @endif　
                        </div>
                    </div>
                    <a href="{{route('sample.list')}}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> 顧客情報一覧へ戻る</a>　
                    <button type="submit" class="btn btn-dark" id="formButton"><i class="fas fa-plus-circle"></i> サンプルデータを新規追加</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection