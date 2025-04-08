@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Service Packages
@endsection
@section('admin_layout')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-4">
                <h3 class="mb-0">Create Packages for "{{ $service->title }}"</h3>
                <p class="text-sm mb-0">Fill in details for all three packages</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.service-packages.store', $service->id) }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="w-25">Package Details</th>
                                    <th class="text-center">Basic</th>
                                    <th class="text-center">Standard</th>
                                    <th class="text-center">Premium</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Package Names -->
                                <tr>
                                    <td>
                                        <label class="form-control-label">Package Name</label>
                                    </td>
                                    @foreach([0, 1, 2] as $index)
                                    <td>
                                        <input type="text" name="packages[{{ $index }}][name]" 
                                               class="form-control form-control-sm" 
                                               value="{{ old("packages.$index.name", ['Basic', 'Standard', 'Premium'][$index] ?? '') }}" 
                                               required>
                                    </td>
                                    @endforeach
                                </tr>

                                <!-- Descriptions -->
                                <tr>
                                    <td>
                                        <label class="form-control-label">Description</label>
                                    </td>
                                    @foreach([0, 1, 2] as $index)
                                    <td>
                                        <textarea name="packages[{{ $index }}][description]" 
                                                  class="form-control form-control-sm" 
                                                  rows="2">{{ old("packages.$index.description") }}</textarea>
                                    </td>
                                    @endforeach
                                </tr>

                                {{-- <!-- Delivery Time -->
                                <tr>
                                    <td>
                                        <label class="form-control-label">Delivery Time</label>
                                        <small class="text-muted d-block">(in days)</small>
                                    </td>
                                    @foreach([0, 1, 2] as $index)
                                    <td>
                                        <input type="number" name="packages[{{ $index }}][delivery_time]" 
                                               class="form-control form-control-sm" 
                                               value="{{ old("packages.$index.delivery_time") }}">
                                    </td>
                                    @endforeach
                                </tr> --}}

                                {{-- <!-- Revisions -->
                                <tr>
                                    <td>
                                        <label class="form-control-label">Revisions</label>
                                    </td>
                                    @foreach([0, 1, 2] as $index)
                                    <td>
                                        <input type="number" name="packages[{{ $index }}][revisions]" 
                                               class="form-control form-control-sm" 
                                               value="{{ old("packages.$index.revisions") }}">
                                    </td>
                                    @endforeach
                                </tr> --}}

                                

                                <!-- Prices -->
                                <tr>
                                    <td>
                                        <label class="form-control-label">Price ($)</label>
                                    </td>
                                    @foreach([0, 1, 2] as $index)
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" name="packages[{{ $index }}][price]" 
                                                   class="form-control" 
                                                   value="{{ old("packages.$index.price") }}" 
                                                   required>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>

                                <!-- Dynamic Options Section -->
                                <tr class="bg-gray-100">
                                    <td colspan="4">
                                        <h6 class="mb-0">Package Options</h6>
                                        <small class="text-muted">Add features that differ between packages</small>
                                    </td>
                                </tr>

                                <!-- Existing Options (for edit) -->
                                @if(old('options'))
                                    @foreach(old('options') as $optIndex => $option)
                                    <tr class="option-row">
                                        <td>
                                            <input type="text" name="options[{{ $optIndex }}][name]" 
                                                   class="form-control form-control-sm" 
                                                   value="{{ $option['name'] }}" 
                                                   placeholder="Option name" required>
                                        </td>
                                        @foreach([0, 1, 2] as $valIndex)
                                        <td>
                                            <input type="text" name="options[{{ $optIndex }}][values][{{ $valIndex }}]" 
                                                   class="form-control form-control-sm" 
                                                   value="{{ $option['values'][$valIndex] ?? '' }}" 
                                                   placeholder="Value" required>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                @endif

                                <!-- Options Container (for JavaScript) -->
                                <tbody id="optionsContainer"></tbody>

                                <!-- Add Option Button -->
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="addOptionBtn">
                                            <i class="fas fa-plus me-1"></i> Add Option
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save All Packages
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addOptionBtn = document.getElementById('addOptionBtn');
        const container = document.getElementById('optionsContainer');
        let optionIndex = {{ old('options') ? count(old('options')) : 0 }};

        addOptionBtn.addEventListener('click', function() {
            const row = document.createElement('tr');
            row.className = 'option-row';
            
            row.innerHTML = `
                <td>
                    <input type="text" name="options[${optionIndex}][name]" 
                           class="form-control form-control-sm" 
                           placeholder="Option name" required>
                </td>
                <td>
                    <input type="text" name="options[${optionIndex}][values][0]" 
                           class="form-control form-control-sm" 
                           placeholder="Basic value" required>
                </td>
                <td>
                    <input type="text" name="options[${optionIndex}][values][1]" 
                           class="form-control form-control-sm" 
                           placeholder="Standard value" required>
                </td>
                <td>
                    <input type="text" name="options[${optionIndex}][values][2]" 
                           class="form-control form-control-sm" 
                           placeholder="Premium value" required>
                </td>
            `;

            container.appendChild(row);
            optionIndex++;
        });

        // Add initial option if none exist
        if (optionIndex === 0) {
            addOptionBtn.click();
        }
    });
</script>
@endpush

@push('styles')
<style>
    .table thead th {
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .form-control-sm {
        min-height: calc(1.5em + 0.5rem + 2px);
    }
    .option-row td {
        vertical-align: middle;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    .bg-gray-100 {
        background-color: #f8f9fa;
    }
</style>
@endpush