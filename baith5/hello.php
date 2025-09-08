<?php include 'header.php'; ?>
<main>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="img" id="img" >
        <button class="submit">OK</button>
    </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("button").click(function (e) {
        let img = $("#img");
        var form = new FormData();
        form.append("image", img[0].files[0]);
        $.ajax({
            type: "POST",
            url: "./scripts.php",
            processData: false,
            mimeType: "multipart/form-data",
            contentType: false,
            data: form,
            success: function (response) {
                console.log(response);
                let result = JSON.parse(response);
                console.log(result);
            },
            error: function (e) {
                console.log(e);
            }
        });
    });
</script>
<?php include 'footer.php'; ?>
