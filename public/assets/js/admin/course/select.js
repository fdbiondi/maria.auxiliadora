$(function(){
    const $btn_select = $('#btn_select');


    $btn_select.on('click', function () {
        let courseId = $('#course_id').val();
        window.location = REGISTER_STUDENTS_ROUTE.replace('ID', courseId);
    });
});