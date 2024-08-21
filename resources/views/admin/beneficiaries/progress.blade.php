


<div class="container mt-4">

    @if($status == 'specialist')
        <!-- Progress Bar 1 -->
        <div class="progressbar">
            <div class="progress-step warning">
                <div class="step-circle"><i class="fas fa-exclamation"></i></div>
                <div class="step-title">الأخصائية</div>
            </div>
            <div class="progress-step">
                <div class="step-circle"></div>
                <div class="step-title">مدير القسم</div>
            </div>
            <div class="progress-step">
                <div class="step-circle"></div>
                <div class="step-title">المالية</div>
            </div>
            <div class="progress-step">
                <div class="step-circle"></div>
                <div class="step-title">الصرف</div>
            </div>
        </div>
    @endif

    @if($status == 'manager')
        <!-- Progress Bar 2 -->
        <div class="progressbar">
            <div class="progress-step active">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">الأخصائية</div>
            </div>
            <div class="progress-step warning">
                <div class="step-circle"><i class="fas fa-exclamation"></i></div>
                <div class="step-title">مدير القسم</div>
            </div>
            <div class="progress-step">
                <div class="step-circle"></div>
                <div class="step-title">المالية</div>
            </div>
            <div class="progress-step">
                <div class="step-circle"></div>
                <div class="step-title">الصرف</div>
            </div>
        </div>
    @endif

    @if($status == 'money')
        <!-- Progress Bar 3 -->
        <div class="progressbar">
            <div class="progress-step active">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">الأخصائية</div>
            </div>
            <div class="progress-step active">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">مدير القسم</div>
            </div>
            <div class="progress-step warning">
                <div class="step-circle"><i class="fas fa-exclamation"></i></div>
                <div class="step-title">المالية</div>
            </div>
            <div class="progress-step">
                <div class="step-circle"></div>
                <div class="step-title">الصرف</div>
            </div>
        </div>
    @endif

    @if($status == 'cancel')
        <!-- Progress Bar 4 -->
        <div class="progressbar">
            <div class="progress-step active">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">الأخصائية</div>
            </div>
            <div class="progress-step active">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">مدير القسم</div>
            </div>
            <div class="progress-step active">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">المالية</div>
            </div>
            <div class="progress-step error">
                <div class="step-circle"><i class="fas fa-times"></i></div>
                <div class="step-title">الصرف</div>
            </div>
        </div>
    @endif

    @if($status == 'done')
        <!-- Progress Bar 5 -->
        <div class="progressbar">
            <div class="progress-step completed">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">الأخصائية</div>
            </div>
            <div class="progress-step completed">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">مدير القسم</div>
            </div>
            <div class="progress-step completed">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">المالية</div>
            </div>
            <div class="progress-step completed">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-title">الصرف</div>
            </div>
        </div>
    @endif
</div> 