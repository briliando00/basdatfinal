@extends('layouts.master')
@section('content')
<div style="position :relative;">
        <div class="news-wrapper" style="margin-right: 20%;">
        @foreach($post as $item)
            <div class="card" style="margin-left: 5%; margin-top: 2%;">
                <div class="item1"><img src="{{ Storage::url('public/posts/').$item->image }}" class="rounded" height="250px" width="550px"></div>
                <div class="item2">
                    <span class="title" style="text-align: left;">{{$item->title}}</span>
                    <div class="time">oleh <span>{{$item->user->name}}</span> FEBRUARY 3, 2021</div>
                    <div class="content">{!! $item->artikel !!}</div>
                </div>
            </div>
            @endforeach
            

        <div class="sidebar">

            <div class=sidebartitle> TRENDING TOPIC</div>
            <div class="search-container">
                <form>
                    <input class="searchbox" type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="sidebar-contain">
                <a href="#">
                    <h5>Anak TK ini Menemukan Rumus Aljabar Linear</h5>
                </a>
                <a href="#">
                    <h5>Cara agar aman terhindar dari covid 19 di lingkungan sekolah</h5>
                </a>
                <a href="#">
                    <h5>Siswa Madrasah 1 malang ini mewakili indonesia di lomba baca Al -Qur'an di Tingkat Internasional</h5>
                </a>
            </div>
        </div>
    </div>
    <div class="pagination" style="padding-left: 40%; padding-bottom: 3%;">
        <a href="#">Prev</a></li>
        <a href="#">1</a></li>
        <a href="#">2</a></li>
        <a href="#">3</a></li>
        <a href="#">Next</a></li>
    </div>
@endsection
