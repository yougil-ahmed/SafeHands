<div class="container">
        <h1>{{ $service->title }}</h1>
        <p>{{ $service->description }}</p>
        <p><strong>Price:</strong> ${{ $service->price }}</p>
        <p><strong>Location:</strong> {{ $service->location }}</p>

        <h3>Packages</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Price per Hour</th>
                    <th>Delivery Time</th>
                    <th>Revisions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($service->packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->description }}</td>
                        <td>{{ $package->price ? '$' . $package->price : 'N/A' }}</td>
                        <td>{{ $package->price_per_hour ? '$' . $package->price_per_hour . '/hr' : 'N/A' }}</td>
                        <td>{{ $package->delivery_time ? $package->delivery_time . ' days' : 'N/A' }}</td>
                        <td>{{ $package->revisions ? $package->revisions : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>