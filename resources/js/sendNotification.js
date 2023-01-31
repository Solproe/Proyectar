function data() {
  websocket = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");

  websocket.onopen = function(evt) {
      alert("abierta la conexion");
          
      var data = {
          type: "notification"
      };
  }

  websocket.onerror = function(evt){
      alert("error de conexion " + evt);
  }

  websocket.onclose = function(evt){
      alert("close");
  }

  websocket.onmessage = function(evt){
      alert(evt.data);
  }
}

window.addEventListener('load', data());