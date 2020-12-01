@extends('layouts.app')

@section('title')
    <title>Избранное</title>
@endsection

@section('body')
    <h1 class="display-4 text-center mt-3">Избранное</h1>

    <main class="mt-3 text-center">
        @forelse($favorites as $contact)
            <div class="card w-25 ml-auto mr-auto mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $contact->name }}</h5>
                    <p class="card-text">{{ $contact->email }}</p>
                </div>
            </div>
        @empty
            <p>Здесь пока пусто</p>
        @endforelse
    </main>
@endsection
