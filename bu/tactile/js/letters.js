var final_text = "";
function pre_frameLooper(myString, my_div_id) {
    myArray = myString.split("");
    frameLooper(my_div_id, myArray);
}
var loopTimer;

function frameLooper(my_div_id) {
    my_div_id1 = my_div_id
    if (myArray.length > 0) {
    final_text += myArray.shift();
        $(my_div_id).html(final_text);
    } else {
        clearTimeout(loopTimer);
        return false;
    }
    loopTimer = setTimeout('frameLooper(my_div_id1)', 100);
}