function gethomeid(data) {
    var home_id= data;
    document.getElementById("home-id-pass").value = home_id;
}
function getroomid(data) {
    var room_id= data;
    document.getElementById("room-id-pass").value = room_id;
}
function getSensorStatus(id){
    var sensor_id = id;
    var check=document.getElementById(id).checked;
    var sensor_status;
    
    if(check){
        sensor_status ='1';
    }else{
        sensor_status ='0';
    }
    var sensor_data={
        "id" : sensor_id,
        "status" : sensor_status
    }
    var sensor = JSON.stringify(sensor_data);
    $.ajax({
        type: 'POST',
        data: {'update-sensor': sensor}, 
        success: function(response){
        } 
    });
}
