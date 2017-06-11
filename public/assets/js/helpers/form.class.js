class Form {
    constructor(form, config) {
        this.form = form;
        this.config = config;
    }

    serialize() {
        const object = this.config.object ? this.form.serializeObject() : {};
        const disable = this.config.disable ? this.form.serializeDisabled() : {};
        const check = this.config.check ? this.form.serializeChecks() : {};

        return Object.assign(
            object, check, disable
        );
    }
}