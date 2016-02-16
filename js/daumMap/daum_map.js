getLocation();

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementsByTagName("body").innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latitude = position.coords.latitude;
    var longtitude = position.coords.longitude;

    var container = document.getElementById('daum-map');
    var options = {
        center: new daum.maps.LatLng(latitude, longtitude),
        level: 4
    };

    var map = new daum.maps.Map(container, options);

    var content = "<p>당신의 위치</p>";

    var location = new daum.maps.LatLng()

    var customOverlay = new daum.maps.CustomOverlay({
        position: location,
        content: content
    });

    customOverlay.setMap(map);

}




