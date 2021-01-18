baseUrl = "./action/"
defaultType = "0" // internchips
defaultAvis = "0" // pending
currentProfile = -1;
$(document).ready(function () {
    console.log("ready!");
    get_ALL();

    $('#typeSelector').on('change', function () {
        console.log(this.value);
        defaultType = this.value;
        get_ALL();

    });
    $('#avisSelector').on('change', function () {
        console.log(this.value);
        defaultAvis = this.value;
        get_ALL();

    });
    $('#modifyAvis').on('change', function () {
        console.log(this.value);
        update_profile(currentProfile, this.value)

    });

});
function get_ALL() {
    $.get(baseUrl + "get_profiles.php?type=" + encodeURIComponent(defaultType) + "&category=" + encodeURIComponent(defaultAvis), function (data) {
        $("#result").html(data);
        console.log("Load was performed." + data);
    });
}
function update_profile(id, avis) {
    $.ajax({
        type: 'GET',
        url: baseUrl + "update_avis_profile.php?id=" + encodeURIComponent(id) + "&avis=" + encodeURIComponent(avis),
        dataType: 'json',
        success: function (data) {
            console.log(data);
            get_ALL();

            return data;
        }
    });
}
function translate_Avis(num) {
    switch (num) {
        case 0:
            return "Pending"
        case 1:
            return "Accepted Waiting for interview";
        case 2:
            return "Accepted";
        case 3:
            return "Rejected";


        default:
            console.log(`value not found`);
    }

}
function openModal(id) {
    currentProfile = id;
    $.ajax({
        type: 'GET',
        url: baseUrl + "get_profile.php?id=" + encodeURIComponent(id),
        dataType: 'json',
        success: function (data) {
            console.log(data);
            console.log(data[0].first_name);
            $("#modal-title").html("You are modifying the Profile : " + data[0].last_name + " " + data[0].first_name);
            $("#modifyAvis").val(data[0].avis)

            return data;
        }
    });

    $("#myModal").modal();
}