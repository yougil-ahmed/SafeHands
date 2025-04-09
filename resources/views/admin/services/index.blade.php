@extends('admin.layouts.layout')
@section('admin_page_title')
    Services
@endsection
@section('admin_layout')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Services</h3>
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
                    <div class="text-tiny">Services</div>
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
            <a class="tf-button style-1 w208" href="{{ route('admin.services.create') }}"><i
                class="icon-plus"></i>Add new</a>
            </div>
            <div class="wg-table table-all-user">
                <table class="table table-striped table-bordered" style="align-items: center;">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th style="width: 100px;">Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th style="width: 100px;">Price</th>
                            <th style="width: 120px;">Status</th>
                            <th>Location</th>
                            <th>Creation Date</th>
                            <th style="width: fit-content;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    <div class="">
                                        <img src="{{ asset('storage/' . $service->images) }}" alt="" class="image">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.services.show' , $service->id) }}" class="body-title-2">{{ Str::limit($service->title, 16) }}</a>
                                </td>
                                <td>{{ Str::limit($service->description, 16) }}</td>
                                <td>{{ $service->price }} DH</td>
                                <td>
                                    @if($service->status === 'pending')
                                        <form action="{{ route('admin.services.approve', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success" style="
                                                background-color: #dcfce7;
                                                border: 1px solid #22c55e;
                                                color: #166534;
                                            " onclick="return confirm('Approve this service?')">Approve</button>
                                        </form>

                                        <form action="{{ route('admin.services.reject', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger" style="
                                                background-color: #fee2e2;
                                                border: 1px solid #ef4444;
                                                color: #991b1b;
                                                " onclick="return confirm('Reject this service?')">Reject</button>
                                        </form>
                                    @else
                                        <span style="
                                            display: inline-block;
                                            padding: 4px 8px;
                                            border-radius: 4px;
                                            /* font-size: 0.875rem; */
                                            font-weight: 500;
                                            text-transform: capitalize;
                                            letter-spacing: 0.025em;
                                            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
                                            @if($service->status == 'pending')
                                                background-color: #fef9c3;
                                                border: 1px solid #eab308;
                                                color: #854d0e;
                                            @elseif($service->status == 'approved')
                                                background-color: #dcfce7;
                                                border: 1px solid #22c55e;
                                                color: #166534;
                                            @elseif($service->status == 'rejected')
                                                background-color: #fee2e2;
                                                border: 1px solid #ef4444;
                                                color: #991b1b;
                                            @endif
                                        ">
                                            {{ ucfirst($service->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ Str::limit($service->location , 16) }}</td>
                                <td><a href="#" target="_blank">{{ $service->created_at }}</a></td>
                                <td>
                                    <div class="list-icon-function">
                                        {{-- <a href="#"> --}}
                                            <div class="item show">
                                                <a href="{{ route('admin.services.show' , $service->id) }}" class="btn btn-primary"><i class="icon-eye"></i> Show</a>
                                            </div>

                                            <div class="item edit">
                                                <a href="{{ route('admin.services.edit' , $service->id) }}" class="btn btn-success"><i class="icon-edit-3"></i> Edit</a>
                                            </div>
                                        {{-- </a> --}}
                                        <form action="{{ route('admin.services.destroy' , $service->id) }}" method="POST">
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

                        {{ $services->links() }}
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                
            </div>
        </div>
    </div>
@endsection