class Message {

    static default(title, text, type) {
        swal(title, text, type);
    }

    /** Sweet Alert */
    static success(title, text, actionCallback, actionCallbackParameters) {
        if(actionCallback == null) {
            Message.default(title, text, 'success');
        } else {
            swal({title: title, text: text, type: 'success'}, function () {
                actionCallback.apply(this, actionCallbackParameters);
            });
        }
    }

    static error(title, text) {
        Message.default(title, text, 'error');
    }

    static warning(title, text) {
        Message.default(title, text, 'warning');
    }

    static question(title, text, type,
                    confirmText, cancelText,
                    confirmCallback, confirmCallbackParameters,
                    cancelCallback, cancelCallbackParameters) {
        const config = {
            title: title,
            text: text,
            type: type,
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            closeOnConfirm: true,
            closeOnCancel: true
        };

        swal(config, function (response) {
            if (response) {
                Message.doAction(confirmCallback, confirmCallbackParameters, this);
            } else {
                Message.doAction(cancelCallback, cancelCallbackParameters, this);
            }
        });
    }

    static doAction(callback, params, that) {
        if (callback != null) {
            callback.apply(that, params);
        }
    }
}