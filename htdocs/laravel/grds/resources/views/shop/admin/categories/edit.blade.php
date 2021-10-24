@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\ShopCategories $item */
    @endphp

    @if($item->exists)
        <form method="Post" action="{{route('shop.admin.categories.update', $item -> id ) }}">
        @method('PATCH')
    @else
        <form method="Post" action="{{route('shop.admin.categories.store') }}">
    @endif
        @csrf
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{$errors->first()}}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('shop.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('shop.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>

@endsection
