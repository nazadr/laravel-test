<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Product </title>
    </head>

    <style>
        /* Custom CSS for the form container */
        .form-container {
            border: 2px solid #ced4da; /* Border color */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Padding inside the container */
        }
    </style>

    <body>
        <div class="container mt-5">
            <h2> Show Product </h2>

            <div class="d-flex justify-content-end"> <!-- Right aligning the back button -->
                <a href="/" class="btn btn-secondary">Back</a>
            </div>

            <div>
                <p><strong>Name:</strong> {{ $item->nameitem }}</p>
                <p><strong>Price:</strong> {{ $item->price }}</p>
                <p><strong>Details:</strong> {{ $item->details }}</p>
                <p><strong>Publish:</strong> {{ $item->publish ? 'Yes' : 'No' }}</p>
            </div>

        </div>
    </body>
</html>
