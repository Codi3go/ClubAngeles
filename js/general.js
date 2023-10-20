$(document).ready(function() {
    new DataTable('#example');

    $("#searchMembership").click(function() {
        var busqueda = $("#membership-input").val();
        $.ajax({
            type: "POST",
            url: "../tasks/membership.php",
            data: { busqueda: busqueda },
            success: function(response) {
                response = JSON.parse(response);
                var txt2 = $("<p></p>").text(response.status);
                var txtEror = $("<p></p>").text(response.error);
                if (!response.hasOwnProperty("error")) {
                    $("#modalBody").html(txt2);
                } else {
                    $("#modalBody").html(txtEror);
                }
            }
        });
    });
});