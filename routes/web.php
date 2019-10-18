<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME
Route::get('/', function () {

    // Attempt to log the user in
    if (Auth::guard('admin')->check()) {
        // if successful, then redirect to their intended location
        return redirect()->route('admin.dashboard');
    }
    else if (Auth::guard('teacher')->check()) {
        // if successful, then redirect to their intended location
        return redirect()->route('teacher.dashboard');
    }
    else if (Auth::guard('web')->check()) {
        // if successful, then redirect to their intended location
        return redirect()->route('student.dashboard');
    }
    return view('auth.multi-login');
})->name('home');

Auth::routes();


//LOGIN
Route::get('/login', function(){
    // Attempt to log the user in
    if (Auth::guard('admin')->check()) {
        // if successful, then redirect to their intended location
        return redirect()->route('admin.dashboard');
    }
    else if (Auth::guard('teacher')->check()) {
        // if successful, then redirect to their intended location
        return redirect()->route('teacher.dashboard');
    }
    else if (Auth::guard('web')->check()) {
        // if successful, then redirect to their intended location
        return redirect()->route('student.dashboard');
    }
   return redirect('/');
})->name('multi.login');


Route::post('/login', 'Auth\MultiLoginController@login')->name('multi.login.submit');

//douwnload files
Route::get('/download/{data}','FileController@getDownload')->name('download.file');

//under construction
Route::get("/uconstruct", function(){
    return View::make("underConstruction");
})->name('uconstruct');


//STUDENT
Route::prefix('student')->group(function(){
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('student.register');
    Route::post('/register', 'Auth\RegisterController@register')->name('student.register.submit');

    Route::get('/', 'StudentController@student')->name('student.dashboard');
    Route::get('/attendance/{id}', 'StudentController@attendance')->name('student.attendance');
    Route::get('/marks/{id}', 'StudentController@marks')->name('student.marks');
    Route::get('/subject/{id}','StudentController@contentSubject')->name('student.subjectContent');
    Route::get('/activitycalendar', 'StudentController@activity_calendar')->name('student.activity_calendar');
    Route::get('/annotations/{id}','StudentController@showAnnotations')->name('student.annotations');
    Route::get('/logout', 'Auth\LoginController@studentLogout')->name('student.logout');
});


//ADMIN
Route::prefix('admin')->group(function() {

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // Curso
    Route::get('/grade/{id}', 'AdminGradeController@index')->name('admin.grade');
    Route::get('/grade/edit/{id}', 'AdminGradeController@editGrade')->name('admin.grade.edit');
    Route::post('/grade/edit/{id}', 'AdminGradeController@updateGrade')->name('admin.grade.update');
    Route::get('/grade/delete/{id}', 'AdminGradeController@deleteGrade')->name('admin.grade.delete');
    Route::get('/grade/add/form','AdminGradeController@addGradeForm')->name('admin.gradeAdd');
    Route::post('/grade/add', 'AdminGradeController@addGrade')->name('admin.grade.create');

    //Asignaturas
    Route::get('/subject/{id}','AdminSubjectController@show')->name('admin.subject.show');
    Route::get('/subject/add/{id}','AdminSubjectController@create')->name('admin.subject.add');
    Route::post('/subject/store/{id}', 'AdminSubjectController@store')->name('admin.subject.create');
    Route::get('/subject/edit/{id}','AdminSubjectController@edit')->name('admin.subject.edit');
    Route::post('/subject/update/{id}','AdminSubjectController@update')->name('admin.subject.update');
    Route::get('/subject/delete/{id}','AdminSubjectController@delete')->name('admin.subject.delete');
    Route::get('/subject/subject/{id}','AdminSubjectController@subjectMarks')->name('admin.subject.marks');

    // Alumno
    Route::get('student/{id}', 'AdminStudentController@index')->name('admin.student');
    Route::get('student/edit/{id}', 'AdminStudentController@editStudent')->name('admin.student.edit');
    Route::post('student/edit/{id}', 'AdminStudentController@updateStudent')->name('admin.student.update');
    Route::get('student/delete/{id}', 'AdminStudentController@deleteStudent')->name('admin.student.delete');
    Route::get('/student/annotation/list/{id}','AdminStudentController@listAnnotations')->name('admin.student.annotations.list');
    Route::get('/student/marks/{id}','AdminStudentController@listMarks')->name('admin.student.marks');

 //   Route::post('/registerStudent','AdminStudentController@registerStudentForm')->name('register.student.form');
   // Route::get('/registerStudent','AdminStudentController@registerStudent')->name('register.student');

    // Profesor
    Route::get('/teacher/{id}', 'AdminTeacherController@index')->name('admin.teacher');
    Route::get('/teacher/edit/{id}', 'AdminTeacherController@editTeacher')->name('admin.teacher.edit');
    Route::post('/teacher/edit/{id}', 'AdminTeacherController@updateTeacher')->name('admin.teacher.update');
    Route::get('/teacher/delete/{id}', 'AdminTeacherController@deleteTeacher')->name('admin.teacher.delete');

});

Route::post('/postajax','TeacherCalendarController@activity');
Route::post('/deleteajax','TeacherCalendarController@deleteActivity');


//TEACHER
Route::prefix('teacher')->group(function() {

    Route::get('/register', 'Auth\TeacherRegisterController@showRegistrationForm')->name('teacher.register');
    Route::post('/register', 'Auth\TeacherRegisterController@register')->name('teacher.register.submit');
    Route::get('/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');

    // Teacher Password reset routes
    Route::post('/password/email', 'Auth\TeacherForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
    Route::get('/password/reset', 'Auth\TeacherForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
    Route::post('/password/reset', 'Auth\TeacherResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\TeacherResetPasswordController@showResetForm')->name('teacher.password.reset');

    //AULA
    Route::get('/subject/{id}', 'TeacherController@subject')->name('teacher.subject');
    Route::post('/subject/file', 'TeacherAulaController@subjectFile');
    Route::post('/subject/addUnit', 'TeacherAulaController@addUnit');
    Route::get('/subject/marks/{id}', 'TeacherAulaController@subjectMarks')->name('teacher.subject.marks');
    Route::get('/subject/delete/material/{id}','TeacherAulaController@deleteMaterial')->name('teacher.material.delete');
    Route::get('/subject/delete/unidad/{id}','TeacherAulaController@deleteUnidad')->name('teacher.unidad.delete');

    //ESTUDIANTE
    Route::get('/student/list/{id}', 'TeacherController@studentList')->name('teacher.student.list');
    Route::get('/student/profile/{id}', 'TeacherController@student')->name('teacher.studentProfile');

    //CALENDARIO DE ACTIVIDADES
    Route::get('/calendar', 'TeacherCalendarController@index')->name('teacher.calendar');
    Route::post('/calendar', 'TeacherCalendarController@register')->name('teacher.calendar.submit');
    Route::post('/calendar/add', 'TeacherCalendarController@activity');
    Route::get('/calendar/delete/{id}','TeacherCalendarController@delete')->name('teacher.calendar.delete');

    //ASISTENCIA
    Route::get('/attendance/{id}', 'TeacherAttendanceController@index')->name('teacher.attendance');
    Route::get('/attendance/historic/{id}', 'TeacherAttendanceController@historicAttendanceIndex')->name('teacher.attendance.historic');
    Route::get('/attendance/historic/data/{date}/{id}', 'TeacherAttendanceController@historicAttendanceByDate')->name('teacher.attendance.historic.date');
    Route::post('/attendance/{id}', 'TeacherAttendanceController@register')->name('teacher.attendance.submit');

    //LIBRO DE NOTAS
    Route::get('/marks/{id}', 'TeacherMarksController@index')->name('teacher.marks');
    Route::post('/marks/{id}', 'TeacherMarksController@register')->name('teacher.marks.submit');
    Route::get('/marks/list/{id}', 'TeacherMarksController@list')->name('teacher.mark.list');
    Route::get('/marks/add/{id}', 'TeacherMarksController@add')->name('teacher.marks.add');
    Route::get('/marks/student/{id}', 'TeacherMarksController@markStudent')->name('teacher.marks.student');
    Route::get('/marks/delete/evaluation/{id}','TeacherMarksController@deleteEvaluation')->name('teacher.evaluation.delete');
    Route::post('/evaluation/add','TeacherMarksController@registerEvaluation');



    //INFORME DE PERSONALIDAD
    Route::get('/annotation/create/{id}', 'TeacherAnnotationController@index')->name('teacher.annotation');
    Route::post('/annotation/create/{id}', 'TeacherAnnotationController@register')->name('teacher.annotation.submit');
    Route::get('/annotation/list/{id}', 'TeacherAnnotationController@list')->name('teacher.annotation.list');
    Route::post('/annotation/add/{id}','TeacherAnnotationController@add')->name('teacher.annotation.add');
    Route::get('/annotation/list/delete/{id}','TeacherAnnotationController@deleteAnnotation')->name('teacher.annotation.delete');



});

Route::prefix('files')->group(function(){
    Route::post('upload','FileController@upload')->name('upload.file');
});