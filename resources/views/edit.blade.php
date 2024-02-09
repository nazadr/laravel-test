<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Update Product </title>
    </head>

    <style>
        /* Custom CSS for adjusting input and textarea width */
        .custom-input {
            width: 1000px; /* Adjust as needed */
            border: 1px solid #ced4da; /* Border color */
            margin-bottom: 15px; /* Bottom margin for spacing */
        }

        .custom-textarea {
            width: 1000px; /* Adjust as needed */
            height: 100px; /* Adjust the height of the textarea */
            border: 1px solid #ced4da; /* Border color */
            margin-bottom: 15px; /* Bottom margin for spacing */
        }

        /* Custom CSS for centering the submit button */
        .center-button {
            display: flex;
            justify-content: center;
        }

        /* Custom CSS for the form container */
        .form-container {
            border: 2px solid #ced4da; /* Border color */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Padding inside the container */
        }
    </style>

    <body>
    <div class="container mt-5">
        @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-container">

        <h2> Update Product </h2>

        <div class="d-flex justify-content-end"> <!-- Right aligning the back button -->
            <a href="/" class="btn btn-secondary">Back</a>
        </div>

        <form action="{{ route('update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-1">
                <label for="nameitem">Name: </label><br>
                <input type="text" class="form-control custom-input" name="nameitem"><br>
            </div>
            
            <div class="mb-1">
                <label for="price">Price (RM): </label><br>
                <input type="float" class="form-control custom-input" name="price"><br>
            </div>

            <div class="mb-1">
                <label for="details">Details: </label><br>
                <textarea class="form-control custom-textarea" name="details" rows="4" cols="40"></textarea><br>
            </div>

            <div class="mb-1">
                <label class="form-label" for="publish">Publish: </label><br>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="publish" value="1" {{ $item->publish ? 'checked' : '' }}>
                    <label class="form-check-label" for="yes">Yes</label><br>
                </div> <br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="publish" value="0" {{ !$item->publish ? 'checked' : '' }}>
                    <label class="form-check-label" for="no">No</label><br><br>
                </div><br>
            </div>
            
            <div class="mb-3 center-button">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
        @endif

        @if ($errors->any())
            <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </body>
</html>


