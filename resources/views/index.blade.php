@extends('layouts.app')

@section('title')
    <title>Все контакты</title>
@endsection

@section('body')
    <h1 class="display-4 text-center mt-3">Все контакты</h1>

    <main class="mt-3 text-center">
        @forelse($contacts as $contact)
            <div class="card w-25 ml-auto mr-auto mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $contact->name }}</h5>
                    <p class="card-text">{{ $contact->email }}</p>
                    @if($user->notInFavorites($contact))
                        <form action="{{ route('add') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $contact->id }}" name="contact_id">
                            <button type="submit" class="btn btn-success">В избранное</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p>Здесь пока пусто</p>
        @endforelse
    </main>
@endsection
