@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category
@endsection
@section('admin_layout')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Category infomation</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="#">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#">
                        <div class="text-tiny">Categories</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Category</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.categories.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Category Name <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('name') }}" class="flex-grow" type="text" placeholder="Category name" name="name"
                tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Category Description <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('description') }}" class="flex-grow" type="text" placeholder="Category Description" name="description"
                tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset>
                <div class="body-title">Upload images <span class="tf-color-1">*</span>
                </div>
                <div class="upload-image flex-grow">
                    <div class="item" id="imgpreview" style="display:none">
                        <img src="upload-1.html" class="effect8" alt="">
                    </div>
                    <div id="upload-file" class="item up-load">
                        <label class="uploadfile" for="myFile">
                            <span class="icon">
                                <i class="icon-upload-cloud"></i>
                            </span>
                            <span class="body-text">Drop your images here or select <span
                                class="tf-color">click
                                to browse</span></span>
                                <input value="{{ old('category_image') }}" type="file" id="myFile" name="category_image" accept="image/*">
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