$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='tel'],input[type='email'],input[type='number'],input[type='select']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) {
            nextStepWizard.removeAttr('disabled').trigger('click');
        }
        else {
            alert("Please complete all details.");
        }

    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    var i = 1;
    $("#add_row").click(function () {
        $('#addr' + i).html("<td>" + i + "</td><td><input name='fullName" + i + "' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><select  name='gender" + i + "' type='text' class='form-control input-md'><option value='Male'>Male</option><option value='Female'>Female</option></td><td><input  name='age" + i + "' type='number' placeholder='Age'  class='form-control input-md'></td><td><input  name='mobileNumber" + i + "' type='tel' placeholder='Mobile'  class='form-control input-md'></td>");
        $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
        $("#count").val(i);
        ++i;
    });
    $("#delete_row").click(function () {
        if (i > 1) {
            $("#addr" + (i - 1)).html('');
            --i;
            $("#count").val(i - 1);
        }
        else {
            $("#count").val("0");
        }
    });

});