@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit {{ $category->name }}
@endsection
@section('admin_layout')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Category infomation</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <div class="text-tiny">Categories</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Edit Category</div>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ $category->name }}</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.categories.update' , $category->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="name">
                <div class="body-title">Category Name <span class="tf-color-1">*</span>
                </div>
                <input class="flex-grow" type="text" placeholder="Category name" name="name"
                tabindex="0" value="{{ old('name' , $category->name) }}" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Category Description <span class="tf-color-1">*</span>
                </div>
                <input class="flex-grow" type="text" placeholder="Category Description" name="description"
                tabindex="0" value="{{ old('description' , $category->description) }}" aria-required="true" required="">
            </fieldset>
            <fieldset>
                <div class="body-title">Upload images <span class="tf-color-1">*</span>
                </div>
                <div class="upload-image flex-grow">
                    <div class="item" id="imgpreview" 
                        style="background-image: url('{{ old('category_image', asset('storage/' . $category->category_image)) }}');
                                background-size: cover; background-position: center; {{ old('category_image', $category->category_image) ? '' : 'display:none;' }}">
                    </div>
                    <div id="upload-file" class="item up-load">
                        <label class="uploadfile" for="myFile">
                            <span class="icon">
                                <i class="icon-upload-cloud"></i>
                            </span>
                            <span class="body-text">Drop your images here or select
                                <span class="tf-color">click to browse</span>
                            </span>
                            <input type="file" id="myFile" name="category_image" accept="image/*">
                        </label>
                    </div>
                </div>
                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection