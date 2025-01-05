@extends('layouts.app')

@section('title', '新規ファイル登録')

@section('content')
<!-- コンテンツ -->
<?php
    echo '<pre>';
    var_dump( $errors );
    echo '</pre>';
?>
<div class="container">
    <div class="col-md-8 mt-5 w-75 mx-auto">
        <div class="card">
            <div class="card-header">新規ファイル登録</div>
            <div class="card-body">
                <form method="post" action="{{ route('file.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="filename" class="form-label">ファイル名（拡張子を除く）　<span class="badge bg-danger">必須</span></label>
                        <input type="text" class="form-control" id="filename" name="filename" value="{{old('filename')}}">
                        <div id="filenameError" class="form-text text-danger">
                            @if ($errors->has('filename'))
                            {{$errors->first('filename')}}
                            @endif　
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="file" class="form-label">ファイルを選択</label>
                            <input type="file" class="form-control" id="form" name="file">
                        </div>
                        <div id="fileError" class="form-text text-danger">
                            @if ($errors->has('file'))
                                {{$errors->first('file')}}
                            @endif　
                        </div>
                    </div>
                    <a href="{{route('sample.list')}}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> 一覧画面へ戻る</a>　
                    <button type="submit" class="btn btn-dark" id="formButton"><i class="fas fa-plus-circle"></i> ファイルを新規追加</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection