@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 mt-4 w-7/12">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"/>   {{-- only with double quotation --}}
                @endforeach
                {{ $posts->links() }}
            @else
                There is no post yet
            @endif
        </div>
    </div>
@endsection