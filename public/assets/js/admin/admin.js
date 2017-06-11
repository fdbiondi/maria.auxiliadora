let action = '';
const formConfig = {
    object: true,
    check: true,
    disable: true
};

$(function(){
    $('#btn_save').on('click', function(e){
        e.preventDefault();
        action = 'save';

        //assemble the object with the data
        let $form = $('#admin_form');
        const url = $form.attr('action');

        const f = new Form($form, formConfig);

        const data = f.serialize();
        
        ajaxPromise(url, 'POST', 'json', data, null);
    });

    $('.delete').on('click', function (e) {
        e.preventDefault();
        action = 'delete';

        const id = $(this).data('id');
        const name = $(this).data('name');
        const url = $(this).attr('href');

        const data = {'_token': _TOKEN , data: JSON.stringify(id)};

        const params = [url, 'DELETE', 'json', data, null];

        Message.question(ARE_YOU_SURE_QUESTION.toString(),
                         QUESTION_DELETE.replace(':name', name),
                         'warning',
                         DELETE_BUTTON,
                         CANCEL_BUTTON,
                         ajaxPromise,
                         params);
    });
});

function successResponse(data) {
    if(data.error) {
        Message.warning(TRY_AGAIN, data.message);
    } else {
        let title = OK_FORM_TITLE;
        let text = '';

        if (action === 'delete') {
            title = data.message;
        } else if (action === 'save') {
            text = data.message;
        }

        Message.success(title, text, Util.redirect, [ACTION_URL]);
    }
}