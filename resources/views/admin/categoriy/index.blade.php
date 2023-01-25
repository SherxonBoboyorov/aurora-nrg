@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Category list</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-body">

                @if(session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>

                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 2%;">#</th>
                            <th>Image</th>
                            <th>Title [Uzbek]</th>
                            <th>Title [Russian]</th>
                            <th>Title [English]</th>
                            <th colspan="2" style="width: 2%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriys as $categoriy)
                        <tr>
                            <td>{{ $categoriy->id }}</td>
                            <td>
                                @if($categoriy->image)
                                <img src="{{ asset($categoriy->image) }}" width="50" height="50" alt="">
                                @endif
                            </td>
                            <td>{{ $categoriy->title_uz }}</td>
                            <td>{{ $categoriy->title_ru }}</td>
                            <td>{{ $categoriy->title_en }}</td>
                            <td>
                                <a href="{{ route('categoriy.edit', $categoriy->id) }}" class="btn btn-info btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('categoriy.destroy', $categoriy->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-icon">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {!! $categories->links() !!} --}}
            </div>
        </div>

    </div>
</div>
@endsection