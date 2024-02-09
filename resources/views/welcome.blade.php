<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Welcome</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

  <div class="container mt-5">
      <h1>Datatable</h1>

      <!-- Add success message display code here -->
        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <div class="d-flex justify-content-end"> <!-- Right aligning the back button -->
        <a href="/create" class="btn btn-secondary">Create New Product</a><br>
      </div><br>

      <div class="mb-2">
        <form action="{{ route('search') }}" method="GET" class="form-inline">
            <input type="text" class="form-control" name="name" placeholder="Enter name"> <br>
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div> <br>

      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>No. </th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Details</th>
                  <th>Publish</th>
                  <th>Action</th>
              </tr>
          </thead>

          <tbody>
            <tbody>
              @foreach ($data as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nameitem }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->details }}</td>
                  <td>{{ $item->publish ? 'Yes' : 'No' }}</td>
                  <td>
                      <!-- action buttons here -->
                      <a href="{{ route('show', $item->id) }}" class="btn btn-primary">Show</a>
                      <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('delete', $item->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
          
          </tbody>
      </table>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Check if the page contains a flash message with the key 'error'
    @if(session('error'))
        // Display an alert with the error message
        alert("{{ session('error') }}");
    @endif
  </script>
  
  </body>
</html>
