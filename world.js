window.onload = function () {
    var searchBox = document.getElementById("country").value

    /*The Lookup Country Button*/
    document.getElementById("lookup").addEventListener('click', function (button) {
        button.preventDefault();

        /* Sending a http request to the server*/
        var url = "http://localhost/info2180-lab5/world.php/world.php?country=" + searchBox + "&context=none";
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var httpResponse = request.responseText;
                document.getElementById("result").innerHTML = httpResponse;

            }

        };

        request.open("GET", url, true);
        request.send();

    });


    var searchBox = document.getElementById("country").value

    /*The Lookup Cities Button*/
    document.getElementById("lookupCities").addEventListener('click', function (button) {
        button.preventDefault();

        /* Sending a http request to the server*/
        var url = "http://localhost/info2180-lab5/world.php/world.php?country=" + searchBox + "&context=cities";
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var httpResponse = request.responseText;
                document.getElementById("result").innerHTML = httpResponse;

            }

        };

        request.open("GET", url, true);
        request.send();

    });
}

