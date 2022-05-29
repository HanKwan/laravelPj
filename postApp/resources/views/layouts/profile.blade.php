@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 mt-4 w-7/12">
            <div class="font-medium text-2xl">{{ $user->name }}</div>
            <div class="mb-6 text-gray-600">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and {{$user->recievedLikes->count()}} {{ Str::plural('like', $user->recievedLikes->count()) }} recieved</div>
            <div>
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
    </div>
@endsection