$( document ).ready(function(){

    $('#btn_save').on('click', function(e){
        e.preventDefault();
        action = "save";
        //assemble the object with the data
        var $form = $("#admin_form");
        var url = $form.attr('action');

        var data = $form.serializeObject();
        //var _TOKEN = data._token;
        delete data._token;

        data = {'_token': _TOKEN , data: JSON.stringify(data)};

        sendAjaxPromise(url, 'POST', 'json', data, null);
    });

    $('.delete').on('click', function (e) {
        e.preventDefault();
        action = "delete";

        var id = $(this).data("id");
        var name = $(this).data("name");
        var url = $(this).attr("href");
        var messageType = "warning";

        var data = {'_token': _TOKEN , data: JSON.stringify(id)};

        showQuestionAlert(ARE_YOU_SURE_QUESTION.toString(),
            QUESTION_DELETE.replace(':name', name),
            messageType, 
            DELETE_BUTTON,
            CANCEL_BUTTON,
            sendAjaxPromise,
            [url, 'DELETE', 'json', data, null]
        );
    });
});

var action = "";

function ajaxSuccess(data) {
    if(data.error){

        if (!showErrorFieldsAlert(data.error_type, data.message) && (action == "save" || action == "delete"))
            showErrorAlert(TRY_AGAIN, data.message);
    }
    else{
        var title = OK_FORM_TITLE, text = "";

        if (action == "delete")
            title = data.message;
        else if (action == "save")
            text = data.message;

        showOkAlert(title, text, redirect, [ACTION_URL]);
    }
}