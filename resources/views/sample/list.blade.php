@extends('layouts.app')

@section('title', 'sample')

@section('content')
<div>
    <h2>sample</h2>
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