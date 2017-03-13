<!-- All Students -->
                <div class="col-lg-6">
                    @include('controls.checkbox', [
                        'title' => trans('general.label.students'),
                        'control' => 'disallow',
                        'filter' => true,
                        'model' => $course,
                        'collection' => $students,
                        'relation' => 'users',
                        'attribute' => 'fileNumberAndName'
                        ])
                </div>
                <!-- Register Students -->
                <div class="col-lg-6">
                    @include('controls.checkbox', [
                        'title' => trans('general.label.register_students'),
                        'control' => 'assign',
                        'filter' => true,
                        'model' => $course,
                        'relation' => 'users',
                        'attribute' => 'fileNumberAndName',
                        ])
                </div>