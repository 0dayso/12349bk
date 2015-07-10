/**
 * 定义广播工具
 *
 * @author zhaozl
 * @since  2015-07-09
 */
var BROADCASR = function() {

	var socket;

	return {
		init: function(websocket_url, websocket_port) {
			window.WebSocket = window.WebSocket || window.MozWebSocket;
	        if(!window.WebSocket) {
	            jAlert("您的浏览器并不支持WebSocket，请更换新式浏览器访问，不然您将不能收到及时消息通知");
	            return;
	        }

	        socket = new WebSocket("ws://"+websocket_url+":"+websocket_port);
	        socket.onopen    = function(msg) { 
	        };
	        socket.onmessage = function(msg) { 
	        };
	        socket.onclose   = function(msg) { 
	        };
		},
		send: function(msg) {
			socket.send(msg); 
		},
		close: function() {
			socket.close();
		}
	}
}();