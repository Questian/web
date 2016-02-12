getLocation();

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
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

}

