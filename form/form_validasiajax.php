<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi dan AJAX</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi dan AJAX</h1>
    <form id="myForm">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br>

        <input type="submit" value="Submit">
    </form>

    <div id="hasil" style="margin-top: 20px; color: green;"></div>

    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                let nama = $("#nama").val().trim();
                let email = $("#email").val().trim();
                let password = $("#password").val();
                let valid = true;

                $("#nama-error").text("");
                $("#email-error").text("");
                $("#password-error").text("");
                $("#hasil").text("");

                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                }

                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    $("#email-error").text("Format email tidak valid.");
                    valid = false;
                }

                if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                }

                if (valid) {
                    $.ajax({
                        url: "proses_validasi.php",
                        type: "POST",
                        data: { nama: nama, email: email, password: password },
                        success: function (response) {
                            $("#hasil").html(response);
                        },
                        error: function () {
                            $("#hasil").text("Terjadi kesalahan saat mengirim data.");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>