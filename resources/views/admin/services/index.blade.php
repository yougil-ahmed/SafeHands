@extends('admin.layouts.layout')
@section('admin_page_title')
    Services
@endsection
@section('admin_layout')

    <style>
                                            /* Add these styles to your CSS file */

                                            /* Modal styling */
                                            .modal-content {
                                                border-radius: 0.5rem;
                                                overflow: hidden;
                                            }

                                            .modal-header {
                                                border-bottom: 1px solid rgba(0,0,0,0.05);
                                                padding: 1rem 1.5rem;
                                            }

                                            .modal-footer {
                                                border-top: 1px solid rgba(0,0,0,0.05);
                                                padding: 1rem 1.5rem;
                                            }

                                            /* Form controls styling */
                                            .form-control:focus, .form-select:focus {
                                                border-color: #dee2e6;
                                                box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15);
                                            }

                                            textarea.form-control {
                                                resize: vertical;
                                                min-height: 100px;
                                            }

                                            /* Button styling */
                                            .btn-danger {
                                                background-color: #dc3545;
                                                border-color: #dc3545;
                                                transition: all 0.2s ease;
                                            }

                                            .btn-danger:hover {
                                                background-color: #c82333;
                                                border-color: #bd2130;
                                            }

                                            .btn-outline-secondary {
                                                color: #6c757d;
                                                border-color: #6c757d;
                                            }

                                            .btn-outline-secondary:hover {
                                                color: #fff;
                                                background-color: #6c757d;
                                                border-color: #6c757d;
                                            }

                                            /* Animation for modal */
                                            .modal.fade .modal-dialog {
                                                transition: transform 0.2s ease-out;
                                            }

                                            .modal.fade:not(.show) .modal-dialog {
                                                transform: translateY(-25px);
                                            }

                                            /* Form validation styling */
                                            .is-invalid {
                                                border-color: #dc3545 !important;
                                                padding-right: calc(1.5em + 0.75rem);
                                                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
                                                background-repeat: no-repeat;
                                                background-position: right calc(0.375em + 0.1875rem) center;
                                                background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
                                            }

                                            .invalid-feedback {
                                                display: none;
                                                width: 100%;
                                                margin-top: 0.25rem;
                                                font-size: 80%;
                                                color: #dc3545;
                                            }
                                        </style>

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
                                        <img style="width: fit-content;" src="{{ asset('storage/' . $service->service_image) }}" alt="" class="image">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.services.show' , $service->id) }}" class="body-title-2">{{ Str::limit($service->title, 16) }}</a>
                                </td>
                                <td>{{ Str::limit($service->description, 16) }}</td>
                                <td>{{ $service->price }} DH</td>
                                <td>
                                    @if($service->status === 'pending')
                                        <!-- Approve Form -->
                                        <form action="{{ route('admin.services.approve', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success" style="
                                                background-color: #dcfce7;
                                                border: 1px solid #22c55e;
                                                color: #166534;
                                            " onclick="return confirm('Approve this service?')">Approve</button>
                                        </form>

                                        <!-- Reject Button (Triggers Modal) -->
                                        <button type="button" class="btn btn-danger" style="
                                            background-color: #fee2e2;
                                            border: 1px solid #ef4444;
                                            color: #991b1b;
                                        " data-bs-toggle="modal" data-bs-target="#rejectModal{{ $service->id }}">
                                            Reject
                                        </button>

                                        <!-- Modal for Rejection Reason -->
                                        <div class="modal fade" id="rejectModal{{ $service->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $service->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title" id="rejectModalLabel{{ $service->id }}">
                                                            <i class="fas fa-times-circle text-danger me-2"></i>Reject Service
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    
                                                    <form method="POST" action="{{ route('admin.services.reject', $service->id) }}" id="rejectForm{{ $service->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        
                                                        <div class="modal-body p-4">
                                                            <div class="mb-3">
                                                                <label for="rejection-reason-{{ $service->id }}" class="form-label fw-bold">Rejection Reason</label>
                                                                <p class="text-muted small mb-3">Please provide a clear explanation for rejecting this service. This message will be sent to the service provider.</p>
                                                                
                                                                <select class="form-select mb-3" id="reason-template-{{ $service->id }}" onchange="fillReasonTemplate({{ $service->id }})">
                                                                    <option value="">Select a template reason or write custom...</option>
                                                                    <option value="insufficient-info">Insufficient Information Provided</option>
                                                                    <option value="quality-concerns">Quality Concerns</option>
                                                                    <option value="policy-violation">Policy Violation</option>
                                                                    <option value="duplicate">Duplicate Service</option>
                                                                </select>
                                                                
                                                                <textarea 
                                                                    name="reason" 
                                                                    id="rejection-reason-{{ $service->id }}" 
                                                                    class="form-control" 
                                                                    rows="5" 
                                                                    placeholder="Please explain why this service is being rejected..."
                                                                    required
                                                                ></textarea>
                                                                
                                                                <div class="invalid-feedback" id="reason-error-{{ $service->id }}">
                                                                    Please provide a rejection reason.
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox" id="allow-resubmit-{{ $service->id }}" name="allow_resubmit" value="1" checked>
                                                                <label class="form-check-label" for="allow-resubmit-{{ $service->id }}">
                                                                    Allow provider to resubmit after addressing issues
                                                                </label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" id="submit-reject-{{ $service->id }}">
                                                                <i class="fas fa-times-circle me-1"></i>
                                                                Reject Service
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add this JavaScript to your page -->
                                        <script>
                                            function fillReasonTemplate(serviceId) {
                                                const selectElement = document.getElementById(`reason-template-${serviceId}`);
                                                const textareaElement = document.getElementById(`rejection-reason-${serviceId}`);
                                                
                                                // Define template text for each reason
                                                const templates = {
                                                    'insufficient-info': "We cannot approve this service due to insufficient information. Please provide more details about:\n- Service description\n- Pricing structure\n- Delivery timeframes\n\nYou may resubmit once these details are included.",
                                                    
                                                    'quality-concerns': "We're unable to approve this service due to quality concerns. Specifically:\n- [specific quality issues]\n\nPlease improve these aspects and resubmit your service for another review.",
                                                    
                                                    'policy-violation': "This service violates our marketplace policies regarding [specific policy]. Please review our service guidelines at [link to guidelines] for more information.",
                                                    
                                                    'duplicate': "This service appears to be a duplicate of an existing service in our marketplace. Please modify your offering to be sufficiently different or unique compared to existing services."
                                                };
                                                
                                                // Set the textarea value based on selection
                                                if (selectElement.value && templates[selectElement.value]) {
                                                    textareaElement.value = templates[selectElement.value];
                                                }
                                            }
                                            
                                            // Form validation before submission
                                            document.querySelectorAll('[id^="rejectForm"]').forEach(form => {
                                                form.addEventListener('submit', function(event) {
                                                    const serviceId = this.id.replace('rejectForm', '');
                                                    const reasonField = document.getElementById(`rejection-reason-${serviceId}`);
                                                    const errorMsg = document.getElementById(`reason-error-${serviceId}`);
                                                    
                                                    // Validate reason field
                                                    if (!reasonField.value.trim()) {
                                                        event.preventDefault();
                                                        reasonField.classList.add('is-invalid');
                                                        errorMsg.style.display = 'block';
                                                    } else {
                                                        reasonField.classList.remove('is-invalid');
                                                        errorMsg.style.display = 'none';
                                                    }
                                                });
                                            });
                                        </script>
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