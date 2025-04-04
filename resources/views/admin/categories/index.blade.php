@extends('admin.layouts.layout')
@section('admin_page_title')
    Categories
@endsection
@section('admin_layout')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Categories</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li>
                <a href="index.html">
                    <div class="text-tiny">Dashboard</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">Categories</div>
            </li>
        </ul>
    </div>
    
    <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
            <div class="wg-filter flex-grow">
                <form class="form-search">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." class="" name="name"
                        tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            <a class="tf-button style-1 w208" href="{{ route('admin.categories.create') }}"><i
                class="icon-plus"></i>Add new</a>
            </div>
            <div class="wg-table table-all-user">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ asset('storage/' . $category->category_image) }}" alt="" class="image">
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="body-title-2">{{ $category->name }}</a>
                                </td>
                                <td>{{ $category->description }}</td>
                                <td><a href="#" target="_blank">{{ $category->created_at }}</a></td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="#">
                                            <div class="item edit">
                                                <a href="{{ route('admin.categories.edit' , $category->id) }}" class="btn btn-success"><i class="icon-edit-3"></i> Edit</a>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy' , $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <button type="submit" class="btn btn-danger"><i class="icon-trash-2"></i> Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{ $categories->links() }}
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                
            </div>
        </div>
    </div>
@endsection