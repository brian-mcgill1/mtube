<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'forbid-banned-user']], function () {
    Route::get('/user/dashboard', function () {
        return view('frontend.user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/profile', function () {
        return view('frontend.user.profile.index');
    })->name('user.profile');

    Route::get('/user/channels', function () {
        return view('frontend.user.channel.index');
    })->name('user.channels');

    Route::get('/user/channels/{id}', function ($id) {
        return view('frontend.user.channel.show')->with([
            'channel' => auth()->user()->channels()->find($id)
        ]);
    })->name('user.channels.show');

    Route::get('/user/channels/{channel_id}/live/producer/{video_id}', function ($channel_id, $video_id) {
        return view('frontend.user.channel.live')->with([
            'channel_id' => $channel_id,
            'video_id' => $video_id
        ]);
    })->name('user.channels.live');
});
