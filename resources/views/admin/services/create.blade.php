@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Service
@endsection
@section('admin_layout')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Service infomation</h3>
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
                        <div class="text-tiny">Services</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Service</div>
                </li>
            </ul>
        </div>
        <!-- new-Service -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.services.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Service Title <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('title') }}" class="flex-grow" type="text" placeholder="Service Title" name="title"
                tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="category">
                <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                </div>
                <div class="select flex-grow">
                    <select class="" name="category_id">
                        <option>Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
            <fieldset class="description">
                <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                </div>
                <textarea class="mb-10" name="description" placeholder="Description"
                    tabindex="0" aria-required="true" required="">{{ old('description') }}</textarea>
                {{-- <div class="text-tiny">Do not exceed 100 characters when entering the
                    Serive description.</div> --}}
            </fieldset>
            {{-- <fieldset class="price">
                <div class="body-title">Price <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('') }}" class="flex-grow" type="number" placeholder="Service Price" name="price"
                tabindex="0" value="" aria-required="true" required="">
            </fieldset> --}}
            <fieldset class="name">
                <div class="body-title">Service Location <span class="tf-color-1">*</span>
                </div>
                <input value="{{ old('location') }}" class="flex-grow" type="text" placeholder="Service Location" name="location"
                tabindex="0" value="" aria-required="true" required="">
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
                                <input value="{{ old('service_image') }}" type="file" id="myFile" name="service_image">
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
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
                                <input value="{{ old('images') }}" type="file" id="myFile" name="images" accept="image/*">
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