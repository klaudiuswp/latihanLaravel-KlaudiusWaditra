@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Chat') }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container" id="app">
                            <p class="text-center p-0 m-0">Laravel Application</p>
                            <h1 class="text-center p-0 m-0">Gemini AI Chat</h1>
                            <div class="card mt-4">
                                <div class="card-header p-2">
                                    Chat guru mtk
                                </div>
                                <div class="card-body">

                                    @foreach ($chats as $chat)
                                        <!-- Chat Messages Section -->
                                        <div class="chat-box">
                                            <!-- User Messages -->
                                            <div class="message right-message bg-primary text-white p-2 mt-3 rounded">
                                                <b>You</b>
                                                <br>
                                                <p>{{ $chat->send_chat }}</p>
                                            </div>
                                            <div class="message left-message bg-light p-2 mt-3 rounded">
                                                <b>Gemini AI</b>
                                                <br>
                                                <p>{!! Str::markdown($chat->get_chat) !!}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Send Message Form -->
                                    <form action="chat" method="POST">
                                        @csrf
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Masukkan perintah disini..." class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-right mt-2">
                                            <div class="col-lg-10"></div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-primary w-100">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
