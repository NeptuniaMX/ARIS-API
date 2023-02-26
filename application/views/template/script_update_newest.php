<script>
    var aris_session;
    var aris_token;
    var aris_database_name;
    var aris_parent_group;
    var aris_user = "system";
    var aris_password = "manager";
    var tenant = "default";

    $("#gettoken").click(function() {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: "http://27.112.79.138/umc/api/v1/tokens?tenant=default&name=system&password=manager",
            success: function(data) {
                aris_session = data.csrfToken;
                aris_token = data.token;
                var c = "Anda sudah terhubung dengan ARIS API";
                alert(c);
            },
            error: function(data) {
                var x = "Maaf, ada kesalahan yang terjadi. Harap hubungi Technical ARIS API";
                alert(x);
            },
        });
    })

    $("#destroytoken").click(function() {
        $.ajax({
            dataType: "json",
            type: "DELETE",
            url: "http://27.112.79.138/umc/api/tokens/" + aris_token,
            success: function(data) {
                var z = "Sesi anda sudah dimatikan, terima kasih";
                alert(z);
            },
            error: function(data) {
                var x = "Sesi anda tidak berhasil dimatikan, harap hubungi Technical ARIS API";
                alert(x);
            },
        });
    })

    $("#input_data_group").click(function() {
        aris_database_name = $("#database_name").val();
        aris_parent_group = $("#parent_group").val();
        $.ajax({
            dataType: "json",
            type: "POST",
            url: "http://27.112.79.138/abs/api/groups/" + aris_database_name + "?language=en&parent=" + aris_parent_group + "&umcsession=" + aris_token,
            data: {
                cmd: JSON.stringify({
                    "kind": "GROUP",
                    "attributes": [{
                        "kind": "ATTRIBUTE",
                        "typename": "Name",
                        "apiname": "AT_NAME",
                        "language": "en_US",
                        "value": "ARIS API"
                    }]
                })
            },
            success: function(data) {
                var b = "Objek baru telah dibuat di ARIS pada database " + aris_database_name;
                alert(b);
            },
            error: function(data) {
                var c = "Objek tidak berhasil masuk ke ARIS, harap cek kembali";
                alert(c);
            }
        })
    })

    $("#view_database").click(function() {
        $.ajax({
            dataType: "json",
            type: "GET",
            url: "http://27.112.79.138/abs/api/databases?umcsession=" + aris_token,
            success: function(data) {
                console.log(data);
                var m = "Data berhasil ditarik, harap cek log";
                alert(m);
            },
            error: function(data) {
                var n = "Data tidak berhasil ditarik, harap cek log";
                alert(n);
            }
        })
    })
</script>
</body>

</html>