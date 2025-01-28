
//--------------------------------------------------------------
// PNotify
var stack_topright = {"dir1": "down", "dir2": "left", "push": "top"};
var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
var stack_bottomright = {"dir1": "up", "dir2": "up", "push": "top"};
var stack_bottomleft = {"dir1": "up", "dir2": "up", "push": "top"};
var stack_modal = {"dir1": "down", "dir2": "right", "push": "top", "modal": true, "overlay_close": true};
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
var stack_context = {"dir1": "down", "dir2": "left", "context": $("#stack-context")};

// Ausgabe Responses
function write(sText) {

    var oJson = JSON.parse(sText);
    var aText = oJson.data.split('||');
    var sType = aText[0];
    var sTitle = sType;
    var sText = aText[1];

    // var oDate = new Date();
    // var sDateText = '[' + oDate.getFullYear() + '-' + (oDate.getMonth() + 1 > 9 ? oDate.getMonth() + 1 : '0' + oDate.getMonth() + 1) + '-' + (oDate.getDate() > 9 ? oDate.getDate() : '0' + oDate.getDate()) + ' ' + (oDate.getHours() > 9 ? oDate.getHours() : '0' + oDate.getHours()) + ':' + (oDate.getMinutes() > 9 ? oDate.getMinutes() : '0' + oDate.getMinutes()) + ':' + (oDate.getSeconds() > 9 ? oDate.getSeconds() : '0' + oDate.getSeconds()) + ']';
    var sClass = "stack-topright";
    var oStack = stack_topright;

    if ('info' === aText[0]) {
        var sClass = "stack-topleft";
        var oStack = stack_topleft;
    }
    if ('success' === aText[0]) {
        var sClass = "stack-topright";
        var oStack = stack_topright;
    }
    if ('notice' === aText[0]) {
        var sClass = "stack-bottomright";
        var oStack = stack_bottomright;
    }
    if ('error' === aText[0]) {
        var sClass = "stack-bottomleft";
        var oStack = stack_bottomleft;
    }

    // PNotify.desktop.permission();
    new PNotify({
        title: sTitle,
        text: sText,
        addclass: sClass,
        stack: oStack,
        type: sType,
        textTrusted: true,
        desktop: {
            desktop: true,
            title: sTitle,
            icon: '/Ws_old/assets/' + sType + '.png',
            text: aText[1].replace(/<\/?[^>]+(>|$)/g, "")
        }
    });
}