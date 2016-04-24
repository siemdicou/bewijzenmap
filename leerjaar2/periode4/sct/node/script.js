var net = require("net");

var server = net.createServer();
// var socket = 


server.on("concetion",function (socket) {
	console.log("gj het werkt");
});

server.listen(1337);
