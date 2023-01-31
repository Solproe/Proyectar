const notification = require("./sendNotification.js");

function createNotification(){
    
    const data = {
        tokenId: "c2__hJgfSdquHOeyYErCua:APA91bEMFMzXHO3TE0oyo_e3nPPlThwow6uEVGdvUGWTS1C8Mljj7UTTtOCBhYnYSM7_vTVMD9E6Q9tGzOyWYxhsMVdOzMblldistdbxPcIata0MOOUro1qjSxRC3tujjFprbqbHOaFw",
        title: "Re:codigo",
        message: "message from my server node",
      }
      notification.sendPushToOneUser(data);
}
