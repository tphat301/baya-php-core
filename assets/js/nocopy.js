function killCopy(e) {
	return false;
}

function reEnable() {
	return true;
}

document.onselectstart = new Function("return false");

if (window.sidebar) {
	document.onmousedown = killCopy;
	document.onclick = reEnable;
}

var message = "NoRightClicking";
function defeatIE() {
	if (document.all) {
		message;
		return false;
	}
}
function defeatNS(e) {
	if (document.layers || (document.getElementById && !document.all)) {
		if (e.which == 2 || e.which == 3) {
			message;
			return false;
		}
	}
}
if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown = defeatNS;
} else {
	document.onmouseup = defeatNS;
	document.oncontextmenu = defeatIE;
}
document.oncontextmenu = new Function("return false");

src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js";

document.onkeydown = function (e) {
	if (
		e.ctrlKey &&
		(e.keyCode === 67 ||
			e.keyCode === 86 ||
			e.keyCode === 85 ||
			e.keyCode === 117)
	) {
		return false;
	} else {
		return true;
	}
};
$(document).keypress("u", function (e) {
	if (e.ctrlKey) {
		return false;
	} else {
		return true;
	}
});

$(function () {
	if (window._userdata && _userdata.page_desktop)
		window.location = _userdata.page_desktop;
});
jQuery(document).ready(function ($) {
	var $ctsearch = $("#ct-search"),
		$ctsearchinput = $ctsearch.find("input.ct-search-input"),
		$body = $("html,body"),
		openSearch = function () {
			$ctsearch.data("open", true).addClass("ct-search-open");
			$ctsearchinput.focus();
			return false;
		},
		closeSearch = function () {
			$ctsearch.data("open", false).removeClass("ct-search-open");
		};
	$ctsearchinput.on("click", function (e) {
		e.stopPropagation();
		$ctsearch.data("open", true);
	});
	$ctsearch.on("click", function (e) {
		e.stopPropagation();
		if (!$ctsearch.data("open")) {
			openSearch();
			$body.off("click").on("click", function (e) {
				closeSearch();
			});
		} else {
			if ($ctsearchinput.val() === "") {
				closeSearch();
				return false;
			}
		}
	});
});
$(function () {
	$("img").on("error", function () {
		$(this).attr({
			alt: this.src,
			src: "https://i39.servimg.com/u/f39/18/93/89/23/l1074210.png",
		});
	});
});
(shortcut = {
	all_shortcuts: {},
	add: function (a, b, c) {
		var d = {
			type: "keydown",
			propagate: !1,
			disable_in_input: !1,
			target: document,
			keycode: !1,
		};
		if (c) for (var e in d) "undefined" == typeof c[e] && (c[e] = d[e]);
		else c = d;
		(d = c.target),
			"string" == typeof c.target && (d = document.getElementById(c.target)),
			(a = a.toLowerCase()),
			(e = function (d) {
				d = d || window.event;
				if (c.disable_in_input) {
					var e;
					d.target ? (e = d.target) : d.srcElement && (e = d.srcElement),
						3 == e.nodeType && (e = e.parentNode);
					if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName) return;
				}
				d.keyCode ? (code = d.keyCode) : d.which && (code = d.which),
					(e = String.fromCharCode(code).toLowerCase()),
					188 == code && (e = ","),
					190 == code && (e = ".");
				var f = a.split("+"),
					g = 0,
					h = {
						"`": "~",
						1: "!",
						2: "@",
						3: "#",
						4: "$",
						5: "%",
						6: "^",
						7: "&",
						8: "*",
						9: "(",
						0: ")",
						"-": "_",
						"=": "+",
						";": ":",
						"'": '"',
						",": "<",
						".": ">",
						"/": "?",
						"": "|",
					},
					i = {
						esc: 27,
						escape: 27,
						tab: 9,
						space: 32,
						return: 13,
						enter: 13,
						backspace: 8,
						scrolllock: 145,
						scroll_lock: 145,
						scroll: 145,
						capslock: 20,
						caps_lock: 20,
						caps: 20,
						numlock: 144,
						num_lock: 144,
						num: 144,
						pause: 19,
						break: 19,
						insert: 45,
						home: 36,
						delete: 46,
						end: 35,
						pageup: 33,
						page_up: 33,
						pu: 33,
						pagedown: 34,
						page_down: 34,
						pd: 34,
						left: 37,
						up: 38,
						right: 39,
						down: 40,
						f1: 112,
						f2: 113,
						f3: 114,
						f4: 115,
						f5: 116,
						f6: 117,
						f7: 118,
						f8: 119,
						f9: 120,
						f10: 121,
						f11: 122,
						f12: 123,
					},
					j = !1,
					l = !1,
					m = !1,
					n = !1,
					o = !1,
					p = !1,
					q = !1,
					r = !1;
				d.ctrlKey && (n = !0),
					d.shiftKey && (l = !0),
					d.altKey && (p = !0),
					d.metaKey && (r = !0);
				for (var s = 0; (k = f[s]), s < f.length; s++)
					"ctrl" == k || "control" == k
						? (g++, (m = !0))
						: "shift" == k
						? (g++, (j = !0))
						: "alt" == k
						? (g++, (o = !0))
						: "meta" == k
						? (g++, (q = !0))
						: 1 < k.length
						? i[k] == code && g++
						: c.keycode
						? c.keycode == code && g++
						: e == k
						? g++
						: h[e] && d.shiftKey && ((e = h[e]), e == k && g++);
				if (
					g == f.length &&
					n == m &&
					l == j &&
					p == o &&
					r == q &&
					(b(d), !c.propagate)
				)
					return (
						(d.cancelBubble = !0),
						(d.returnValue = !1),
						d.stopPropagation && (d.stopPropagation(), d.preventDefault()),
						!1
					);
			}),
			(this.all_shortcuts[a] = {
				callback: e,
				target: d,
				event: c.type,
			}),
			d.addEventListener
				? d.addEventListener(c.type, e, !1)
				: d.attachEvent
				? d.attachEvent("on" + c.type, e)
				: (d["on" + c.type] = e);
	},
	remove: function (a) {
		var a = a.toLowerCase(),
			b = this.all_shortcuts[a];
		delete this.all_shortcuts[a];
		if (b) {
			var a = b.event,
				c = b.target,
				b = b.callback;
			c.detachEvent
				? c.detachEvent("on" + a, b)
				: c.removeEventListener
				? c.removeEventListener(a, b, !1)
				: (c["on" + a] = !1);
		}
	},
}),
	shortcut.add("Ctrl+U", function () {
		top.location.href = "URL bản quyền thuộc về DNC Media ";
	}),
	shortcut.add("F12", function () {
		top.location.href = "URL bản quyền thuộc về DNC Media ";
	});
shortcut.add("Ctrl+Shift+C", function () {
	top.location.href = "URL bản quyền thuộc về DNC Media ";
});
var message = "Bản quyền thuộc về DNC Media";
function clickIE() {
	if (document.all) {
		message;
		return false;
	}
}
function clickNS(e) {
	if (document.layers || (document.getElementById && !document.all)) {
		if (e.which == 2 || e.which == 3) {
			alert(message);
			return false;
		}
	}
}
if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown = clickNS;
} else {
	document.onmouseup = clickNS;
	document.oncontextmenu = clickIE;
	document.onselectstart = clickIE;
}
document.oncontextmenu = new Function("return false");
/* Ready */
