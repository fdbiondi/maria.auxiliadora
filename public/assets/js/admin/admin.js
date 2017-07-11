const form = {
    config: {
        object: true,
        check: true,
        disable: true
    },
    action: ''
};

$(function() {
    $('#btn_save').on('click', function(e) {
        e.preventDefault();
        form.action = 'save';

        //assemble the object with the data
        let $form = $('#admin_form');
        const url = $form.attr('action');

        const f = new Form($form, form.config);

        const data = f.serialize();
        
        ajaxPromise(url, 'POST', 'json', data, null);
    });

    $('.register').on('click', function (e) {
        e.preventDefault();
        form.action = 'save';

        const exam = $(this).data('exam');
        const exam_act_id = $(this).data('id');
        const messageType = 'info';
        const url = app.url.store;

        const data = {'_token': app._token , data: JSON.stringify({exam_act_id: exam_act_id, user_id: STUDENT_ID})};

        Message.question(app.lang.question.are_you_sure.toString(),
            CONFIRM_REGISTRATION.replace(':exam', exam),
            messageType,
            app.lang.button.confirm,
            app.lang.button.cancel,
            ajaxPromise,
            [url, 'POST', 'json', data, null]);
    });

    $('.delete').on('click', function (e) {
        e.preventDefault();
        form.action = 'delete';

        const id = $(this).data('id');
        const name = $(this).data('name');
        const url = $(this).attr('href');

        const data = {'_token': app._token , data: JSON.stringify(id)};

        const params = [url, 'DELETE', 'json', data, null];

        Message.question(app.lang.question.are_you_sure.toString(),
                         app.question.delete.replace(':name', name),
                         'warning',
                         app.lang.button.delete,
                         app.lang.button.cancel,
                         ajaxPromise,
                         params);
    });
});

function successResponse(data) {
    if(data.error) {
        Message.warning(app.lang.message.try_again, data.message);
    } else {
        let title = app.lang.message.ok_form_title;
        let text = '';

        if (form.action === 'delete') {
            title = data.message;
        } else if (form.action === 'save') {
            text = data.message;
        }

        Message.success(title, text, Util.redirect, [app.url.action]);
    }
}