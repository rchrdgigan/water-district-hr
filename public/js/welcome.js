function showScanner(){
    var displayQr = document.getElementById('scanner');

    if(displayQr.style.display === 'block'){
        displayQr.style.display = 'none';
        document.getElementById('inputID').style.display = 'block';
        document.getElementById('btn').value = 'QR-Code Scanner';
        document.getElementById('sub_btn').disabled = false;
    }else{
        displayQr.style.display = 'block';
        document.getElementById('inputID').style.display = 'none';
        document.getElementById('btn').value = 'Manual Input ID No.';
        document.getElementById('sub_btn').disabled = true;
    }
}

function currentTime() {
    let date = new Date(); 
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session = "AM";

    if(hh === 0){
        hh = 12;
    }
    if(hh > 12){
        hh = hh - 12;
        session = "PM";
    }

    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    ss = (ss < 10) ? "0" + ss : ss;
        
    let time = hh + ":" + mm + ":" + ss + " " + session;

    document.getElementById("clock").innerText = time; 
    let t = setTimeout(function(){ currentTime() }, 1000);
}

currentTime();


var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
const months = {
    01: 'January',
    02: 'February',
    03: 'March',
    04: 'April',
    05: 'May',
    06: 'June',
    07: 'July',
    08: 'August',
    09: 'September',
    10: 'October',
    11: 'November',
    12: 'December'
}

today = ' ' + dd + ', ' + yyyy;
concatDate = months[parseInt(mm)] + today;
document.getElementById("date").innerText  = concatDate;
