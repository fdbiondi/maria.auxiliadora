class Error {
    static handle(status, errors) {
        let errorMessage = '';

        if (status == 422) {
            $.each(errors, function (i, message) {
                errorMessage += message + "\n";
            });

            Message.warning(ERROR_FORM_TITLE + " " + ERROR_FORM_SUBTITLE, errorMessage.toString());

            return true;
        }

        if (status == 400) {}

        if (status == 403) {}

        if (status == 404) {}

        if (status == 500) {}

        return false;
    }
}