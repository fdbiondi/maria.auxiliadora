$(function(){
    const $course_id = $('#course_id');

    $course_id.on('change', function () {
        const courseId = $course_id.val();
        Util.redirect(REGISTER_STUDENTS_ROUTE.replace('ID', courseId));
    });
});