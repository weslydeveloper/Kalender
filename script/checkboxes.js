var $checkboxes = $("input:checkbox");

$checkboxes.on("change", function (jqueryevent) {
    var ev=jqueryevent.originalEvent;
    var parent=ev.currentTarget.parentNode.parentNode.parentNode;
    var all_check_boxes=parent.getElementsByTagName("input");
    for(var i=0;i<all_check_boxes.length;i++)
    {
        if(all_check_boxes[i]!=ev.currentTarget)
        {
            all_check_boxes[i].checked=false;
        }
    }
    $(this).siblings('input[type="checkbox"]').prop('checked', false);

    if ($("#cityfilter input:checkbox:checked").length == 0){$('#allcities').prop('checked', true);}
    if ($("#schoolfilter input:checkbox:checked").length == 0){$('#allschools').prop('checked', true);}
    if ($("#eventfilter input:checkbox:checked").length == 0){$('#allevents').prop('checked', true);}
    if ($("#maandfilter input:checkbox:checked").length == 0){$('#allmaanden').prop('checked', true);}
    var options = getFilterOptions();
    updateHtml(options);
});

function getFilterOptions(){
    var options = [];
    $checkboxes.each(function () {
        if(this.checked){
            options.push(this.name);
        }
    });
    return options;
}

function updateHtml(options){
    $.ajax({
        type: "POST",
        url: "run.php",
        dataType : 'json',
        cache: false,
        data: {filterOptions: options},
        success: function(data){
            makeHtml(data);
            console.log(options);
        }
    });
}

function makeHtml(data){
    $("#content").empty();
    if (data.length > 0) {
        $.each(data, function (key, value) {
            var maand = value.maand.substr(0, 3);
            maand = maand.toUpperCase();
            $("#content").append("<div class='eventblock'><div class='event'><a href='"+ value.href +"'><div class='eventheader'  style='background-image: url(" +'"images/' + value.school + '.png"' + "); background-size: cover; background-position: center center;'></div><div class='eventtitle'><h1>" + value.name + "</h1></div><div class='eventinfo'><div class='eventdate'><p class='day'><b>" + value.dag + "</b></p><p class='month'><b>" + maand + "</b></p></div><div class='eventsubinfo'><p class='firstp'>" + value.school + "</p><p>vanaf <b>" + value.tijd + "</b></p><p>in " + value.city + "</p><p>" + value.jaar + "</p></div></div></a></div></div>");
        });
    } else {
        $("#content").append("<div class='empty'> <h1><b>Geen resultaten</b></h1> </div>");

    }
}

$('#allcities').prop('checked', true);
$('#allschools').prop('checked', true);
$('#allevents').prop('checked', true);
$('#allmaanden').prop('checked', true);

var options = ["allcities","allschools","allevents","allmaanden"];

updateHtml(options);