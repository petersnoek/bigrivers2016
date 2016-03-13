/**
 * Created by snp on 13-03-16.
 */
$(document).ready(function(){
    //$("#report tr:odd").addClass("odd");
    $("#report tr:not(.odd)").hide();
    $("#report tr:first-child").show();

    $("#report tr.odd").click(function(){
        $(this).next("tr").toggle();
        // show second row as well
        $(this).next("tr").next("tr").toggle();
        $(this).find(".arrow").toggleClass("up");
    });
    $("#report tr.odd input").click(function(e) {
        e.stopPropagation();
    });
    //$("#report").jExpand();
});