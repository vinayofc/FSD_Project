<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>AI Based Resume Analyser</h4>
                <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Choose Resume</label>
                        <input class="form-control" type="file" name="pdf_file" id="pdf_file">
                    </div>

                    <input type="submit" value="Analyze Resume" name="submit" class="btn btn-dark"></input>
                </form>

                <div id="response"></div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#uploadForm").on('submit', function(e) {
                $('#response').html('<lottie-player src="https://assets7.lottiefiles.com/packages/lf20_bdlrkrqv.json" background="transparent"  speed="1"  style="width: 200px; height: 200px;" loop autoplay></lottie-player>')
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#response").html(response);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>