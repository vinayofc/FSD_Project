<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HR Tools by Regem Enterprises</title>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EEH6143MP0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EEH6143MP0');
</script>
</head>

<body>

  <div class="container">
    <br>
    <div class="card mt-4">
      <div class="card-body">
        <h4>AI Based Resume Analyzer [Beta Preview] - V0.1</h4>
        <p>Unlock the Power of AI to Streamline Your Hiring Process. Easily Analyze Resumes in Seconds</p>
        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="formFile" class="form-label">Choose Candidate Resume</label>
            <input class="form-control" type="file" name="pdf_file" id="pdf_file">
          </div>

          <input type="submit" value="Analyze Resume" name="submit" class="btn btn-dark" id="btnCheck"></input>
        </form>
        <hr>
        <div id="response">
<h6>Result will Appear Here</h6>
        </div>
<hr>
        <p>This is a beta preview of the AI Resume Analyzer by <a href="https://regem.in">Regem Enterprises</a> . Our aim is to deliver a great solution to HR teams to streamline the hiring process with ease. Sometimes, you may find incorrect or misleading information. We would love to work with you to improve our product. If you liked this project and want to implement it for your HR company, please contact us at: <a href="mailto:hello@regem.in">hello@regem.in</a></p>
        <p>
            Get this Tool Customized version for your business. Contact us on <a href="https://wa.me/+918076692828">Whatsapp</a>/ <a href="mailto:hello@regem.in">Email</a>.
        </p>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#uploadForm").on('submit', function(e) {
         $('#btnCheck').text('Analyzing...')
        $('#btnCheck').attr('disabled', true)
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
            $('#btnCheck').attr('disabled', false)
        $('#btnCheck').text('Analyze Resume')
            $("#response").html(response);
          }
        });
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>