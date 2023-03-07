<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignaturePad With Ajax</title>
</head>
<body>
  <form>
    <canvas style="border: 1px solid black;"></canvas> <br>
    <button type="button">Submit</button>
  </form>

  <!-- source: https://github.com/szimek/signature_pad -->
  <script src="http://localhost/signature-pad-example/signature_pad-4.1.5/dist/signature_pad.umd.min.js"></script>
  <script>
    const canvas = document.querySelector("canvas");
    const signaturePad = new SignaturePad(canvas, {
      backgroundColor: 'rgb(255, 255, 255)',
      penColor: 'blue'
    });

    document.querySelector('button').addEventListener('click', (e) => {
      e.preventDefault();
      let formData = 'signatured=' + signaturePad.toDataURL();
      
      const request = new XMLHttpRequest();
      request.open('POST', 'http://localhost/learnUploadFileWithAjax/upload.php');
      request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      request.onreadystatechange = () => {
        if(request.readyState == 4 && request.status == 200) {
          let response = request.responseText;
          console.log(response);
        }
      };
      request.send(formData);
    });
  </script>
</body>
</html>