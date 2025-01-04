@extends('layouts.app')

@section('title', 'サンプル一覧')

@section('content')
<div>
    <div class="w-100 mx-auto mt-5 text-end d-flex justify-content-between align-items-center">
        <h2 class="fs-4 mb-0">サンプル一覧</h2>
        <a href="{{route('sample.goAdd')}}" class="btn btn-dark"><i class="fas fa-folder-plus"></i> 新規サンプルデータ登録</a>
    </div>
    @if($samples->count() === 0)
        <div>データが存在しません</div>
    @else
        <table class="table table-striped w-100 mx-auto mt-3 table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">memo</th>
                </tr>
            </thead>
            <tbody>
            @foreach($samples as $sample)
                <tr>
                    <td class="text-primary">{{ $sample->title }}</td>
                    <td>{{ $sample->memo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection