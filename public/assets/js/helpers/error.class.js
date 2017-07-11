class Error {
    static handle(status, errors) {
        let errorMessage = '';

        if (status == 422) {
            $.each(errors, function (i, message) {
                errorMessage += message + "\n";
            });

            Message.warning(`${app.lang.message.error_form_title} ${app.lang.message.error_form_subtitle}`, errorMessage.toString());

            return true;
        }

        if (status == 400) {}

        if (status == 403) {}

        if (status == 404) {}

        if (status == 500) {}

        return false;
    }
}