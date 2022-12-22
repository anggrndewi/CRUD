<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
    <input type='file' id="imginp" />
    <img id='ambilimage' width='200' height='200'/>
</form>


<script src="jquery.min.js"> </script>
<script>
function readURL(input){
    if (input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#ambilimage').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
    $('#imginp').change(function(){
        readURL(this);
    });
</script>
</body>
</html>