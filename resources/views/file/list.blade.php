@extends('layouts.app')

@section('title', 'ファイル一覧')

@section('content')
<div class="w-100">
    <div class="w-100 mx-auto mt-5 text-end d-flex justify-content-between align-items-center">
        <h2 class="fs-4 mb-0">ファイル一覧</h2>
        <a href="{{route('file.goAdd')}}" class="btn btn-dark"><i class="fas fa-folder-plus"></i> 新規ファイル登録</a>
    </div>
    @if($files->count() === 0)
    <div>データが存在しません</div>
    @else
    <div class="row row-cols-3 w-100 mb-5">
        @foreach($files as $file)
        <div class="col mt-5">
            <div class="card">
                <div class="card-img-top bg-dark d-flex justify-content-center align-items-center" style="height:15rem;">
                    @if(in_array($file->filetype, $fileTypes["image"], true))
                        <img src="{{ asset('files/' . $file->filename . '.' . $file->filetype ) }}" class="bg-secondary" style="height:15rem; max-width: 100%;" alt="...">
                    @elseif(in_array($file->filetype, $fileTypes["video"], true))
                        <video src="{{ asset('files/' . $file->filename . '.' . $file->filetype ) }}" class="bg-secondary" style="height:15rem; max-width: 100%; border-radius: 0.375rem" controls></video>
                    @elseif(in_array($file->filetype, $fileTypes["audio"], true))
                        <audio src="{{ asset('files/' . $file->filename . '.' . $file->filetype ) }}" controls></audio>
                    @endif
                </div>
                <div class="card-body">
                    <?php $filepath = asset('files/' . $file->filename . '.' . $file->filetype) ?>
                    <p class="card-text">{{ $filepath }}</p>
                    <button type="button" class="btn btn-primary" onclick="onClickCopyLink('{{ $filepath }}')">Copy link</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
<script>
    const onClickCopyLink = (path) => {
        navigator.clipboard.writeText(path)
            .then(() => {
                alert('リンクをコピーしました: ' + path);
            })
            .catch(err => {
                console.error('クリップボードにコピーできませんでした: ', err);
            });
    }
</script>
@endsection