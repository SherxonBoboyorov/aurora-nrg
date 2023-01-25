@extends('layouts.admin')

@section('title', 'Edit Number')
    
@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit number</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- end page title end breadcrumb -->
            <form action="{{ route('number.update', $number->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="number">Number</label>
                                <input type="text" id="number" value="{{ $number->number }}" class="form-control" name="number">
                                @if($errors->has('number'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('number') }}
                                    </div><br><br>
                                @endif
                            </div>

                            <div class="col-md-8">
                              <label for="title_uz">Title [Uzbek]</label>
                              <input type="text" id="title_uz" value="{{ $number->title_uz }}" class="form-control" name="title_uz">
                              @if($errors->has('title_uz'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      {{ $errors->first('title_uz') }}
                                  </div>
                              @endif
                          </div>
                          <div class="col-md-8">
                            <label for="title_ru">Title [Russian]</label>
                            <input type="text" id="title_ru" value="{{ $number->title_ru }}" class="form-control" name="title_ru">
                            @if($errors->has('title_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('title_ru') }}
                                </div>
                            @endif
                        </div>
                            <div class="col-md-8">
                                <label for="title_en">Title [English]</label>
                                <input type="text" id="title_en" value="{{ $number->title_en }}" class="form-control" name="title_en">
                                @if($errors->has('title_en'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('title_en') }}
                                    </div>
                                @endif
                            </div>
                        </div><br><samp></samp>
                       

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="meta_title_ru">Meta Title RU</label>
                                <textarea name="meta_title_ru" class="form-control" id="meta_title_ru" cols="30" rows="10">{{ $number->meta_title_ru }}</textarea>
                                @if($errors->has('meta_title_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_title_ru') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description_ru">Meta Description RU</label>
                                <textarea name="meta_description_ru" class="form-control" id="meta_description_en" cols="30" rows="10"{{ $number->meta_description_en }}></textarea>
                                @if($errors->has('meta_description_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_description_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>
    
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="meta_title_uz">Meta Title UZ</label>
                                <textarea name="meta_title_uz" class="form-control" id="meta_title_uz" cols="30" rows="10">{{ $number->meta_title_uz }}</textarea>
                                @if($errors->has('meta_title_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_title_uz') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description_uz">Meta Description UZ</label>
                                <textarea name="meta_description_uz" class="form-control" id="meta_description_uz" cols="30" rows="10">{{ $number->meta_description_uz}}</textarea>
                                @if($errors->has('meta_description_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_description_uz') }}
                                </div>
                                @endif
                            </div>
                        </div>
    
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="meta_title_en">Meta Title EN</label>
                                <textarea name="meta_title_en" class="form-control" id="meta_title_en" cols="30" rows="10">{{ $number->meta_title_en }}</textarea>
                                @if($errors->has('meta_title_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_title_en') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description_en">Meta Description EN</label>
                                <textarea name="meta_description_en" class="form-control" id="meta_description_en" cols="30" rows="10">{{ $number->meta_description_en }}</textarea>
                                @if($errors->has('meta_description_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('meta_description_en') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
