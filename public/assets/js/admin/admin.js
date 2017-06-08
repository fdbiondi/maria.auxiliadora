let action = '';

$(function(){
    $('#btn_save').on('click', function(e){
        e.preventDefault();
        action = 'save';
        //assemble the object with the data
        let $form = $('#admin_form');
        const url = $form.attr('action');

        const data = Object.assign(
            $form.serializeObject(),
            $form.serializeDisabled(),
            $form.serializeChecks()
        );
        
        sendAjaxPromise(url, 'POST', 'json', data, null);
    });

    $('.delete').on('click', function (e) {
        e.preventDefault();
        action = 'delete';

        const id = $(this).data('id');
        const name = $(this).data('name');
        const url = $(this).attr('href');
        const messageType = 'warning';

        const data = {'_token': _TOKEN , data: JSON.stringify(id)};

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

function ajaxSuccess(data) {
    if(data.error) {
        showErrorAlert(TRY_AGAIN, data.message);
    }
    else{
        let title = OK_FORM_TITLE;
        let text = '';

        if (action === 'delete') {
            title = data.message;
        } else if (action === 'save') {
            text = data.message;
        }

        showOkAlert(title, text, redirect, [ACTION_URL]);
    }
}