<style type="text/css">
    label{
        font-weight: 100 !important;
        color:#000;
    }
</style>
<section id="pricing">
    <div class="container main-content">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">APPLICATION FORM FOR FRANCHISE</h4>
                    <div class="panel-options"></div>
                </div>
                <div class="panel-body"> 
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ]);
                   ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>